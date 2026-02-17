<?php

namespace App\Command;

use App\Entity\Course;
use App\Entity\Circuit;
use App\Entity\Pilote;
use App\Entity\Ecurie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:import-courses-full-csv',
    description: 'Importe tous les classements de chaque course depuis un fichier CSV.'
)]
class ImportCoursesFullCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = __DIR__ . '/../../var/data/courses_full.csv';
        if (!file_exists($file)) {
            $output->writeln('<error>Fichier courses_full.csv introuvable dans var/data.</error>');
            return Command::FAILURE;
        }

        $handle = fopen($file, 'r');
        if ($handle === false) {
            $output->writeln('<error>Impossible d\'ouvrir le fichier CSV.</error>');
            return Command::FAILURE;
        }

        // ✅ En-tête hardcodée — le CSV est instable (header au milieu, données dès la 1ère ligne)
        $header = ['round', 'nomGp', 'dateCourse', 'nomCircuit', 'ville', 'pays', 'codePays', 'position', 'pilote', 'ecurie', 'temps', 'points'];
        $nbCols = count($header);

        $count = 0;
        while (($row = fgetcsv($handle)) !== false) {
            // ✅ Ignore les lignes vides, incomplètes, ou les lignes d'en-tête parasites
            if (count($row) !== $nbCols || $row[0] === 'round' || !is_numeric($row[0])) {
                continue;
            }

            $data = array_combine($header, $row);

            // Recherche du circuit
            $circuit = $this->entityManager->getRepository(Circuit::class)->findOneBy([
                'nomCircuit' => $data['nomCircuit'],
            ]);
            if (!$circuit) {
                $output->writeln("<comment>Circuit non trouvé : {$data['nomCircuit']}</comment>");
                continue;
            }

            // Recherche du pilote — le CSV contient "Prénom Nom" dans une seule colonne
            $parts = explode(' ', trim($data['pilote']), 2);
            $prenom = $parts[0];
            $nom = $parts[1] ?? '';
            $pilote = $this->entityManager->getRepository(Pilote::class)->findOneBy([
                'prenom' => $prenom,
                'nom'    => $nom,
            ]);
            if (!$pilote) {
                $output->writeln("<comment>Pilote non trouvé : {$data['pilote']}</comment>");
                continue;
            }

            // Recherche de l'écurie
            $ecurie = $this->entityManager->getRepository(Ecurie::class)->findOneBy([
                'nom' => $data['ecurie'],
            ]);
            if (!$ecurie) {
                $output->writeln("<comment>Ecurie non trouvée : {$data['ecurie']}</comment>");
                continue;
            }

            // ✅ Vérifie si ce résultat existe déjà en base pour éviter les doublons
            $existing = $this->entityManager->getRepository(Course::class)->findOneBy([
                'nomGrandPrix' => $data['nomGp'],
                'pilote'       => $pilote,
                'position'     => (int) $data['position'],
            ]);
            if ($existing) {
                continue;
            }

            $course = new Course();
            $course->setCircuit($circuit);
            $course->setPilote($pilote);
            $course->setEcurie($ecurie);
            $course->setNomGrandPrix($data['nomGp']);
            $course->setDateCourse(new \DateTime($data['dateCourse']));
            $course->setPosition((int) $data['position']);
            $course->setTemps($data['temps']);
            $course->setPoints((int) $data['points']);

            $this->entityManager->persist($course);
            $count++;
        }

        fclose($handle);
        $this->entityManager->flush();

        $output->writeln("<info>$count résultats importés avec succès !</info>");
        return Command::SUCCESS;
    }
}
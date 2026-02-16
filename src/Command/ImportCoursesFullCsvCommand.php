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
            $output->writeln('<error>Impossible d’ouvrir le fichier CSV.</error>');
            return Command::FAILURE;
        }

        $header = fgetcsv($handle);
        $count = 0;
        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($header, $row);

            // Recherche du circuit
            $circuit = $this->entityManager->getRepository(Circuit::class)->findOneBy([
                'nomGp' => $data['nomGp'],
                'nomCircuit' => $data['nomCircuit'],
            ]);
            if (!$circuit) {
                $output->writeln("<comment>Circuit non trouvé pour {$data['nomGp']} ({$data['nomCircuit']})</comment>");
                continue;
            }

            // Recherche du pilote (nom et prénom)
            $vainqueur = $data['pilote'];
            $vainqueurParts = explode(' ', $vainqueur, 2);
            $nom = $vainqueurParts[1] ?? $vainqueurParts[0];
            $prenom = $vainqueurParts[1] ? $vainqueurParts[0] : null;
            $criteria = ['nom' => $nom];
            if ($prenom) {
                $criteria['prenom'] = $prenom;
            }
            $pilote = $this->entityManager->getRepository(Pilote::class)->findOneBy($criteria);
            if (!$pilote) {
                $output->writeln("<comment>Pilote non trouvé : {$data['pilote']} (nom: $nom, prenom: $prenom)</comment>");
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

            $course = new Course();
            $course->setCircuit($circuit);
            $course->setPilote($pilote);
            $course->setEcurie($ecurie);
            $course->setNomGrandPrix($data['nomGp']);
            $course->setDateCourse(new \DateTime($data['dateCourse']));
            $course->setPosition((int)$data['position']);
            if (isset($data['temps'])) {
                $course->setTemps($data['temps']);
            }
            if (isset($data['points'])) {
                $course->setPoints((int)$data['points']);
            }
            $this->entityManager->persist($course);
            $count++;
        }
        fclose($handle);
        $this->entityManager->flush();

        $output->writeln("<info>$count résultats de courses importés avec succès !</info>");
        return Command::SUCCESS;
    }
}

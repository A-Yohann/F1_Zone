<?php

namespace App\Command;

use App\Entity\Pilote;
use App\Entity\Ecurie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:import-pilotes-csv',
    description: 'Importe les pilotes depuis un fichier CSV dans la base de données.'
)]
class ImportPilotesCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = __DIR__ . '/../../var/data/pilotes.csv';
        if (!file_exists($file)) {
            $output->writeln('<error>Fichier pilotes.csv introuvable dans var/data.</error>');
            return Command::FAILURE;
        }

        $handle = fopen($file, 'r');
        if ($handle === false) {
            $output->writeln('<error>Impossible d’ouvrir le fichier CSV.</error>');
            return Command::FAILURE;
        }

        // Sauter les lignes vides en début de fichier
        do {
            $header = fgetcsv($handle, 0, ',');
        } while ($header !== false && count(array_filter($header)) === 0);
        $count = 0;
        $ligne = 1;
        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            $ligne++;
            // Sauter les lignes vides ou incomplètes
            if (count($row) !== count($header)) {
                $output->writeln("<comment>Ligne $ligne ignorée : nombre de champs incorrect (" . count($row) . ", attendu : " . count($header) . ")</comment>");
                continue;
            }
            $data = array_combine($header, $row);
            // Sauter si la ligne est l'en-tête (par sécurité)
            if ($data['date_naissance'] === 'date_naissance') {
                $output->writeln("<comment>Ligne $ligne ignorée : ligne d'en-tête détectée</comment>");
                continue;
            }
            $ecurie = null;
            if (!empty($data['ecurie_id'])) {
                $ecurie = $this->entityManager->getRepository(Ecurie::class)->find($data['ecurie_id']);
                if (!$ecurie) {
                    $output->writeln("<comment>Ligne $ligne ignorée : écurie_id " . $data['ecurie_id'] . " introuvable</comment>");
                    continue;
                }
            } else {
                $output->writeln("<comment>Ligne $ligne ignorée : écurie_id manquant</comment>");
                continue;
            }
            try {
                $pilote = new Pilote();
                $pilote->setNom($data['nom']);
                $pilote->setPrenom($data['prenom']);
                $pilote->setEcurie($ecurie);
                $pilote->setDateNaissance(!empty($data['date_naissance']) ? new \DateTime($data['date_naissance']) : null);
                $pilote->setPhoto($data['photo'] ?? null);
                if (isset($data['nationalite'])) {
                    $pilote->setNationalite($data['nationalite']);
                } else {
                    $pilote->setNationalite('');
                }
                if (isset($data['numero'])) {
                    $pilote->setNumero($data['numero'] !== '' ? (int)$data['numero'] : null);
                } else {
                    $pilote->setNumero(null);
                }
                $this->entityManager->persist($pilote);
                $count++;
                $output->writeln("<info>Ligne $ligne importée : " . $data['prenom'] . " " . $data['nom'] . " (écurie_id: " . $data['ecurie_id'] . ")</info>");
            } catch (\Exception $e) {
                $output->writeln("<error>Ligne $ligne ignorée : Exception - " . $e->getMessage() . "</error>");
            }
        }
        fclose($handle);
        $this->entityManager->flush();

        $output->writeln("<info>$count pilotes importés avec succès !</info>");
        return Command::SUCCESS;
    }
}

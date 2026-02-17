<?php
namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-essais-libres-csv',
    description: 'Importe le fichier essais_libres.csv dans la table essai_libre.'
)]
class ImportEssaisLibresCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $csvPath = 'var/data/essais_libres.csv';
        if (!file_exists($csvPath)) {
            $io->error('Fichier CSV non trouvé: ' . $csvPath);
            return Command::FAILURE;
        }
        $io->note('Import du fichier: ' . $csvPath);
        $handle = fopen($csvPath, 'r');
        if (!$handle) {
            $io->error('Impossible d\'ouvrir le fichier CSV.');
            return Command::FAILURE;
        }
        $header = fgetcsv($handle, 0, ',');
        if (!$header) {
            $io->error('CSV vide ou mal formé.');
            fclose($handle);
            return Command::FAILURE;
        }
        $count = 0;
        $io->note('Affichage des lignes lues :');
        $ligneNum = 1;
        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            $io->writeln('Ligne ' . $ligneNum . ': ' . implode(' | ', $row));
            $ligneNum++;
            // Ignore les lignes vides ou incomplètes
            if (count($row) < 5 || empty($row[1]) || empty($row[2]) || empty($row[3]) || empty($row[4])) {
                continue;
            }
            $essaiLibre = new \App\Entity\EssaiLibre();
            $essaiLibre->setCircuit($row[1]);
            $essaiLibre->setGrandPrix($row[2]);
            $essaiLibre->setSession($row[3]);
            $essaiLibre->setDateHeure(new \DateTime($row[4]));
            $this->entityManager->persist($essaiLibre);
            $count++;
        }
        fclose($handle);
        $this->entityManager->flush();
        $io->success("Import terminé: $count lignes importées.");
        return Command::SUCCESS;
    }
}
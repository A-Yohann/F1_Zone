<?php
namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-sprints-csv',
    description: 'Importe le fichier sprints.csv dans la table sprint.'
)]
class ImportSprintsCsvCommand extends Command
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
        $csvPath = 'var/data/sprints.csv';
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
        $count = 0;
        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            if (count($row) < 4 || empty($row[1]) || empty($row[2]) || empty($row[3])) {
                continue;
            }
            $sprint = new \App\Entity\Sprint();
            $sprint->setCircuit($row[1]);
            $sprint->setGrandPrix($row[2]);
            $sprint->setDateHeure(new \DateTime($row[3]));
            $this->entityManager->persist($sprint);
            $count++;
        }
        fclose($handle);
        $this->entityManager->flush();
        $io->success("Import terminé: $count lignes importées.");
        return Command::SUCCESS;
    }
}
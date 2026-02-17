<?php
namespace App\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-essais-libres-classement-csv',
    description: 'Importe le fichier essais_libres_classement.csv dans la table essai_libre_classement.'
)]
class ImportEssaisLibresClassementCsvCommand extends Command
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
        $csvPath = 'var/data/essais_libres_classement.csv';
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
            if (count($row) < 4 || empty($row[0]) || empty($row[1]) || empty($row[2]) || empty($row[3])) {
                continue;
            }
            $classement = new \App\Entity\EssaiLibreClassement();
            $essaiLibre = $this->entityManager->getRepository(\App\Entity\EssaiLibre::class)->find((int)$row[0]);
            if (!$essaiLibre) {
                $io->warning("EssaiLibre id {$row[0]} introuvable, ligne ignorée.");
                continue;
            }
            $classement->setEssaiLibre($essaiLibre);
            $classement->setPilote($row[1]);
            $classement->setPosition((int)$row[2]);
            $classement->setTemps($row[3]);
            $this->entityManager->persist($classement);
            $count++;
        }
        fclose($handle);
        $this->entityManager->flush();
        $io->success("Import terminé: $count lignes importées.");
        return Command::SUCCESS;
    }
}
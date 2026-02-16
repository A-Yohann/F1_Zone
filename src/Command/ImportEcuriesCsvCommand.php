<?php

namespace App\Command;

use App\Entity\Ecurie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:import-ecuries-csv',
    description: 'Importe les écuries depuis un fichier CSV dans la base de données.'
)]
class ImportEcuriesCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = __DIR__ . '/../../var/data/ecuries.csv';
        if (!file_exists($file)) {
            $output->writeln('<error>Fichier ecuries.csv introuvable dans var/data.</error>');
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
            $ecurie = new Ecurie();
            $ecurie->setNom($data['nom']);
            $ecurie->setPays($data['pays']);
            $ecurie->setAnneeCreation($data['anneeCreation'] !== '' ? (int)$data['anneeCreation'] : null);
            $ecurie->setCouleurPrincipale($data['couleurPrincipale']);
            $ecurie->setLogo($data['logo']);
            $ecurie->setDescription($data['description']);
            $this->entityManager->persist($ecurie);
            $count++;
        }
        fclose($handle);
        $this->entityManager->flush();

        $output->writeln("<info>$count écuries importées avec succès !</info>");
        return Command::SUCCESS;
    }
}

<?php

namespace App\Command;

use App\Entity\Circuit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:import-circuits-csv',
    description: 'Importe les circuits depuis un fichier CSV dans la base de données.'
)]
class ImportCircuitsCsvCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $file = __DIR__ . '/../../var/data/circuits.csv';
        if (!file_exists($file)) {
            $output->writeln('<error>Fichier circuits.csv introuvable dans var/data.</error>');
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
            $circuit = new Circuit();
            $circuit->setRound((int)$data['round']);
            $circuit->setNomGp($data['nomGp']);
            $circuit->setNomCircuit($data['nomCircuit']);
            $circuit->setVille($data['ville']);
            $circuit->setPays($data['pays']);
            $circuit->setCodePays($data['codePays']);
            $circuit->setDateDebut(new \DateTime($data['dateDebut']));
            $circuit->setDateFin(new \DateTime($data['dateFin']));
            $circuit->setLongueurKm($data['longueurKm']);
            $circuit->setNombreTours((int)$data['nombreTours']);
            $circuit->setDistanceTotaleKm($data['distanceTotaleKm']);
            $circuit->setTypeCircuit($data['typeCircuit']);
            $circuit->setSprintWeekend($data['sprintWeekend'] === 'true' || $data['sprintWeekend'] === '1');
            $circuit->setPremiereApparition($data['premiereApparition'] !== '' ? (int)$data['premiereApparition'] : null);
            $circuit->setNombreVirages($data['nombreVirages'] !== '' ? (int)$data['nombreVirages'] : null);
            $circuit->setSensCircuit($data['sensCircuit']);
            $circuit->setLatitude($data['latitude']);
            $circuit->setLongitude($data['longitude']);
            $this->entityManager->persist($circuit);
            $count++;
        }
        fclose($handle);
        $this->entityManager->flush();

        $output->writeln("<info>$count circuits importés avec succès !</info>");
        return Command::SUCCESS;
    }
}

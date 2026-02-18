<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Circuit;
use Doctrine\ORM\EntityManagerInterface;

final class CircuitsController extends AbstractController
{
    #[Route('/circuits', name: 'app_circuits')]
    public function index(EntityManagerInterface $em): Response
    {
        $circuits = $em->getRepository(Circuit::class)->findBy([], ['round' => 'ASC']);
        return $this->render('circuits/index.html.twig', [
            'circuits' => $circuits,
        ]);
    }

    #[Route('/circuits/{id}', name: 'app_circuit_show')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $circuit = $em->getRepository(Circuit::class)->find($id);
        if (!$circuit) {
            throw $this->createNotFoundException('Circuit non trouvé');
        }

        // Sessions
        $sessions = [];
        // Essais libres
        $essaisLibres = $em->getRepository(\App\Entity\EssaiLibre::class)->findBy(['circuit' => $circuit->getNomCircuit()]);
        foreach ($essaisLibres as $el) {
            $start = $el->getDateHeure();
            $end = (new \DateTime($start->format('Y-m-d H:i:s')))->modify('+1 hour');
            $sessions[] = [
                'type' => 'Practice ' . $el->getSession(),
                'date' => $start,
                'time' => $start->format('H:i') . ' – ' . $end->format('H:i'),
            ];
        }
        // Qualification
        $qualif = $em->getRepository(\App\Entity\Qualification::class)->findOneBy(['circuit' => $circuit->getNomCircuit()]);
        if ($qualif) {
            $start = $qualif->getDateHeure();
            $end = (new \DateTime($start->format('Y-m-d H:i:s')))->modify('+1 hour');
            $sessions[] = [
                'type' => 'Qualifying',
                'date' => $start,
                'time' => $start->format('H:i') . ' – ' . $end->format('H:i'),
            ];
        }
        // Sprint
        $sprint = $em->getRepository(\App\Entity\Sprint::class)->findOneBy(['circuit' => $circuit->getNomCircuit()]);
        if ($sprint) {
            $start = $sprint->getDateHeure();
            $end = (new \DateTime($start->format('Y-m-d H:i:s')))->modify('+1 hour');
            $sessions[] = [
                'type' => 'Sprint',
                'date' => $start,
                'time' => $start->format('H:i') . ' – ' . $end->format('H:i'),
            ];
        }
        // Course
        $course = $em->getRepository(\App\Entity\Course::class)->findOneBy(['circuit' => $circuit]);
        if ($course) {
            $sessions[] = [
                'type' => 'Race',
                'date' => $course->getDateCourse(),
                'time' => $course->getDateCourse()->format('H:i'),
            ];
        }

        // Classement
        $classement = [];
        $courses = $em->getRepository(\App\Entity\Course::class)->findBy(['circuit' => $circuit], ['position' => 'ASC']);
        foreach ($courses as $result) {
            $classement[] = [
                'position' => $result->getPosition(),
                'pilote' => $result->getPilote() ? $result->getPilote()->getNom() : '',
                'ecurie' => $result->getEcurie() ? $result->getEcurie()->getNom() : '',
                'temps' => $result->getTemps(),
                'points' => $result->getPoints(),
            ];
        }

        // Classement constructeurs
        $pointsEcuries = [];
        foreach ($courses as $result) {
            $ecurie = $result->getEcurie();
            if ($ecurie) {
                $nomEcurie = $ecurie->getNom();
                if (!isset($pointsEcuries[$nomEcurie])) {
                    $pointsEcuries[$nomEcurie] = 0;
                }
                $pointsEcuries[$nomEcurie] += $result->getPoints();
            }
        }
        arsort($pointsEcuries);
        $classementConstructeurs = [];
        foreach ($pointsEcuries as $ecurie => $points) {
            $classementConstructeurs[] = [
                'ecurie' => $ecurie,
                'points' => $points,
            ];
        }

        return $this->render('circuits/show.html.twig', [
            'circuit' => $circuit,
            'sessions' => $sessions,
            'classement' => $classement,
            'classementConstructeurs' => $classementConstructeurs,
        ]);
    }
}

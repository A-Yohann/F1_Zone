<?php

namespace App\Controller;

use App\Repository\CourseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DernierVainqueurController extends AbstractController
{
    #[Route('/dernier-vainqueur', name: 'app_dernier_vainqueur')]
    public function index(Request $request, CourseRepository $courseRepository): Response
    {
        $grandPrix = $request->query->get('gp');
        $courses = $courseRepository->findBy([], ['dateCourse' => 'DESC']);
        $vainqueurs = [];
        foreach ($courses as $course) {
            $vainqueur = $course->getVainqueur(); // suppose une relation Pilote
            if ($vainqueur) {
                $vainqueurs[] = [
                    'grand_prix' => $course->getCircuit()->getNomCircuit(),
                    'date' => $course->getDateCourse(),
                    'pilote' => $vainqueur,
                    'ecurie' => $vainqueur->getEcurie(),
                    'photo' => $vainqueur->getPhoto(),
                    'description' => $course->getDescription() ?? '',
                ];
            }
        }
        // Filtrage si besoin
        if ($grandPrix) {
            $vainqueurs = array_filter($vainqueurs, fn($v) => $v['grand_prix'] === $grandPrix);
        }
        // Liste unique des GP pour le filtre
        $gps = array_unique(array_map(fn($v) => $v['grand_prix'], $vainqueurs));
        sort($gps);
        return $this->render('dernier_vainqueur/index.html.twig', [
            'vainqueurs' => $vainqueurs,
            'gps' => $gps,
            'selected_gp' => $grandPrix,
        ]);
    }
}

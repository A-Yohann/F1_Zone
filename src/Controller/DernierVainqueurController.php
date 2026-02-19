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
        $courses = $courseRepository->findBy(['position' => 1], ['dateCourse' => 'DESC']);
        $vainqueurs = [];
        foreach ($courses as $course) {
            $pilote = $course->getPilote();
            if ($pilote) {
                $vainqueurs[] = [
                    'grand_prix' => $course->getCircuit()->getNomCircuit(),
                    'date' => $course->getDateCourse(),
                    'pilote' => $pilote,
                    'ecurie' => $pilote->getEcurie(),
                    'photo' => $pilote->getPhoto(),
                    'description' => method_exists($course, 'getDescription') ? $course->getDescription() : '',
                ];
            }
        }
        // Liste unique des GP pour le filtre (toujours complète)
        $allCourses = $courseRepository->findBy(['position' => 1]);
        $gps = array_unique(array_map(fn($c) => $c->getCircuit()->getNomCircuit(), $allCourses));
        sort($gps);
        // Filtrage si besoin
        $vainqueursFiltres = $vainqueurs;
        if ($grandPrix) {
            $vainqueursFiltres = array_filter($vainqueurs, fn($v) => $v['grand_prix'] === $grandPrix);
        }
        return $this->render('dernier_vainqueur/index.html.twig', [
            'vainqueurs' => $vainqueursFiltres,
            'gps' => $gps,
            'selected_gp' => $grandPrix,
        ]);
    }
}

<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\PiloteRepository;
use App\Repository\CourseRepository;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request, PiloteRepository $piloteRepository, CourseRepository $courseRepository): Response
    {
        $selectedGp = $request->query->get('grand_prix');

        $allPilotes = $piloteRepository->findAll();
        $pilotesByEcurie = [];
        foreach ($allPilotes as $pilote) {
            $ecurieName = $pilote->getEcurie() ? $pilote->getEcurie()->getNom() : 'Sans écurie';
            if (!isset($pilotesByEcurie[$ecurieName])) {
                $pilotesByEcurie[$ecurieName] = $pilote;
            }
        }

        // Récupère tous les Grand Prix distincts
        $conn = $courseRepository->getEntityManager()->getConnection();
        $sql = 'SELECT DISTINCT nom_grand_prix FROM course ORDER BY date_course DESC';
        $stmt = $conn->executeQuery($sql);
        $grandPrixList = array_column($stmt->fetchAllAssociative(), 'nom_grand_prix');

        if ($selectedGp && in_array($selectedGp, $grandPrixList)) {
            $classementPilotes = $courseRepository->getClassementPilotesCumulUpto($selectedGp);
            $classementEcuries = $courseRepository->getClassementEcuriesCumulUpto($selectedGp);
        } else {
            $classementPilotes = $courseRepository->getClassementPilotes();
            $classementEcuries = $courseRepository->getClassementEcuries();
        }

        // Préparer les stats cumulées par Grand Prix pour la saison
        $statsGrandPrix = [];
        foreach ($grandPrixList as $gp) {
            $statsGrandPrix[] = [
                'nom' => $gp,
                'classement_pilotes' => $courseRepository->getClassementPilotesByGrandPrix($gp),
                'classement_ecuries' => $courseRepository->getClassementEcuriesByGrandPrix($gp),
            ];
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'pilotes' => array_values($pilotesByEcurie),
            'classement_pilotes' => $classementPilotes,
            'classement_ecuries' => $classementEcuries,
            'grand_prix_list' => $grandPrixList,
            'selected_gp' => $selectedGp,
            'stats_grand_prix' => $statsGrandPrix,
        ]);
    }
}

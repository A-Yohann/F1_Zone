<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TeamsController extends AbstractController
{
    #[Route('/teams', name: 'app_teams')]
    public function index(\App\Repository\EcurieRepository $ecurieRepo): Response
    {
        $ecuries = $ecurieRepo->findAll();

        // Préparer les chemins d'images pour chaque écurie
        return $this->render('teams/index.html.twig', [
            'ecuries' => $ecuries
        ]);
    }
}

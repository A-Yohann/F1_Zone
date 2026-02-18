<?php

namespace App\Controller;

use App\Entity\Pilote;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PiloteShowController extends AbstractController
{
    #[Route('/pilote/{id}', name: 'app_pilote_show')]
    public function show(Pilote $pilote): Response
    {
        // Simuler stats 2024 pour le pilote (à remplacer par des vraies données)
        $stats2024 = [
            'km' => 0,
            'points' => 0,
        ];
        return $this->render('pilotes/show.html.twig', [
            'pilote' => $pilote,
            'stats2024' => $stats2024
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PilotesController extends AbstractController
{
    #[Route('/pilotes', name: 'app_pilotes')]
    public function index(): Response
    {
        return $this->render('pilotes/index.html.twig', [
            'controller_name' => 'PilotesController',
        ]);
    }
}

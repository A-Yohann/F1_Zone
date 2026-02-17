<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PiloteRepository;

final class PilotesController extends AbstractController
{
    #[Route('/pilotes', name: 'app_pilotes')]
    public function index(PiloteRepository $piloteRepository): Response
    {
        $pilotes = $piloteRepository->findAll();
        return $this->render('pilotes/index.html.twig', [
            'pilotes' => $pilotes,
        ]);
    }
}

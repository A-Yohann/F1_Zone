<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Repository\ActuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualites', name: 'app_actualite')]
    public function index(ActuRepository $actuRepository): Response
    {
        $actus = $actuRepository->findBy([], ['datePublication' => 'DESC'], 5);
        return $this->render('actualite/index.html.twig', [
            'actus' => $actus,
        ]);
    }

    #[Route('/actualite/{id}', name: 'actualite_show')]
    public function show(Actu $actu): Response
    {
        return $this->render('actualite/show.html.twig', [
            'actu' => $actu,
        ]);
    }
}

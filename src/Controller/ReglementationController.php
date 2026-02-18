<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReglementationController extends AbstractController
{
    #[Route('/reglementation/fia', name: 'app_reglementation_fia')]
    public function fia(): Response
    {
        return $this->render('reglementation/fia.html.twig');
    }
}
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransfertPiloteController extends AbstractController
{
    #[Route('/transfert-pilote', name: 'app_transfert_pilote')]
    public function index(): Response
    {
        return $this->render('transfert_pilote/index.html.twig');
    }
}

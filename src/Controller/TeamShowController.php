<?php

namespace App\Controller;

use App\Entity\Ecurie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class TeamShowController extends AbstractController
{
    #[Route('/team/{id}', name: 'app_team_show')]
    public function show(Ecurie $ecurie): Response
    {
        return $this->render('teams/show.html.twig', [
            'ecurie' => $ecurie
        ]);
    }
}

<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PiloteRepository;
use App\Entity\Pilote;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PiloteRepository $piloteRepository): Response
    {
        $allPilotes = $piloteRepository->findAll();
        $pilotesByEcurie = [];
        foreach ($allPilotes as $pilote) {
            $ecurieName = $pilote->getEcurie() ? $pilote->getEcurie()->getNom() : 'Sans écurie';
            if (!isset($pilotesByEcurie[$ecurieName])) {
                $pilotesByEcurie[$ecurieName] = $pilote;
            }
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'pilotes' => array_values($pilotesByEcurie),
        ]);
    }
}

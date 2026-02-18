<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Circuit;
use Doctrine\ORM\EntityManagerInterface;

final class CircuitsController extends AbstractController
{
    #[Route('/circuits', name: 'app_circuits')]
    public function index(EntityManagerInterface $em): Response
    {
        $circuits = $em->getRepository(Circuit::class)->findBy([], ['round' => 'ASC']);
        return $this->render('circuits/index.html.twig', [
            'circuits' => $circuits,
        ]);
    }

    #[Route('/circuits/{id}', name: 'app_circuit_show')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $circuit = $em->getRepository(Circuit::class)->find($id);
        if (!$circuit) {
            throw $this->createNotFoundException('Circuit non trouvé');
        }
        return $this->render('circuits/show.html.twig', [
            'circuit' => $circuit,
        ]);
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\Actu;
use App\Form\ActuType;
use App\Repository\ActuRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
#[Route('/admin/actus')]
class ActuCrudController extends AbstractController
{
    #[Route('/', name: 'admin_actu_index')]
    public function index(ActuRepository $actuRepository): Response
    {
        $actus = $actuRepository->findBy([], ['datePublication' => 'DESC']);
        return $this->render('actualite/index.html.twig', [
            'actus' => $actus,
        ]);
    }

    #[Route('/new', name: 'admin_actu_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $actu = new Actu();
        $form = $this->createForm(ActuType::class, $actu);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('kernel.project_dir').'/public/uploads/actus',
                    $newFilename
                );
                $actu->setImage($newFilename);
            }
            $actu->setDatePublication(new \DateTime());
            $em->persist($actu);
            $em->flush();
            $this->addFlash('success', 'Actualité ajoutée !');
            return $this->redirectToRoute('admin_actu_index');
        }
        return $this->render('actualite/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_actu_edit')]
    public function edit(Actu $actu, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ActuType::class, $actu);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('kernel.project_dir').'/public/uploads/actus',
                    $newFilename
                );
                $actu->setImage($newFilename);
            }
            $em->flush();
            $this->addFlash('success', 'Actualité modifiée !');
            return $this->redirectToRoute('admin_actu_index');
        }
        return $this->render('actualite/edit.html.twig', [
            'form' => $form->createView(),
            'actu' => $actu,
        ]);
    }

    #[Route('/{id}/delete', name: 'admin_actu_delete', methods: ['POST'])]
    public function delete(Actu $actu, EntityManagerInterface $em, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete'.$actu->getId(), $request->request->get('_token'))) {
            $em->remove($actu);
            $em->flush();
            $this->addFlash('success', 'Actualité supprimée !');
        }
        return $this->redirectToRoute('admin_actu_index');
    }
}

<?php

namespace App\Controller;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentaireController extends AbstractController
{
    #[Route('/commentaire/{id}/edit', name: 'commentaire_edit')]
    public function edit(
        int $id,
        Request $request,
        CommentaireRepository $commentaireRepository,
        EntityManagerInterface $em
    ): Response {
        $commentaire = $commentaireRepository->find($id);
        if (!$commentaire) {
            throw $this->createNotFoundException('Commentaire non trouvé');
        }
        if ($request->isMethod('POST')) {
            $contenu = $request->request->get('commentaire');
            if ($contenu) {
                $commentaire->setContenu($contenu);
                $em->flush();
                return $this->redirectToRoute('gp_resume_show', ['id' => $commentaire->getResumeVideo()->getId()]);
            }
        }
        return $this->render('commentaire/edit.html.twig', [
            'commentaire' => $commentaire,
        ]);
    }

    #[Route('/commentaire/{id}/delete', name: 'commentaire_delete')]
    public function delete(
        int $id,
        CommentaireRepository $commentaireRepository,
        EntityManagerInterface $em
    ): Response {
        $commentaire = $commentaireRepository->find($id);
        if (!$commentaire) {
            throw $this->createNotFoundException('Commentaire non trouvé');
        }
        $videoId = $commentaire->getResumeVideo()->getId();
        $em->remove($commentaire);
        $em->flush();
        return $this->redirectToRoute('gp_resume_show', ['id' => $videoId]);
    }
}

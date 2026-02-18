<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Commentaire;
use App\Repository\ResumeVideoRepository;
use App\Repository\CommentaireRepository;
use Doctrine\ORM\EntityManagerInterface;

class GpResumeController extends AbstractController
{
    #[Route('/gp-resume', name: 'gp_resume')]
    public function index(ResumeVideoRepository $resumeVideoRepository): Response
    {
        $videos = $resumeVideoRepository->findAll();
        return $this->render('gp_resume/index.html.twig', [
            'videos' => $videos
        ]);
    }

    #[Route('/gp-resume/{id}', name: 'gp_resume_show')]
    public function show(
        int $id,
        ResumeVideoRepository $resumeVideoRepository,
        CommentaireRepository $commentaireRepository,
        Request $request,
        EntityManagerInterface $em
    ): Response {
        $video = $resumeVideoRepository->find($id);
        if (!$video) {
            throw $this->createNotFoundException('Vidéo non trouvée');
        }
        // Gestion du formulaire de commentaire
        if ($request->isMethod('POST')) {
            $contenu = $request->request->get('commentaire');
            if ($contenu) {
                if (!$this->getUser()) {
                    $this->addFlash('danger', 'Vous devez être connecté pour poster un commentaire.');
                    return $this->redirectToRoute('app_login');
                }
                $comment = new Commentaire();
                $comment->setContenu($contenu);
                $comment->setResumeVideo($video);
                $comment->setIsApproved(true);
                $comment->setCreatedAt(new \DateTimeImmutable());
                $comment->setUser($this->getUser());
                $em->persist($comment);
                $em->flush();
                return $this->redirectToRoute('gp_resume_show', ['id' => $id]);
            }
        }
        $commentaires = $commentaireRepository->findByResumeVideo($id);
        return $this->render('gp_resume/show.html.twig', [
            'video' => $video,
            'commentaires' => $commentaires,
        ]);
    }
}

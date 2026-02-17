<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/articles', name: 'article_')]
class ArticleController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findBy(['isPublished' => true], ['createdAt' => 'DESC']);
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/{id}', name: 'show')]
    public function show(Article $article): Response
    {
        return $this->render('articles/show.html.twig', [
            'article' => $article,
        ]);
    }
}

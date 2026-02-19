<?php

namespace App\Controller\Admin;

use App\Repository\EcurieRepository;
use App\Repository\CommentaireRepository;
use App\Repository\CourseRepository;
use App\Repository\PiloteRepository;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private EcurieRepository $ecurieRepository,
        private CommentaireRepository $commentaireRepository,
        private CourseRepository $courseRepository,
        private PiloteRepository $piloteRepository,
    ) {}

    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig', [
            'total_ecuries'      => $this->ecurieRepository->count([]),
            'total_commentaires' => $this->commentaireRepository->count([]),
            'total_courses'      => $this->courseRepository->count([]),
            'total_pilotes'      => $this->piloteRepository->count([]),
        ]);
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addCssFile('css/admin.css');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('F1 Zone');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-users', \App\Entity\User::class);
        yield MenuItem::linkToCrud('Écuries', 'fas fa-flag-checkered', \App\Entity\Ecurie::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-comments', \App\Entity\Commentaire::class);
        yield MenuItem::linkToCrud('Circuits', 'fas fa-road', \App\Entity\Circuit::class);
    }
}
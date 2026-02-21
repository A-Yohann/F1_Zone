<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, \Symfony\Component\HttpFoundation\Request $request): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $session = $request->getSession();
        $ip = $request->getClientIp();
        $attempts = $session->get('login_attempts_' . $ip, []);
        $now = time();
        // Nettoyer les tentatives de plus de 15 minutes
        $attempts = array_filter($attempts, function($t) use ($now) { return ($now - $t) < 900; });
        $maxAttempts = 5;
        $remainingAttempts = $maxAttempts - count($attempts);
        $error = null;
        if (count($attempts) >= 5) {
            // Affiche le message seulement une fois
            if (!$session->get('login_blocked_message_shown', false)) {
                $this->addFlash('danger', 'Trop de tentatives de connexion. Veuillez réessayer dans quelques minutes.');
                $session->set('login_blocked_message_shown', true);
            }
            $error = 'Trop de tentatives de connexion. Veuillez réessayer dans quelques minutes.';
        } else {
            if ($authenticationUtils->getLastAuthenticationError()) {
                $attempts[] = $now;
                $session->set('login_attempts_' . $ip, $attempts);
                $this->addFlash('danger', 'Mot de passe ou email incorrect. Tentatives restantes : ' . ($maxAttempts - count($attempts)) . ' / ' . $maxAttempts);
            }
            $error = $authenticationUtils->getLastAuthenticationError();
            $session->set('login_blocked_message_shown', false);
        }
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'remaining_attempts' => $remainingAttempts,
            'max_attempts' => $maxAttempts
        ]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

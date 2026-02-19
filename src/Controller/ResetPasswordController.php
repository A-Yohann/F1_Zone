<?php
namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mailer\TwigMailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

class ResetPasswordController extends AbstractController
{
    #[Route('/forgot-password', name: 'app_forgot_password')]
    public function forgotPassword(Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $user = $em->getRepository(User::class)->findOneBy(['email' => $email]);
            if ($user) {
                $token = bin2hex(random_bytes(32));
                $user->setResetToken($token);
                $user->setResetTokenRequestedAt(new \DateTime());
                $em->flush();
                $resetUrl = $this->generateUrl('app_reset_password', ['token' => $token], 0);
                $emailMessage = (new Email())
                    ->from('no-reply@f1zone.com')
                    ->to($user->getEmail())
                    ->subject('Réinitialisation de votre mot de passe')
                    ->html($this->renderView('security/reset_password_email.html.twig', [
                        'resetUrl' => $resetUrl,
                        'user' => $user,
                    ]));
                try {
                    $mailer->send($emailMessage);
                } catch (TransportExceptionInterface $e) {
                    $this->addFlash('danger', "Erreur d'envoi de l'email.");
                }
                $this->addFlash('success', 'Un email de réinitialisation a été envoyé.');
            } else {
                $this->addFlash('danger', 'Aucun utilisateur trouvé avec cet email.');
            }
        }
        return $this->render('security/forgot_password.html.twig');
    }

    #[Route('/reset-password/{token}', name: 'app_reset_password')]
    public function resetPassword(Request $request, string $token, EntityManagerInterface $em, UserPasswordHasherInterface $hasher): Response
    {
        $user = $em->getRepository(User::class)->findOneBy(['resetToken' => $token]);
        if (!$user || $user->getResetTokenRequestedAt() < (new \DateTime('-1 hour'))) {
            $this->addFlash('danger', 'Lien invalide ou expiré.');
            return $this->redirectToRoute('app_forgot_password');
        }
        if ($request->isMethod('POST')) {
            $password = $request->request->get('password');
            $user->setPassword($hasher->hashPassword($user, $password));
            $user->setResetToken(null);
            $user->setResetTokenRequestedAt(null);
            $em->flush();
            $this->addFlash('success', 'Mot de passe réinitialisé. Vous pouvez vous connecter.');
            return $this->redirectToRoute('app_login');
        }
        return $this->render('security/reset_password.html.twig', [
            'token' => $token
        ]);
    }
}

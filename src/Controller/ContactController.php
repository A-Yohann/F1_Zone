<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $subject = $request->request->get('subject');
            $message = $request->request->get('message');

            if (!$email || !$subject || !$message) {
                $this->addFlash('danger', 'Tous les champs sont obligatoires.');
            } else {
                $to = $_ENV['MAILER_TO'] ?? $_ENV['MAILER_DSN'] ?? null;
                if (!$to || str_contains($to, 'null')) {
                    $to = 'contact@yohanndufresne.fr'; // fallback
                }
                $mail = (new Email())
                    ->from($email)
                    ->to($to)
                    ->subject('[Contact F1-Passion] ' . $subject)
                    ->text($message);
                try {
                    $mailer->send($mail);
                    $this->addFlash('success', 'Votre message a bien été envoyé !');
                } catch (\Exception $e) {
                    $this->addFlash('danger', "Erreur lors de l'envoi du message : " . $e->getMessage());
                }
            }
        }
        return $this->render('contact/contact.html.twig');
    }
}

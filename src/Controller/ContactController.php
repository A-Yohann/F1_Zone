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
                // Limitation par email : max 3 messages par heure
                $session = $request->getSession();
                $now = time();
                $history = $session->get('contact_history', []);
                $history = array_filter($history, function($item) use ($now, $email) {
                    return $item['email'] === $email && ($now - $item['time']) < 3600;
                });
                if (count($history) >= 3) {
                    $this->addFlash('danger', 'Vous avez atteint la limite de 3 messages par heure pour cette adresse email.');
                } else {
                    $to = $_ENV['MAILER_TO'] ?? 'contact@yohanndufresne.fr';
                    $mail = (new Email())
                        ->from($email)
                        ->to($to)
                        ->subject('[Contact F1-Passion] ' . $subject)
                        ->text($message);
                    try {
                        $mailer->send($mail);
                        $this->addFlash('success', 'Votre message a bien été envoyé !');
                        $history[] = ['email' => $email, 'time' => $now];
                        $session->set('contact_history', $history);
                    } catch (\Exception $e) {
                        $this->addFlash('danger', "Erreur lors de l'envoi du message : " . $e->getMessage());
                    }
                }
            }
        }
        return $this->render('contact/contact.html.twig');
    }
}

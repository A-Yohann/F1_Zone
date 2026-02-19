<?php
namespace App\Controller;

use Symfony\Component\Uid\Uuid;
use App\Entity\Quiz;

use App\Repository\QuestionRepository;
use App\Entity\Reponse;
use App\Entity\Question;
use App\Repository\UserReponseRepository;
use App\Entity\UserReponse;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class QuizController extends AbstractController
{
    #[Route('/quiz', name: 'app_quiz')]
    public function index(Request $request, QuestionRepository $questionRepository, SessionInterface $session, EntityManagerInterface $entityManager, UserReponseRepository $userReponseRepository): Response
    {
        $difficulte = $request->query->get('difficulte');
        $questions = [];
        $current = 0;
        $score = 0;
        $showResult = false;
        $message = null;

        // Initialisation du quiz
        if ($difficulte && !$request->isMethod('POST')) {
            $questions = $questionRepository->findByDifficulte($difficulte);
            $session->set('quiz_questions', array_map(fn($q) => $q->getId(), $questions));
            $session->set('quiz_current', 0);
            $session->set('quiz_score', 0);
            $session->set('quiz_difficulte', $difficulte);
            // Générer un UUID pour la session de quiz
            $session->set('quiz_session_id', Uuid::v4()->toRfc4122());
        }

        // Récupération de l'état du quiz
        $questionsIds = $session->get('quiz_questions', []);
        $current = $session->get('quiz_current', 0);
        $score = $session->get('quiz_score', 0);
        $difficulte = $session->get('quiz_difficulte', $difficulte);

        // Gestion de la réponse
        if ($request->isMethod('POST') && $questionsIds) {
            $reponseId = $request->request->get('reponse');
            $reponse = $entityManager->getRepository(Reponse::class)->find($reponseId);
            if ($reponse && $reponse->isCorrect()) {
                $score++;
                $message = 'Bonne réponse !';
            } else {
                $message = 'Mauvaise réponse.';
            }
            // Sauvegarde de la réponse utilisateur
            $user = $this->getUser();
            if ($user && $reponse) {
                $userReponse = new UserReponse();
                $userReponse->setUser($user);
                $userReponse->setQuestion($reponse->getQuestion());
                $userReponse->setReponse($reponse);
                // Ajout du quizSession
                $quizSession = $session->get('quiz_session_id');
                if (!$quizSession) {
                    $quizSession = Uuid::v4()->toRfc4122();
                    $session->set('quiz_session_id', $quizSession);
                }
                $userReponse->setQuizSession($quizSession);
                $entityManager->persist($userReponse);
                $entityManager->flush();
            }
            $current++;
            $session->set('quiz_score', $score);
            $session->set('quiz_current', $current);
        }

        // Affichage de la question suivante ou du résultat
        $question = null;
        $reponses = [];
        if ($questionsIds && $current < count($questionsIds)) {
            $question = $entityManager->getRepository(Question::class)->find($questionsIds[$current]);
            if ($question) {
                $reponses = $question->getReponses()->toArray();
            }
        } elseif ($questionsIds && $current >= count($questionsIds)) {
            $showResult = true;
            $session->remove('quiz_questions');
            $session->remove('quiz_current');
            $session->remove('quiz_difficulte');
        }

        $classement = [];
        if ($showResult) {
            $classementRaw = $userReponseRepository->getClassementParSession();
            $classement = [];
            $skipFirst = true;
            foreach ($classementRaw as $row) {
                if ($skipFirst) { $skipFirst = false; continue; }
                $user = $entityManager->getRepository(User::class)->find($row['user_id']);
                $username = $user ? $user->getUsername() : 'Utilisateur inconnu';

                $quiz = $entityManager->getRepository(\App\Entity\Quiz::class)->find($row['quiz_id']);
                $quizTitre = $quiz ? $quiz->getTitre() : 'Quiz inconnu';

                $date = $row['date_quiz'];
                $difficulteRow = $row['difficulte'];
                $quizSession = $row['quiz_session'];

                $nbBonnes = $userReponseRepository->countBonnesReponses(
                    $row['user_id'],
                    $row['quiz_id'],
                    $difficulteRow,
                    $quizSession
                );
                $nbTotal = (int) $row['nb_reponses'];
                $nbMauvaises = max(0, $nbTotal - $nbBonnes);

                $classement[] = [
                    'username'      => $username,
                    'quiz'          => $quizTitre,
                    'difficulte'    => $difficulteRow,
                    'date'          => is_string($date) ? $date : $date->format('Y-m-d H:i:s'),
                    'nb_tentatives' => 1,
                    'nb_bonnes'     => $nbBonnes,
                    'nb_mauvaises'  => $nbMauvaises,
                ];
            }
        }

        return $this->render('quiz/index.html.twig', [
            'difficulte' => $difficulte,
            'question'   => $question,
            'reponses'   => $reponses,
            'score'      => $score,
            'current'    => $current,
            'total'      => count($questionsIds),
            'showResult' => $showResult,
            'message'    => $message,
            'classement' => $classement,
        ]);
    }

    #[Route('/quiz/classement', name: 'app_quiz_classement')]
    public function classement(UserReponseRepository $userReponseRepository, EntityManagerInterface $entityManager): Response
    {
        $classementRaw = $userReponseRepository->getClassementGlobal();
        $classement = [];
        foreach ($classementRaw as $row) {
            $user = $entityManager->getRepository(User::class)->find($row['user_id']);
            $classement[] = [
                'username'           => $user ? $user->getUsername() : 'Utilisateur inconnu',
                'nb_bonnes_reponses' => $row['nb_reponses'],
            ];
        }
        return $this->render('quiz/classement.html.twig', [
            'classement' => $classement,
        ]);
    }
}
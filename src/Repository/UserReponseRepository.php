<?php

namespace App\Repository;

use App\Entity\UserReponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
// (Pas besoin d'import, utiliser \DateTimeInterface directement si besoin)

/**
 * @extends ServiceEntityRepository<UserReponse>
 */
class UserReponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserReponse::class);
    }

    /**
     * Retourne le classement détaillé par utilisateur, difficulté, quiz et date de tentative.
     * Chaque nouvelle tentative d'un quiz par un utilisateur (par jour) ajoute une ligne distincte.
     *
     * @return array
     */
    public function getClassementParSession(): array
    {
        return $this->createQueryBuilder('ur')
            ->select(
                'IDENTITY(ur.user) as user_id',
                'q.difficulte',
                'IDENTITY(q.quiz) as quiz_id',
                'ur.quizSession as quiz_session',
                'MIN(ur.answeredAt) as date_quiz',
                'COUNT(ur.id) as nb_reponses'
            )
            ->join('ur.question', 'q')
            ->groupBy('ur.user, q.difficulte, quiz_id, quiz_session')
            ->orderBy('user_id', 'ASC')
            ->addOrderBy('q.difficulte', 'ASC')
            ->addOrderBy('quiz_id', 'ASC')
            ->addOrderBy('quiz_session', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Retourne toutes les réponses d'un utilisateur, triées par date de réponse (plus récentes d'abord).
     *
     * @param int $userId
     * @return UserReponse[]
     */
    public function findByUser(int $userId): array
    {
        return $this->createQueryBuilder('ur')
            ->andWhere('ur.user = :userId')
            ->setParameter('userId', $userId)
            ->orderBy('ur.answeredAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Classement global des utilisateurs par nombre de réponses (toutes confondues).
     *
     * @return array
     */
    public function getClassementGlobal(): array
    {
        return $this->createQueryBuilder('ur')
            ->select('IDENTITY(ur.user) as user_id, COUNT(ur.id) as nb_reponses')
            ->groupBy('ur.user')
            ->orderBy('nb_reponses', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Compte le nombre de bonnes réponses pour un utilisateur, un quiz, une difficulté et une date donnée.
     * Le filtre par difficulté est indispensable car nb_reponses est groupé par difficulté.
     *
     * @param int $userId
     * @param int $quizId
     * @param string $difficulte
    * @param string $quizSession  UUID de la session de quiz
     * @return int
     */
    public function countBonnesReponses(int $userId, int $quizId, string $difficulte, string $quizSession): int
    {
        return (int) $this->createQueryBuilder('ur')
            ->select('COUNT(ur.id)')
            ->join('ur.question', 'q')
            ->join('ur.reponse', 'r')
            ->where('ur.user = :userId')
            ->andWhere('q.quiz = :quizId')
            ->andWhere('q.difficulte = :difficulte')
            ->andWhere('r.isCorrect = true')
            ->andWhere('ur.quizSession = :quizSession')
            ->setParameter('userId', $userId)
            ->setParameter('quizId', $quizId)
            ->setParameter('difficulte', $difficulte)
            ->setParameter('quizSession', $quizSession)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
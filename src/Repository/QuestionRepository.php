<?php

namespace App\Repository;

use App\Entity\Question;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Question>
 */
class QuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Question::class);
    }

    /**
     * @param string $difficulte
     * @return Question[]
     */
    public function findByDifficulte(string $difficulte): array
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.difficulte = :difficulte')
            ->setParameter('difficulte', $difficulte)
            ->orderBy('q.ordre', 'ASC')
            ->getQuery()
            ->getResult();
    }
}

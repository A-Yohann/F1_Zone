<?php

namespace App\Repository;

use App\Entity\Commentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CommentaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commentaire::class);
    }

    /**
     * @return Commentaire[]
     */
    public function findByResumeVideo($resumeVideoId): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.resumeVideo = :resumeVideoId')
            ->setParameter('resumeVideoId', $resumeVideoId)
            ->orderBy('c.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}

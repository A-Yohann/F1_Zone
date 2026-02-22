<?php

namespace App\Repository;

use App\Entity\ResumeVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ResumeVideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResumeVideo::class);
    }
    /**
     * @param int $page
     * @param int $limit
     * @return ResumeVideo[]
     */
    public function findPaginated(int $page, int $limit): array
    {
        return $this->createQueryBuilder('v')
            ->orderBy('v.id', 'ASC')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }
}

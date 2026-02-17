<?php

namespace App\Repository;

use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;





class CourseRepository extends ServiceEntityRepository
{
    /**
     * Retourne le classement des pilotes pour un Grand Prix donné (nomGrandPrix)
     */
    public function getClassementPilotesByGrandPrix(string $nomGrandPrix): array
    {
        $qb = $this->createQueryBuilder('c')
            ->select('p.id, p.nom, p.prenom, SUM(c.points) as totalPoints')
            ->join('c.pilote', 'p')
            ->where('c.nomGrandPrix = :nomGrandPrix')
            ->setParameter('nomGrandPrix', $nomGrandPrix)
            ->groupBy('p.id')
            ->orderBy('totalPoints', 'DESC');
        return $qb->getQuery()->getResult();
    }

    /**
     * Retourne le classement des écuries pour un Grand Prix donné (nomGrandPrix)
     */
    public function getClassementEcuriesByGrandPrix(string $nomGrandPrix): array
    {
        $qb = $this->createQueryBuilder('c')
            ->select('e.id, e.nom, SUM(c.points) as totalPoints')
            ->join('c.ecurie', 'e')
            ->where('c.nomGrandPrix = :nomGrandPrix')
            ->setParameter('nomGrandPrix', $nomGrandPrix)
            ->groupBy('e.id')
            ->orderBy('totalPoints', 'DESC');
        return $qb->getQuery()->getResult();
    }
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Course::class);
    }
    /**
     * Retourne le classement cumulé des pilotes jusqu'à un GP inclus
     */
    public function getClassementPilotesCumulUpto(string $nomGrandPrix): array
    {
        // Trouver la date du GP sélectionné
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT date_course FROM course WHERE nom_grand_prix = :gp ORDER BY date_course DESC LIMIT 1';
        $date = $conn->executeQuery($sql, ['gp' => $nomGrandPrix])->fetchOne();
        if (!$date) return [];
        $qb = $this->createQueryBuilder('c')
            ->select('p.id, p.nom, p.prenom, SUM(c.points) as totalPoints')
            ->join('c.pilote', 'p')
            ->where('c.dateCourse <= :date')
            ->setParameter('date', $date)
            ->groupBy('p.id')
            ->orderBy('totalPoints', 'DESC');
        return $qb->getQuery()->getResult();
    }

    /**
     * Retourne le classement cumulé des écuries jusqu'à un GP inclus
     */
    public function getClassementEcuriesCumulUpto(string $nomGrandPrix): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT date_course FROM course WHERE nom_grand_prix = :gp ORDER BY date_course DESC LIMIT 1';
        $date = $conn->executeQuery($sql, ['gp' => $nomGrandPrix])->fetchOne();
        if (!$date) return [];
        $qb = $this->createQueryBuilder('c')
            ->select('e.id, e.nom, SUM(c.points) as totalPoints')
            ->join('c.ecurie', 'e')
            ->where('c.dateCourse <= :date')
            ->setParameter('date', $date)
            ->groupBy('e.id')
            ->orderBy('totalPoints', 'DESC');
        return $qb->getQuery()->getResult();
    }
    /**
     * Retourne le classement général des pilotes (tous GP confondus)
     */
    public function getClassementPilotes(): array
    {
        $qb = $this->createQueryBuilder('c')
            ->select('p.id, p.nom, p.prenom, SUM(c.points) as totalPoints')
            ->join('c.pilote', 'p')
            ->groupBy('p.id')
            ->orderBy('totalPoints', 'DESC');
        return $qb->getQuery()->getResult();
    }

    /**
     * Retourne le classement général des écuries (tous GP confondus)
     */
    public function getClassementEcuries(): array
    {
        $qb = $this->createQueryBuilder('c')
            ->select('e.id, e.nom, SUM(c.points) as totalPoints')
            ->join('c.ecurie', 'e')
            ->groupBy('e.id')
            ->orderBy('totalPoints', 'DESC');
        return $qb->getQuery()->getResult();
    }
}

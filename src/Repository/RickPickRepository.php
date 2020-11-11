<?php

namespace App\Repository;

use App\Entity\RickPick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RickPick|null find($id, $lockMode = null, $lockVersion = null)
 * @method RickPick|null findOneBy(array $criteria, array $orderBy = null)
 * @method RickPick[]    findAll()
 * @method RickPick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RickPickRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RickPick::class);
    }

    // /**
    //  * @return RickPick[] Returns an array of RickPick objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RickPick
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

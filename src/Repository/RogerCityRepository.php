<?php

namespace App\Repository;

use App\Entity\RogerCity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RogerCity|null find($id, $lockMode = null, $lockVersion = null)
 * @method RogerCity|null findOneBy(array $criteria, array $orderBy = null)
 * @method RogerCity[]    findAll()
 * @method RogerCity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RogerCityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RogerCity::class);
    }

    // /**
    //  * @return RogerCity[] Returns an array of RogerCity objects
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
    public function findOneBySomeField($value): ?RogerCity
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

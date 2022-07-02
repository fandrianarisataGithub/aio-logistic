<?php

namespace App\Repository;

use App\Entity\TransMarquePneu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransMarquePneu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransMarquePneu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransMarquePneu[]    findAll()
 * @method TransMarquePneu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransMarquePneuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransMarquePneu::class);
    }

    // /**
    //  * @return TransMarquePneu[] Returns an array of TransMarquePneu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TransMarquePneu
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

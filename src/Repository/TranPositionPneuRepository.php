<?php

namespace App\Repository;

use App\Entity\TranPositionPneu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TranPositionPneu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TranPositionPneu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TranPositionPneu[]    findAll()
 * @method TranPositionPneu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TranPositionPneuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TranPositionPneu::class);
    }

    // /**
    //  * @return TranPositionPneu[] Returns an array of TranPositionPneu objects
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
    public function findOneBySomeField($value): ?TranPositionPneu
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

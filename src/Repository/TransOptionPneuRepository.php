<?php

namespace App\Repository;

use App\Entity\TransOptionPneu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransOptionPneu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransOptionPneu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransOptionPneu[]    findAll()
 * @method TransOptionPneu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransOptionPneuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransOptionPneu::class);
    }

    // /**
    //  * @return TransOptionPneu[] Returns an array of TransOptionPneu objects
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
    public function findOneBySomeField($value): ?TransOptionPneu
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

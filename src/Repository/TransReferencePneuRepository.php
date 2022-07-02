<?php

namespace App\Repository;

use App\Entity\TransReferencePneu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransReferencePneu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransReferencePneu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransReferencePneu[]    findAll()
 * @method TransReferencePneu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransReferencePneuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransReferencePneu::class);
    }

    // /**
    //  * @return TransReferencePneu[] Returns an array of TransReferencePneu objects
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
    public function findOneBySomeField($value): ?TransReferencePneu
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

<?php

namespace App\Repository;

use App\Entity\TransClientVoyageCarb;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransClientVoyageCarb|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransClientVoyageCarb|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransClientVoyageCarb[]    findAll()
 * @method TransClientVoyageCarb[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransClientVoyageCarbRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransClientVoyageCarb::class);
    }
    public function findAllclient()
    {
        return $this->createQueryBuilder('t')
            ->select('t.nom')
            ->orderBy('t.rang', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return TransClientVoyageCarb[] Returns an array of TransClientVoyageCarb objects
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
    public function findOneBySomeField($value): ?TransClientVoyageCarb
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

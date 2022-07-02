<?php

namespace App\Repository;

use App\Entity\TransTrajetVoyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransTrajetVoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransTrajetVoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransTrajetVoyage[]    findAll()
 * @method TransTrajetVoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransTrajetVoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransTrajetVoyage::class);
    }
    public function findAllTrajet()
    {
        return $this->createQueryBuilder('t')
            ->select('t.nom','t.montant')
            ->orderBy('t.rang', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return TransTrajetVoyage[] Returns an array of TransTrajetVoyage objects
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
    public function findOneBySomeField($value): ?TransTrajetVoyage
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

<?php

namespace App\Repository;

use App\Entity\TransPneuEntre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransPneuEntre|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransPneuEntre|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransPneuEntre[]    findAll()
 * @method TransPneuEntre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransPneuEntreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransPneuEntre::class);
    }

    // /**
    //  * @return TransPneuEntre[] Returns an array of TransPneuEntre objects
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
    public function findOneBySomeField($value): ?TransPneuEntre
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

<?php

namespace App\Repository;

use App\Entity\TransCodeDesignationPiece;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransCodeDesignationPiece|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransCodeDesignationPiece|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransCodeDesignationPiece[]    findAll()
 * @method TransCodeDesignationPiece[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransCodeDesignationPieceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransCodeDesignationPiece::class);
    }

    /**
     * @return TransCodeDesignationPiece[] Returns an array of TransCodeDesignationPiece objects
     */
    public function findAllByCode()
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?TransCodeDesignationPiece
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

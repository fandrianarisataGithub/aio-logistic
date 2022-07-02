<?php

namespace App\Repository;

use App\Entity\TransPiece;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransPiece|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransPiece|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransPiece[]    findAll()
 * @method TransPiece[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransPieceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransPiece::class);
    }

    // /**
    //  * @return TransPiece[] Returns an array of TransPiece objects
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
    public function findOneBySomeField($value): ?TransPiece
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function pluckDesignation(){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT id, designation, prix, qte, code  FROM trans_piece WHERE qte > 0 GROUP BY id ORDER BY designation';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery();
        return $stmt->fetchAllAssociative();
    }
}

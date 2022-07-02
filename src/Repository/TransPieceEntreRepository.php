<?php

namespace App\Repository;

use App\Entity\TransPieceEntre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransPieceEntre|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransPieceEntre|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransPieceEntre[]    findAll()
 * @method TransPieceEntre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransPieceEntreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransPieceEntre::class);
    }

    /**
     * @return TransPieceEntre[] Returns an array of TransPieceEntre objects
     */
    public function findAllCodeDes()
    {
        return $this->createQueryBuilder('t')
            ->SELECT('t.code, t.designation')
            ->orderBy('t.code', 'ASC')
            ->groupBy('t.code')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?TransPieceEntre
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function entrerPiece($date1=null,$date2=null){

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT 
                e.id, 
                DATE_FORMAT(e.created_at,"%d/%m/%Y") as date, 
                e.fournisseur, 
                e.bl, 
                e.code, 
                e.designation, 
                e.qte, 
                e.prix as prix, 
                e.prix_total as prix_total, 
                p.qte as stock_qte 
            FROM trans_piece_entre e 
            INNER JOIN trans_piece p 
            WHERE p.designation = e.designation AND p.code = e.code
            /*WHERE t.price > :price
            ORDER BY t.price ASC*/
            ';
        $params = [];
        if(null!=$date1){
            $sql .= ' WHERE e.created_at >= :date1';
            $params['date1'] = $date1;
        }
        if(null!=$date2){
            if(null==$date1) {
                $sql .= ' WHERE e.created_at <= :date2';
            }else{
                $sql .= ' AND e.created_at <= :date2';
            }
            $params['date2'] = $date2 .' 23:59:00.000';
        }
        $sql .= ' ORDER BY e.created_at DESC';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery($params);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();
    }

    public function stockPiece($date1=null,$date2=null){

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT 
                id, 
                DATE_FORMAT(updated_at,"%d/%m/%Y") as date, 
                code, 
                designation, 
                qte, 
                REPLACE(FORMAT(prix,2),","," ") as prix, 
                REPLACE(FORMAT(prix_total,2),","," ") as prix_total 
            FROM trans_piece WHERE qte > 0
            /*WHERE t.price > :price
            ORDER BY t.price ASC*/
            ';
        $params = [];

        $sql .= ' ORDER BY updated_at DESC';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery($params);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();
    }
}

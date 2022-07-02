<?php

namespace App\Repository;

use App\Entity\TransInterventionDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransInterventionDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransInterventionDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransInterventionDetail[]    findAll()
 * @method TransInterventionDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransInterventionDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransInterventionDetail::class);
    }

    // /**
    //  * @return TransIntervention[] Returns an array of TransIntervention objects
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

    
    public function findAllPiece($value)
    {
        $fichePiece = $this->createQueryBuilder('t')
            ->select('
                piece.designation as designation,
                SUM(t.qte) as qte,
                piece.prix as prix,
                piece.id as total
            ')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.intervention = int.id')
            ->leftJoin('App\Entity\TransPiece', 'piece', 'WITH', 't.piece = piece.id')
            ->andWhere('int.id = :val')
            ->setParameter('val', $value)
            ->groupBy('piece.designation')
            ->getQuery()
            ->getResult()
        ; 
        return $fichePiece;
    }
    
}

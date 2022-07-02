<?php

namespace App\Repository;

use App\Entity\TransCarburantEntre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransCarburantEntre|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransCarburantEntre|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransCarburantEntre[]    findAll()
 * @method TransCarburantEntre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransCarburantEntreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransCarburantEntre::class);
    }
    public function calculateTotalEntre()
    {
        $arrayGasoil = $this->createQueryBuilder('t')
            ->select('SUM(t.litrage) AS total_entre_gasoil')
            ->where('t.typeCarburant = :type')
            ->setParameter('type' , 'GASOIL')
            ->getQuery()
            ->getResult()
        ;
        $arrayEssence = $this->createQueryBuilder('t')
            ->select('SUM(t.litrage) AS total_entre_essence')
            ->where('t.typeCarburant = :type')
            ->setParameter('type' , 'ESSENCE')
            ->getQuery()
            ->getResult()
        ;
        return [
            'total_entre_gasoil' => $arrayGasoil[0]['total_entre_gasoil'],
            'total_entre_essence' => $arrayEssence[0]['total_entre_essence']
        ];
    }

    // /**
    //  * @return TransCarburantEntre[] Returns an array of TransCarburantEntre objects
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
    public function findOneBySomeField($value): ?TransCarburantEntre
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

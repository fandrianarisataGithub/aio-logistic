<?php

namespace App\Repository;

use App\Entity\TransPneuHist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransPneuHist|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransPneuHist|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransPneuHist[]    findAll()
 * @method TransPneuHist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransPneuHistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransPneuHist::class);
    }

    public function selectAllAnnee()
    {
        return $this->createQueryBuilder('t')
            ->select('YEAR(t.created_at) AS annee')
            ->groupBy('annee')
            ->orderBy('annee', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function allPneuSortie($annee, $mois = null)
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT 
                    tp.type as type_pneu,
                    SUM(th.qte) as total_par_qte,
                    SUM(REPLACE(REPLACE(th.montant, "-", ""), " ", "")) as somme_montant
            FROM `trans_pneu_hist` th  
            LEFT JOIN `trans_pneu` tp
            ON tp.id = th.pneu_id
            WHERE th.qte = 1 AND tp.serie IS NOT NULL AND YEAR(th.created_at) = '. $annee .'
            GROUP BY type_pneu
            ORDER BY tp.type ASC
        '
        ;
        if($mois != null){
            $sql = '
                SELECT 
                        tp.type as type_pneu,
                        SUM(th.qte) as total_par_qte,
                        SUM(REPLACE(REPLACE(th.montant, "-", ""), " ", "")) as somme_montant
                FROM `trans_pneu_hist` th  
                LEFT JOIN `trans_pneu` tp
                ON tp.id = th.pneu_id
                WHERE th.qte = 1 AND tp.serie IS NOT NULL AND YEAR(th.created_at) = '. $annee .' AND MONTH(th.created_at) = '. $mois .'
                GROUP BY type_pneu
                ORDER BY tp.type ASC
            '
            ;
        }
        $params = [];

        $stmt = $conn->prepare($sql);
        $stmt->executeQuery($params);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();
    }
    public function findTotalNbrPneuSortie($taona, $mois = null)
    {
        if($mois == null){
            
            $dataPneuInit = [
                'montant' => [null,null,null,null,null,null,null,null,null,null,null,null],
                'nbr' => [null,null,null,null,null,null,null,null,null,null,null,null]
            ];
            $conn = $this->getEntityManager()->getConnection();
    
            $sql = '
                SELECT
                    MONTH(th.created_at) AS mois, 
                    SUM(REPLACE(REPLACE(th.montant, "-", ""), " ", "")) AS totalMontant, 
                    SUM(th.qte) as total_par_qte
                FROM `trans_pneu_hist` th 
                LEFT JOIN `trans_pneu` tp
                ON tp.id = th.pneu_id
                WHERE YEAR(th.created_at) = :taona AND th.qte = 1 AND tp.serie IS NOT NULL
                group by MONTH(th.created_at)
            ';
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery(['taona' => $taona]);
    
            // returns an array of arrays (i.e. a raw data set)
            $result = $resultSet->fetchAllAssociative();
    
            // conmbinaison des deux tables
            $totalNombre = 0;
            $caTotalConsomme = 0;
            foreach ($result as $value) {
                $num = intval($value['mois'] - 1);
                $dataPneuInit['montant'][$num] = intval($value['totalMontant']);
                $dataPneuInit['nbr'][$num] = intval($value['total_par_qte']);
                $totalNombre = $totalNombre + $value['total_par_qte'];
                $caTotalConsomme = $caTotalConsomme + $value['totalMontant'];
            }
            return [
                'dataChart' => $dataPneuInit,
                'nbr' => $totalNombre,
                'caCons' => $caTotalConsomme
            ];
        }else{
            
            $dataPneuInit = [
                'montant' => [],
                'nbr' => []
            ];
            $date = new \DateTime($taona . '-' . $mois . '-01');
            $date->modify('last day of this month');
            $nbrDays = intval($date->format('d'));
           
            for($i = 1; $i <= $nbrDays; $i++){
                array_push($dataPneuInit['montant'], null);
                array_push($dataPneuInit['nbr'], null);
            }
            $conn = $this->getEntityManager()->getConnection();
    
            $sql = '
                SELECT
                    DAY(th.created_at) AS jour,
                    MONTH(th.created_at) AS mois, 
                    SUM(REPLACE(REPLACE(th.montant, "-", ""), " ", "")) AS totalMontant, 
                    SUM(th.qte) as total_par_qte
                FROM `trans_pneu_hist` th 
                LEFT JOIN `trans_pneu` tp
                ON tp.id = th.pneu_id
                WHERE YEAR(th.created_at) = :taona AND MONTH(th.created_at) = :mois AND th.qte = 1 AND tp.serie IS NOT NULL
                group by DAY(th.created_at)
            ';
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery(['taona' => $taona, 'mois' => $mois]);
    
            // returns an array of arrays (i.e. a raw data set)
            $result = $resultSet->fetchAllAssociative();
    
            // conmbinaison des deux tables
            $totalNombre = 0;
            $caTotalConsomme = 0;
            foreach ($result as $value) {
                $num = intval($value['jour'] - 1);
                $dataPneuInit['montant'][$num] = intval($value['totalMontant']);
                $dataPneuInit['nbr'][$num] = intval($value['total_par_qte']);
                $totalNombre = $totalNombre + $value['total_par_qte'];
                $caTotalConsomme = $caTotalConsomme + $value['totalMontant'];
            }
            
            return [
                'dataChart' => $dataPneuInit,
                'nbr' => $totalNombre,
                'caCons' => $caTotalConsomme
            ];
        }
    }
    // /**
    //  * @return TransPneuHist[] Returns an array of TransPneuHist objects
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
    public function findOneBySomeField($value): ?TransPneuHist
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

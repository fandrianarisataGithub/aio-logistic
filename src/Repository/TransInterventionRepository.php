<?php

namespace App\Repository;

use App\Entity\TransIntervention;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method TransIntervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransIntervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransIntervention[]    findAll()
 * @method TransIntervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransInterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransIntervention::class);
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

    /*
    public function findOneBySomeField($value): ?TransIntervention
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function listIntervention($date1=null,$date2=null,$piece_id=null){

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT 
                i.id, 
                DATE_FORMAT(date_debut,"%d/%m/%Y %H:%i") as date_debut, 
                DATE_FORMAT(date_fin,"%d/%m/%Y %H:%i") as date_fin, 
                t.id as vehicule_id, 
                t.immatriculation, 
                km, 
                ot, 
                motif,
                client,
                chauffeur_id,
                (SELECT CONCAT(appellation," - ",matricule) 
                    FROM trans_chauffeur 
                    WHERE trans_chauffeur.id = i.chauffeur_id
                ) as chauffeur, 
                (SELECT COUNT(*) FROM trans_intervention_detail as d WHERE d.intervention_id = i.id AND d.qte > 0) as nb_pieces, 
                CONCAT(intervenant, "<br/>", lieu_intervention) as intervenant, 
                commentaire, 
                (SELECT SUM(ROUND(ds.qte * p.prix * 1.2 , 2)) FROM trans_intervention_detail as ds INNER JOIN trans_piece p ON p.id = ds.piece_id WHERE ds.intervention_id = i.id ) as total  
                FROM trans_intervention i 
                LEFT JOIN trans_vehicule t 
                ON t.id = i.vehicule_id 
                LEFT JOIN trans_intervention_detail AS d
                ON i.id = d.intervention_id
                LEFT JOIN trans_piece AS p
                ON p.id = d.piece_id   
                WHERE (SELECT COUNT(*) FROM trans_intervention_detail as d WHERE d.intervention_id = i.id AND d.qte > 0) > 0
        ';
        $params = [];
        if(null!=$piece_id){
            $sql .= ' AND p.id = :piece_id';
            $params['piece_id'] = $piece_id;
        }
        if(null!=$date1){
            $sql .= ' AND i.date_debut >= :date1';
            $params['date1'] = $date1;
        }
        if(null!=$date2){
            $sql .= ' AND i.date_debut <= :date2';
            $params['date2'] = $date2 .' 23:59:00.000';
        }
        $sql .= ' GROUP BY i.id';
        $sql .= ' ORDER BY i.date_debut DESC';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery($params);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();
    }
    public function selectAllAnnee()
    {
        return $this->createQueryBuilder('t')
            ->select('YEAR(t.date_debut) AS annee')
            ->groupBy('annee')
            ->orderBy('annee', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function selectAllClient()
    {
        return $this->createQueryBuilder('t')
            ->select('t.client')
            ->groupBy('t.client')
            ->orderBy('t.client', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function dataGraphIntervention($client = null, $annee, $mois = null)
    {
        if($mois == null){
            $dataInterventionInit = [
                'montant' => [null,null,null,null,null,null,null,null,null,null,null,null],
                'nbrIntervention' => [null,null,null,null,null,null,null,null,null,null,null,null]
            ];
            $conn = $this->getEntityManager()->getConnection();
            $sql = '
                SELECT 
                    COUNT(i.id) AS nbrIntervention, 
                    MONTH(i.date_debut) AS mois,
                    (SELECT SUM(ROUND(ds.qte * p.prix * 1.2 , 2)) FROM trans_intervention_detail as ds INNER JOIN trans_piece p ON p.id = ds.piece_id) as totalMontant  
                    FROM trans_intervention i 
                    WHERE YEAR(i.date_debut) = :annee
            ';
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery(['annee' => $annee]);
            // returns an array of arrays (i.e. a raw data set)
            $result = $resultSet->fetchAllAssociative();
            $totalVoyageParAnnee = 0;
            $caTotalParAnnee = 0;
            foreach ($result as $value) {
                $num = intval($value['mois'] - 1);
                $dataInterventionInit['montant'][$num] = intval($value['totalMontant']);
                $dataInterventionInit['nbrIntervention'][$num] = intval($value['nbrIntervention']);
                $caTotalParAnnee = $caTotalParAnnee + $value['totalMontant'];
                $totalVoyageParAnnee = $totalVoyageParAnnee + $value['nbrIntervention'];
            }
            
            return [
                'dataChart' => $dataInterventionInit,
                'totalIntervention' => $totalVoyageParAnnee,
                'totalCaIntervention' => $caTotalParAnnee
            ];
        }else{
            $dataInterventionInit = [
                'montant' => [],
                'nbrIntervention' => []
            ];
            $date = new \DateTime($annee . '-' . $mois . '-01');
            $date->modify('last day of this month');
            $nbrDays = intval($date->format('d'));
            //dd($dataCarbInit);
            for($i = 1; $i <= $nbrDays; $i++){
                array_push($dataInterventionInit['montant'], null);
                array_push($dataInterventionInit['nbrIntervention'], null);
            }

            $conn = $this->getEntityManager()->getConnection();
            $sql = '
                SELECT 
                    COUNT(i.id) AS nbrIntervention, 
                    DAY(i.date_debut) AS jour,
                    MONTH(i.date_debut) AS mois,
                    SUM(ROUND(ds.qte * p.prix * 1.2 , 2)) AS totalMontant
                    FROM trans_intervention i
                    INNER JOIN trans_intervention_detail AS ds ON ds.intervention_id = i.id
                    INNER JOIN trans_piece p ON p.id = ds.piece_id
                     
                    WHERE YEAR(i.date_debut) = :annee AND MONTH(i.date_debut) = :mois
                    GROUP BY jour
            ';
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery(['annee' => $annee, 'mois' => $mois]);
            // returns an array of arrays (i.e. a raw data set)
            $result = $resultSet->fetchAllAssociative();
            //dd($result);
            if($client){
                $sql = '
                    SELECT 
                    COUNT(i.id) AS nbrIntervention, 
                    DAY(i.date_debut) AS jour,
                    MONTH(i.date_debut) AS mois,
                    SUM(ROUND(ds.qte * p.prix * 1.2 , 2)) AS totalMontant
                    FROM trans_intervention i
                    INNER JOIN trans_intervention_detail AS ds ON ds.intervention_id = i.id
                    INNER JOIN trans_piece p ON p.id = ds.piece_id
                    
                    WHERE YEAR(i.date_debut) = :annee AND MONTH(i.date_debut) = :mois AND i.client = :client
                    GROUP BY jour
                ';
                $stmt = $conn->prepare($sql);
                $resultSet = $stmt->executeQuery(['annee' => $annee, 'mois' => $mois, 'client' => $client]);
                // returns an array of arrays (i.e. a raw data set)
                $result = $resultSet->fetchAllAssociative();
            }

            $totalInterventionParMois = 0;
            $caTotalParMois = 0;
            foreach ($result as $value) {
                $num = intval($value['jour'] - 1);
                $dataInterventionInit['montant'][$num] = intval($value['totalMontant']);
                $dataInterventionInit['nbrIntervention'][$num] = intval($value['nbrIntervention']);
                $caTotalParMois = $caTotalParMois + $value['totalMontant'];
                $totalInterventionParMois = $totalInterventionParMois + $value['nbrIntervention'];
            }
            return [
                'dataChart' => $dataInterventionInit,
                'totalIntervention' => $totalInterventionParMois,
                'totalCaIntervention' => $caTotalParMois
            ];
        }
    }

    public function listPiece($id){

        $conn = $this->getEntityManager()->getConnection();
        // le prix total tsy fixe de aleo atao aty @ back le * 1.2
        $sql = '
            SELECT 
                p.designation, 
                p.code, d.qte, 
                p.prix, 
                (p.prix * d.qte) as total , 
                p.id, 
                IF(p.qte <= d.qte, ROUND(d.qte,2), 
                ROUND(p.qte,2)) as max, 
                d.id as detail_id 
            FROM trans_piece p 
            INNER JOIN trans_intervention_detail d ON d.piece_id = p.id WHERE d.intervention_id = :id AND d.qte > 0
            /*WHERE t.price > :price
            ORDER BY t.price ASC*/
            ';
        $params = [];
        $params['id'] = $id;
        $sql .= ' ORDER BY d.created_at DESC';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery($params);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();
    }
}

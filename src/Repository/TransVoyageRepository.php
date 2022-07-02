<?php

namespace App\Repository;

use App\Entity\TransVoyage;
use Doctrine\ORM\Query\Expr\Func;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method TransVoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransVoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransVoyage[]    findAll()
 * @method TransVoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransVoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransVoyage::class);
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
    public function findTotalVoyageForGraph($client = null, $annee, $mois = null)
    {
        if($mois == null){
            $dataVoyageInit = [
                'montant' => [null,null,null,null,null,null,null,null,null,null,null,null],
                'nbrVoyage' => [null,null,null,null,null,null,null,null,null,null,null,null]
            ];
            $result = $this->createQueryBuilder('t')
            ->select('
                MONTH(t.created_at) AS mois,
                SUM(t.montant) AS totalMontant,
                COUNT(t.id) AS nbrVoyage
            ')
            ->where('
                YEAR(t.created_at) = :annee
            ')
            ->setParameters(new ArrayCollection([
                new Parameter('annee', $annee)
            ]));
            if($client){
                $result = $result
                        ->andWhere('t.client = :client')
                        ->setParameter('client', $client)
                ;
            }
            $result = $result
                ->groupBy('mois')
                ->getQuery()
                ->getResult()
            ;
            //dd($result);
            $totalVoyageParAnnee = 0;
            $caTotalParAnnee = 0;
            foreach ($result as $value) {
                $num = intval($value['mois'] - 1);
                $dataVoyageInit['montant'][$num] = intval($value['totalMontant']);
                $dataVoyageInit['nbrVoyage'][$num] = intval($value['nbrVoyage']);
                $caTotalParAnnee = $caTotalParAnnee + $value['totalMontant'];
                $totalVoyageParAnnee = $totalVoyageParAnnee + $value['nbrVoyage'];
            }
            
            return [
                'dataChart' => $dataVoyageInit,
                'totalVoyage' => $totalVoyageParAnnee,
                'totalCaVoyage' => $caTotalParAnnee
            ];
        }else{
            $dataVoyageInit = [
                'montant' => [],
                'nbrVoyage' => []
            ];
            $date = new \DateTime($annee . '-' . $mois . '-01');
            $date->modify('last day of this month');
            $nbrDays = intval($date->format('d'));
            //dd($dataCarbInit);
            for($i = 1; $i <= $nbrDays; $i++){
                array_push($dataVoyageInit['montant'], null);
                array_push($dataVoyageInit['nbrVoyage'], null);
            }

            $result = $this->createQueryBuilder('t')
            ->select('
                DAY(t.created_at) AS jour,
                MONTH(t.created_at) AS mois,
                SUM(t.montant) AS totalMontant,
                COUNT(t.id) AS nbrVoyage
            ')
            ->where('
                YEAR(t.created_at) = :annee AND MONTH(t.created_at) = :mois
            ')
            ->setParameters(new ArrayCollection([
                new Parameter('annee', $annee),
                new Parameter('mois', $mois)
            ]));
            if($client){
                $result = $result
                        ->andWhere('t.client = :client')
                        ->setParameter('client', $client)
                ;
            }
            $result = $result
                ->groupBy('jour')
                ->getQuery()
                ->getResult()
            ;
            $totalVoyageParMois = 0;
            $caTotalParMois = 0;
            foreach ($result as $value) {
                $num = intval($value['jour'] - 1);
                $dataVoyageInit['montant'][$num] = intval($value['totalMontant']);
                $dataVoyageInit['nbrVoyage'][$num] = intval($value['nbrVoyage']);
                $caTotalParMois = $caTotalParMois + $value['totalMontant'];
                $totalVoyageParMois = $totalVoyageParMois + $value['nbrVoyage'];
            }
            
            return [
                'dataChart' => $dataVoyageInit,
                'totalVoyage' => $totalVoyageParMois,
                'totalCaVoyage' => $caTotalParMois
            ];
        }
    }
    // /**
    //  * @return TransVoyage[] Returns an array of TransVoyage objects
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
    public function findOneBySomeField($value): ?TransVoyage
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function listVoyage($date1=null,$date2=null){

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT 
                v.id,
                c.id as chauffeur_id, 
                t.id as vehicule_id, 
                DATE_FORMAT(v.created_at,"%d/%m/%Y") as date, 
                t.immatriculation, 
                CONCAT(c.appellation," - ",c.matricule) as prenom, 
                client, 
                ot,
                t.id as vehicule_id, 
                DATE_FORMAT(date_debut,"%d/%m/%Y %H:%i") as date_debut, 
                DATE_FORMAT(date_fin,"%d/%m/%Y %H:%i") as date_fin, 
                trajet, montant, facture 
            FROM trans_voyage v 
            INNER JOIN trans_vehicule t ON t.id = v.vehicule_id 
            INNER JOIN trans_chauffeur c ON c.id = v.chauffeur_id 
            /*WHERE t.price > :price
            ORDER BY t.price ASC*/
            ';
        $params = [];
        if(null!=$date1){
            $sql .= ' WHERE v.date_debut >= :date1';
            $params['date1'] = $date1;
        }
        if(null!=$date2){
            if(null==$date1) {
                $sql .= ' WHERE v.date_debut <= :date2';
            }else{
                $sql .= ' AND v.date_debut <= :date2';
            }
            $params['date2'] = $date2 .' 23:59:00.000';
        }
        $sql .= ' ORDER BY v.created_at DESC';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery($params);
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();

    }
}

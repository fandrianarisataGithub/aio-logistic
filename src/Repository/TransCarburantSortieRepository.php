<?php

namespace App\Repository;

use App\Entity\TransCarburantSortie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransCarburantSortie|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransCarburantSortie|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransCarburantSortie[]    findAll()
 * @method TransCarburantSortie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransCarburantSortieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransCarburantSortie::class);
    }
    public function calculateTotalSortie()
    {
        $arrayGasoil = $this->createQueryBuilder('t')
            ->select('SUM(t.litrage) AS total_sortie_gasoil')
            ->where('t.typeCarburant = :type AND t.station = :station')
            ->setParameter('type' , 'GASOIL')
            ->setParameter('station' , 'BASE TANA')
            ->getQuery()
            ->getResult()
        ;
        $arrayEssence = $this->createQueryBuilder('t')
            ->select('SUM(t.litrage) AS total_sortie_essence')
            ->where('t.typeCarburant = :type')
            ->setParameter('type' , 'ESSENCE')
            ->getQuery()
            ->getResult()
        ;
        return [
            'total_sortie_gasoil' => $arrayGasoil[0]['total_sortie_gasoil'],
            'total_sortie_essence' => $arrayEssence[0]['total_sortie_essence']
        ];
    }
    public function selectAllClient($type)
    {
        return $this->createQueryBuilder('t')
            ->select('t.client')
            ->where('t.typeCarburant = :type')
            ->setParameter('type', $type)
            ->groupBy('t.client')
            ->orderBy('t.client', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findAllCarbBetween($date1 = null, $date2 = null)
    {

        $sqlAsc = $this->createQueryBuilder('t')
            ->select('
                t.createdAt As date,
                t.station,
                vehiculeSortie.immatriculation As immatriculation,
                t.kilometrage,
                chauffeurSortie.prenom As prenom,
                t.client,
                t.typeCarburant,
                t.litrage,
                t.fondReservoir,
                t.trajet,
                t.montant
            ')
            ->innerjoin('App\Entity\TransChauffeur', 'chauffeurSortie', 'WITH', 'chauffeurSortie.id = t.chauffeur')
            ->innerjoin('App\Entity\TransVehicule', 'vehiculeSortie', 'WITH', 'vehiculeSortie.id = t.vehicule')
        ;
        if($date1 && $date2){
            $sqlAsc = $sqlAsc 
                ->andWhere('t.createdAt BETWEEN :date1 AND :date2')
                ->setParameter('data1', $date1)
                ->setParameter('data2', $date2)
            ;
        } 
        else if($date1 && !$date2) {
            $sqlAsc = $sqlAsc 
                ->andWhere('t.createdAt >= :date1')
                ->setParameter('data1', $date1)
            ;
        }
        else if(!$date1 && $date2) {
            $sqlAsc = $sqlAsc 
                ->andWhere('t.createdAt <= :date2')
                ->setParameter('data2', $date2)
            ;
        }
        $sqlAsc = $sqlAsc
            ->orderBy('t.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;

        return $sqlAsc;
        
    }
    public function getTransCarbSortieByVehucule($vehicule)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.vehicule = :val')
            ->setParameter('val', $vehicule)
            ->orderBy('t.kilometrage', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findTotalLitrageGasoilSortie($type, $taona, $client)
    {
        $dataCarbInit = [
            'montant' => [null,null,null,null,null,null,null,null,null,null,null,null],
            'litrageGas' => [null,null,null,null,null,null,null,null,null,null,null,null]
        ];
        
        $result = $this->createQueryBuilder('t')
            ->select('
                t.typeCarburant,
                MONTH(t.createdAt) AS mois,
                SUM(t.montant) AS totalMontant,
                SUM(t.litrage) as totalLitrageGasoil
            ')
            ->where('
                t.typeCarburant = :type AND
                YEAR(t.createdAt) = :taona AND
                t.client = :client
            ')
            ->setParameters(new ArrayCollection([
                new Parameter('type', $type),
                new Parameter('taona', $taona),
                new Parameter('client', $client)
            ]))
            ->groupBy('mois')
            ->getQuery()
            ->getResult()
        ;
        $totalGasoilConsomme = 0;
        $caTotalConsomme = 0;
        foreach ($result as $value) {
            $num = intval($value['mois'] - 1);
            $dataCarbInit['montant'][$num] = intval($value['totalMontant']);
            $dataCarbInit['litrageGas'][$num] = intval($value['totalLitrageGasoil']);
            $totalGasoilConsomme = $totalGasoilConsomme + $value['totalLitrageGasoil'];
            $caTotalConsomme = $caTotalConsomme + $value['totalMontant'];
        }
        
        return [
            'dataChart' => $dataCarbInit,
            'litrageCons' => $totalGasoilConsomme,
            'caCons' => $caTotalConsomme
        ];
    }
   

    // /**
    //  * @return TransCarburantSortie[] Returns an array of TransCarburantSortie objects
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
    public function findOneBySomeField($value): ?TransCarburantSortie
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

<?php

namespace App\Repository;

use App\Entity\TransCarburant;
use App\Entity\TransCarburantSortie;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method TransCarburant|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransCarburant|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransCarburant[]    findAll()
 * @method TransCarburant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransCarburantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransCarburant::class);
    }
    
    public function findAllCarbBetween($date1 = null, $date2 = null)
    {
        $sqlAsc = $this->createQueryBuilder('t') 
        ;
        if($date1 && $date2){
            $sqlAsc = $sqlAsc 
                ->andWhere('t.date BETWEEN :date1 AND :date2')
                ->setParameter('date1', $date1)
                ->setParameter('date2', $date2)
            ;
        } 
        else if($date1 && !$date2) {
            $sqlAsc = $sqlAsc 
                ->andWhere('t.date >= :date1')
                ->setParameter('date1', $date1)
            ;
        }
        else if(!$date1 && $date2) {
            $sqlAsc = $sqlAsc 
                ->andWhere('t.date <= :date2')
                ->setParameter('date2', $date2)
            ;
        }
        $sqlAsc = $sqlAsc
            ->orderBy('t.date', 'DESC')
            ->getQuery()
            ->getResult()
        ;
        // format array object result
        $arrayResult = [];
        if(count($sqlAsc) > 0){
            foreach($sqlAsc as $item){
                $conso = '';
                $valueConso = '';
                if($item instanceof TransCarburantSortie){
                    //$last = $this->findBy(array('vehicule_id'=>$item->getVehicule()),array('id'=>'DESC'),1,1);
                    /*$carbs = $item->getVehicule()->getTransCarburantSorties();
                    foreach($carbs as $key=>$carb){
                        if($carb == $item){
                            if($carbs[$key+1]){
                                $conso = 0;
                                if($carbs[$key+1]->getKilometrage() != $item->getKilometrage()){
                                    $valueConso = round((($item->getLitrage() + $item->getFondReservoir() - $carbs[$key+1]->getFondReservoir()) / (intval($carbs[$key+1]->getKilometrage()) - intval($item->getKilometrage()))),2);
                                    $conso = $valueConso ." L/Km";                                
                                }
                            }
                        };
                    }
                    if($valueConso < 0){
                        $conn = $this->getEntityManager()->getConnection();
                        $sql = '
                            SELECT fond_reservoir, kilometrage 
                            FROM trans_carburant_sortie 
                            WHERE vehicule_id = :id_vehicule
                            ORDER BY kilometrage * 1 ASC
                        ';
                        $stmt = $conn->prepare($sql);
                        $resultSet = $stmt->executeQuery(['id_vehicule' => $item->getVehicule()->getId()]);
                        $carbs = $resultSet->fetchAllAssociative();
                        //dd($carbs);
                        foreach($carbs as $key=>$carb){
                            if($carb['kilometrage'] == $item->getKilometrage()){
                                if(isset($carbs[$key+1])){
                                    $conso = 0;
                                    if($carbs[$key+1]['kilometrage'] != $item->getKilometrage()){
                                        $valueConso = round((($item->getLitrage() + $item->getFondReservoir() - $carbs[$key+1]['fond_reservoir']) / (intval($carbs[$key+1]['kilometrage']) - intval($item->getKilometrage()))),2);
                                        $conso = $valueConso ." L/Km";                                
                                    }
                                }
                            };
                        }
                    }*/// old code
                    $conn = $this->getEntityManager()->getConnection();
                    $sql = '
                        SELECT fond_reservoir, kilometrage 
                        FROM trans_carburant_sortie 
                        WHERE vehicule_id = :id_vehicule
                        ORDER BY kilometrage * 1 ASC
                    ';
                    $stmt = $conn->prepare($sql);
                    $resultSet = $stmt->executeQuery(['id_vehicule' => $item->getVehicule()->getId()]);
                    $carbs = $resultSet->fetchAllAssociative();
                    //dd($carbs);
                    foreach($carbs as $key=>$carb){
                        if($carb['kilometrage'] == $item->getKilometrage()){
                            if(isset($carbs[$key+1])){
                                $conso = 0;
                                if($carbs[$key+1]['kilometrage'] != $item->getKilometrage()){
                                    $valueConso = round((($item->getLitrage() + $item->getFondReservoir() - $carbs[$key+1]['fond_reservoir']) / (intval($carbs[$key+1]['kilometrage']) - intval($item->getKilometrage()))),2);
                                    $conso = $valueConso ." L/Km";                                
                                }
                            }
                        };
                    }
                }
                $arrayResult[] = [
                    "nature" => ($item instanceof TransCarburantSortie) ? 'sortie' : 'entre',
                    "id" => $item->getId(),
                    "date" => $item->getDate()->format('d-m-Y H:i'),
                    "station" => ($item instanceof TransCarburantSortie) ? $item->getStation() : "",
                    "vehicule_imm" => ($item instanceof TransCarburantSortie) ? $item->getVehicule()->getImmatriculation() : '',
                    "vehicule_id"  => ($item instanceof TransCarburantSortie) ? $item->getVehicule()->getId() : '',
                    "kilometrage" => ($item instanceof TransCarburantSortie) ? $item->getKilometrage() : '',
                    "chauffeur_aff" => ($item instanceof TransCarburantSortie &&  $item->getChauffeur()) ? $item->getChauffeur()->getAppellation() . "-" .$item->getChauffeur()->getMatricule() : '',
                    "chauffeur_id" => ($item instanceof TransCarburantSortie &&  $item->getChauffeur()) ? $item->getChauffeur()->getId() : '',
                    "client" => ($item instanceof TransCarburantSortie) ? $item->getClient() : '',
                    "type" => $item->getTypeCarburant(),
                    "litrage" => ($item instanceof TransCarburantSortie) ? '-' .$item->getLitrage() : $item->getLitrage(),
                    "fond" => ($item instanceof TransCarburantSortie && $item->getFondReservoir() != 0) ? $item->getFondReservoir() : '',
                    "trajet" => ($item instanceof TransCarburantSortie) ? $item->getTrajet() : '',
                    "montant" => ($item instanceof TransCarburantSortie) ? '-' . $item->getMontant() : $item->getMontant(),
                    "conso" => $conso,
                    "action" => '<a href="#" 
                                    data-nature="'.
                                        ($item instanceof TransCarburantSortie ? 'sortie' : 'entre')
                                    .'" 
                                    data-id="'. $item->getId() .'" class="edit_carb">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a
                                    data-nature="'.
                                        ($item instanceof TransCarburantSortie ? 'sortie' : 'entre')
                                    .'"
                                    href="#" data-id="' . $item->getId() . '" class="delete_carb">
                                    <span class="fa fa-trash-o"></span>
                                </a>'
                ];
            }
            return $arrayResult;
        }else{
            return [
                "nature" => null,
                "id" => null,
                "date" =>null,
                "station" => null,
                "vehicule_imm" => null,
                "vehicule_id"  => null,
                "kilometrage" => null,
                "chauffeur_aff" => null,
                "chauffeur_id" => null,
                "client" => null,
                "type" => null,
                "litrage" => null,
                "fond" => null,
                "trajet" => null,
                "montant" => null,
                "action" => null
            ];
        }
        
    }

    public function findTotalLitrageGasoilSortie($type, $taona, $mois = null)
    {
        $dataCarbInit = [
            'montant' => [null,null,null,null,null,null,null,null,null,null,null,null],
            'litrageGas' => [null,null,null,null,null,null,null,null,null,null,null,null]
        ];
        $conn = $this->getEntityManager()->getConnection();
        $result = [];
        if($mois == null){
            $sql = '
                SELECT type_carburant, MONTH(created_at) AS mois, SUM(montant) AS totalMontant, SUM(litrage) as totalLitrageGasoil
                FROM `trans_carburant` 
                WHERE type_carburant = :type AND YEAR(created_at) = :taona AND discr = "transCarburantSortie"
                group by MONTH(created_at)
            ';
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery(['type' => $type, 'taona' => $taona]);

            // returns an array of arrays (i.e. a raw data set)
            $result = $resultSet->fetchAllAssociative();
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
        if($mois != null){
            $date = new \DateTime($taona . '-' . $mois . '-01');
            $date->modify('last day of this month');
            $nbrDays = intval($date->format('d'));
            $dataCarbInit = [
                'montant' => [],
                'litrageGas' => []
            ];
            //dd($dataCarbInit);
            for($i = 1; $i <= $nbrDays; $i++){
                array_push($dataCarbInit['montant'], null);
                array_push($dataCarbInit['litrageGas'], null);
            }
            //dd($dataCarbInit);
            $sql = '
                SELECT type_carburant, DAY(created_at) AS jour, MONTH(created_at) AS mois, SUM(montant) AS totalMontant, SUM(litrage) as totalLitrageGasoil
                FROM `trans_carburant` 
                WHERE type_carburant = :type AND YEAR(created_at) = :taona AND MONTH(created_at) =:mois  AND discr = "transCarburantSortie"
                group by DAY(created_at)
            ';
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery(['type' => $type, 'taona' => $taona, 'mois' => $mois ]);

            // returns an array of arrays (i.e. a raw data set)
            $result = $resultSet->fetchAllAssociative();

            //dd($result);
            // conmbinaison des deux tables
            $totalGasoilConsomme = 0;
            $caTotalConsomme = 0;
            foreach ($result as $value) {
                $num = intval($value['jour'] - 1);
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
    }
    public function selectAllAnnee($type)
    {
        return $this->createQueryBuilder('t')
            ->select('YEAR(t.createdAt) AS annee')
            ->where('t.typeCarburant = :type')
            ->setParameter('type', $type)
            ->groupBy('annee')
            ->orderBy('annee', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return TransCarburant[] Returns an array of TransCarburant objects
    //  */
    /*
    public function findByExampleField($value)findAllCarbBetween
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
    public function findOneBySomeField($value): ?TransCarburant
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

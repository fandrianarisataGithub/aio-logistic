<?php

namespace App\Controller\Transport;

use App\Entity\TransCarburant;
use App\Entity\TransChauffeur;
use App\Entity\TransCarburantEntre;
use App\Entity\TransCarburantSortie;
use App\Entity\TransStationCarb;
use App\Repository\TranPositionPneuRepository;
use App\Repository\TransCarburantEntreRepository;
use Doctrine\DBAL\Abstraction\Result;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\TransVehiculeRepository;
use App\Repository\TransCarburantRepository;
use App\Repository\TransChauffeurRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransCarburantSortieRepository;
use App\Repository\TransClientVoyageCarbRepository;
use App\Repository\TransMarquePneuRepository;
use App\Repository\TransReferencePneuRepository;
use App\Repository\TransStationCarbRepository;
use App\Repository\TransTrajetVoyageRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\Json;

class CarburantController extends AbstractController
{
    // entity ManagerInterface
    private $em;
    private $repoVehicule;
    private $repoChauffeur;
    private $repoCarb;
    private $repoCarbEntre;
    private $repoCarbSortie;

    private $repoStation;
    private $repoTransClient;
    private $repoTrajet;
    private $repoPositionPneus;
    private $repoMarqueAuto;
    private $repoRefPneus;
    public function __construct(
        EntityManagerInterface $em,
        TransCarburantRepository $repoCarb,
        TransChauffeurRepository $repoChauffeur,
        TransVehiculeRepository $repoVehicule,
        TransCarburantEntreRepository $repoCarbEntre,
        TransCarburantSortieRepository $repoCarbSortie,
        TransStationCarbRepository $repoStation,
        TransClientVoyageCarbRepository $repoTransClient,
        TransTrajetVoyageRepository $repoTrajet,
        TranPositionPneuRepository $repoPositionPneus,
        TransMarquePneuRepository $repoMarqueAuto,
        TransReferencePneuRepository $repoRefPneus

    )
    {
        $this->em = $em;
        $this->repoVehicule = $repoVehicule;
        $this->repoChauffeur = $repoChauffeur;
        $this->repoCarb = $repoCarb;
        $this->repoCarbEntre = $repoCarbEntre;
        $this->repoCarbSortie = $repoCarbSortie;

        $this->repoStation = $repoStation;
        $this->repoTransClient = $repoTransClient;
        $this->repoTrajet = $repoTrajet;
        $this->repoPositionPneus = $repoPositionPneus;
        $this->repoMarqueAuto = $repoMarqueAuto;
        $this->repoRefPneus = $repoRefPneus;
    }
    /**
     * @Route("/profile/carburant/totalCarb-stock", name="totalCarbStock")224000
     */
    public function totalCarbStock(Request $request)
    {
        $response = new Response();
        if($request->isXmlHttpRequest()){
            $data = json_encode($this->calculResteCuve());
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
    }

    /**
     *@Route("/profile/load/chauffeur-vehicule", name="load_chauffeur_vehicule_client_station_trajet")
    */
    public function load_chauffeur_vehicule_client_station_trajet(Request $resquest)
    {
        $response = new Response();
        $allChauffeur = $this->repoChauffeur->findAllNomAndMatricule();
        $allVehicule = $this->repoVehicule->findAllVehiculeMatriculation();
        $allStation = $this->repoStation->findAllNomStation();
        $allClient = $this->repoTransClient->findAllclient();
        $allTrajet = $this->repoTrajet->findAllTrajet();
        $list = [
            "chauffeur" => $allChauffeur,
            "vehicule" => $allVehicule,
            "station" => $allStation,
            "client" => $allClient,
            "trajet" => $allTrajet
        ];
        $data = json_encode($list);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
    public function calculResteCuve()
    {
        $totalGas = $this->repoCarbEntre->calculateTotalEntre()['total_entre_gasoil'] - $this->repoCarbSortie->calculateTotalSortie()['total_sortie_gasoil'];
        $totalEssence = $this->repoCarbEntre->calculateTotalEntre()['total_entre_essence'] - $this->repoCarbSortie->calculateTotalSortie()['total_sortie_essence'];
        return [
            'gasoil' => $totalGas,
            'essence'=> $totalEssence
        ];
    }
    public function testCarbSortie($litrage, $type, $station)
    {
        $resteCuve = $this->calculResteCuve();
        
        if($type == 'GASOIL' && $station == 'BASE TANA'){
            $diffGas = $resteCuve['gasoil'] - $litrage;
            return $diffGas >= 0;
        }
        else if($type == 'GASOIL' && $station != 'BASE TANA'){
            return true;
        }
        if($type == 'ESSENCE'){
            // $diffEssence = $resteCuve['essence'] - $litrage;
            // return $diffEssence >= 0;
            return true;
        }
    }

    /**
     * @Route("/profile/transport/valider/carburant", name="valider_carburant")
     */
    public function validerCarb(Request $request)
    {
        $response = new Response();

        $dataSended = json_decode(file_get_contents("php://input"), true);
        //dd($dataSended);
        $data = null;
        if($dataSended['typeAction'] === "entre"){
            if(!$dataSended['id']){
                $carb = new TransCarburantEntre();
                $carb->setCreatedAt(new \DateTime());
                $carb->setTypeCarburant($dataSended['typeEntre']);
                $carb->setLitrage($dataSended['litrageEntre']);
                $carb->setMontant($dataSended['montantEntre']);
                $carb->setDate(date_create($dataSended['createdAtEntre']));
                $this->em->persist($carb);
                $this->em->flush();
                $data = json_encode(['code'=>0,'value'=>'success']);
            }else{
                $carbEntre = $this->repoCarbEntre->find($dataSended['id']);
                $carbEntre->setTypeCarburant($dataSended['typeEntre']);
                $carbEntre->setLitrage($dataSended['litrageEntre']);
                $carbEntre->setMontant($dataSended['montantEntre']);
                $carbEntre->setUpdatedAt(new \DateTime());
                $carbEntre->setDate(date_create($dataSended['createdAtEntre']));
                
                $this->em->flush();
                $data = json_encode(['code'=>0,'value'=>'success']);
            }
        }
        else{
            if(!$dataSended['id']){
                $chauffeur = $this->repoChauffeur->findOneBy(['matricule' => $dataSended['chauffeurSortie']]);
                $vehicule = $this->repoVehicule->findOneBy(['immatriculation' => $dataSended['immatriculationSortie']]);
                $carb = new TransCarburantSortie();
                $carb->setCreatedAt(date_create($dataSended['createdAtSortie']));
                $carb->setDate(date_create($dataSended['createdAtSortie']));
                $carb->setTypeCarburant($dataSended['typeSortie']);
                $carb->setClient($dataSended['clientSortie']);
                $carb->setLitrage($dataSended['litrageSortie']);
                $carb->setMontant($dataSended['montantSortie']);
                $carb->setStation($dataSended['stationSortie']);
                $carb->setVehicule($vehicule);
                $carb->setKilometrage($dataSended['kilometrageSortie']);
                $carb->setChauffeur($chauffeur);
                $carb->setFondReservoir($dataSended['fondReservoirSortie']);
                $carb->setTrajet($dataSended['trajetSortie']);
                if($this->testCarbSortie($dataSended['litrageSortie'], $dataSended['typeSortie'], $dataSended['stationSortie'])){
                    $this->em->persist($carb);
                    $this->em->flush();
                    $data = json_encode(['code'=>0,'value'=>'success']);
                }
                else{ 
                    $data = json_encode(['code'=> 1,'value'=>'stock de litrage insuffisant']);
                }
            }else{
                $carbSortie = $this->repoCarbSortie->find($dataSended['id']);
                $chauffeur = $this->repoChauffeur->findOneBy(['matricule' => $dataSended['chauffeurSortie']]);
                $vehicule = $this->repoVehicule->findOneBy(['immatriculation' => $dataSended['immatriculationSortie']]);
                $carbSortie->setTypeCarburant($dataSended['typeSortie']);
                $carbSortie->setClient($dataSended['clientSortie']);
                $carbSortie->setLitrage($dataSended['litrageSortie']);
                $carbSortie->setMontant($dataSended['montantSortie']);
                $carbSortie->setStation($dataSended['stationSortie']);
                $carbSortie->setVehicule($vehicule);
                $carbSortie->setCreatedAt(date_create($dataSended['createdAtSortie']));
                $carbSortie->setDate(date_create($dataSended['createdAtSortie']));
                $carbSortie->setKilometrage($dataSended['kilometrageSortie']);
                $carbSortie->setChauffeur($chauffeur);
                $carbSortie->setFondReservoir($dataSended['fondReservoirSortie']);
                $carbSortie->setTrajet($dataSended['trajetSortie']);
                $carbSortie->setUpdatedAt(new \DateTime());
                if($this->testCarbSortie($dataSended['litrageSortie'], $dataSended['typeSortie'], $dataSended['stationSortie'])){
                    $this->em->flush();
                    $data = json_encode(['code'=>0,'value'=>'success']);
                }
                else{
                    $data = json_encode(['code'=> 1,'value'=>'stock de litrage insuffisant']);
                }
            }
        }
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/transport/list/carburant", name="carburant_list")
     */
    public function carburant_list(Request $request)
    {
        $response = new Response();
        $result = $this->repoCarb->findAllCarbBetween($request->get('date1'),$request->get('date2'));
        $dataJson =  json_encode($result);
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($dataJson);
        return $response;
    }
    /**
     * @Route("/profile/carburant/delete/{id}", name="delete_carb")
     */
    public function delete_carb(TransCarburant $carb)
    {
        $response = new Response();
        $data = json_encode(['code'=>0,'value'=>'success']);
        if($carb){
            $this->em->remove($carb);
            $this->em->flush();
        }
        else{
            $data = json_encode(['code'=>0,'value'=>'echec']);
        }
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

}

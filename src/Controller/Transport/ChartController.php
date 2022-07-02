<?php

namespace App\Controller\Transport;

use App\Repository\TransPneuRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransVoyageRepository;
use App\Repository\TransPneuHistRepository;
use App\Repository\TransVehiculeRepository;
use App\Repository\TransCarburantRepository;
use App\Repository\TransChauffeurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransCarburantEntreRepository;
use App\Repository\TransCarburantSortieRepository;
use App\Repository\TransInterventionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChartController extends AbstractController
{
    private $em;
    private $repoVehicule;
    private $repoChauffeur;
    private $repoCarb;
    private $repoCarbEntre;
    private $repoCarbSortie;
    private $repoPneu;
    private $repoVoyage;
    private $repoHistPneu;
    public function __construct(
        EntityManagerInterface $em,
        TransCarburantRepository $repoCarb,
        TransChauffeurRepository $repoChauffeur,
        TransVehiculeRepository $repoVehicule,
        TransCarburantEntreRepository $repoCarbEntre,
        TransCarburantSortieRepository $repoCarbSortie,
        TransPneuRepository $repoPneu,
        TransVoyageRepository $repoVoyage,
        TransPneuHistRepository $repoHistPneu,
        TransInterventionRepository $repoIntervention
    )
    {
        $this->em = $em;
        $this->repoVehicule = $repoVehicule;
        $this->repoChauffeur = $repoChauffeur;
        $this->repoCarb = $repoCarb;
        $this->repoCarbEntre = $repoCarbEntre;
        $this->repoCarbSortie = $repoCarbSortie;
        $this->repoPneu = $repoPneu;
        $this->repoVoyage = $repoVoyage;
        $this->repoIntervention = $repoIntervention;
        $this->repoHistPneu = $repoHistPneu;
    }
    /**
     * @Route("/profile/load-dataChart-carb", name="loadDataChartCarb")
     */
    public function loadDataChartCarb(Request $resquest)
    {
        $response = new Response();
        $now = new \DateTime();
        $currentYear = $now->format('Y');
        if($resquest->isXmlHttpRequest()){
            $anneeCarb = $resquest->get('anneeCarb') ? $resquest->get('anneeCarb') : $currentYear;
            $clientCarb = $resquest->get('clientCarb') ? $resquest->get('clientCarb') : 'tout';
            $dataCarb = null;
            if($resquest->get('moisCarb') == null){
                
                $dataCarb = $clientCarb == 'tout' ? 
                        $this->repoCarb->findTotalLitrageGasoilSortie('GASOIL', $anneeCarb) 
                        : $this->repoCarbSortie->findTotalLitrageGasoilSortie('GASOIL', $anneeCarb, $clientCarb);
            }else{
                
                $dataCarb = $clientCarb == 'tout' ? 
                        $this->repoCarb->findTotalLitrageGasoilSortie('GASOIL', $anneeCarb, $resquest->get('moisCarb')) 
                        : $this->repoCarbSortie->findTotalLitrageGasoilSortie('GASOIL', $anneeCarb, $resquest->get('moisCarb'), $clientCarb);
            }
            $data = json_encode($dataCarb);
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
       
    }
    /**
     * @Route("/profile/load-dataChart-voyage", name="loadDataChartVoyage")
     */
    public function loadDataChartVoyage(Request $resquest)
    {
        $response = new Response();
        $now = new \DateTime();
        $currentYear = $now->format('Y');
        if($resquest->isXmlHttpRequest()){
            $anneeVoyage = $resquest->get('anneeVoyage') ? $resquest->get('anneeVoyage') : $currentYear;
            $clientVoyage = $resquest->get('clientVoyage') ? $resquest->get('clientVoyage') : 'tout';
            $dataVoyage = null;
            //dd($dataVoyage);

            if($resquest->get('moisVoyage') == null){
    
                $dataVoyage = $clientVoyage == 'tout' ? 
                $this->repoVoyage->findTotalVoyageForGraph(null, $anneeVoyage) 
                : $this->repoVoyage->findTotalVoyageForGraph($clientVoyage, $anneeVoyage);
            }else{
                
                $dataVoyage = $clientVoyage == 'tout' ? 
                $this->repoVoyage->findTotalVoyageForGraph(null, $anneeVoyage, $resquest->get('moisVoyage')) 
                : $this->repoVoyage->findTotalVoyageForGraph($clientVoyage, $anneeVoyage,$resquest->get('moisVoyage'));
            }

            $data = json_encode($dataVoyage);
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
       
    }

    /**
     * @Route("/profile/load-dataChart-intervention", name="loadDataChartIntervention")
     */
    public function loadDataChartIntervention(Request $resquest)
    {
        $response = new Response();
        $now = new \DateTime();
        $currentYear = $now->format('Y');
        if($resquest->isXmlHttpRequest()){
            $anneeIntervention = $resquest->get('anneeIntervention') ? $resquest->get('anneeIntervention') : $currentYear;
            $clientIntervention = $resquest->get('clientIntervention') ? $resquest->get('clientIntervention') : 'tout';
            $dataIntervention = null;

            if($resquest->get('moisIntervention') == null){
    
                $dataIntervention = $clientIntervention == 'tout' ? 
                $this->repoIntervention->dataGraphIntervention(null, $anneeIntervention) 
                : $this->repoIntervention->dataGraphIntervention($clientIntervention, $anneeIntervention);
            }else{
                //dd($resquest->get('moisIntervention'));
                $dataIntervention = $clientIntervention == 'tout' ? 
                $this->repoIntervention->dataGraphIntervention(null, $anneeIntervention, $resquest->get('moisIntervention')) 
                : $this->repoIntervention->dataGraphIntervention($clientIntervention, $anneeIntervention,$resquest->get('moisIntervention'));
            }
            //dd($dataIntervention);
            $data = json_encode($dataIntervention);
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
       
    }

    /**
     * @Route("/profile/load-dataChart-pneu", name="loadDataChartPneu")
     */
    public function loadDataChartPneu(Request $resquest)
    {
        $response = new Response();
        $now = new \DateTime();
        $currentYear = $now->format('Y');
        if($resquest->isXmlHttpRequest()){
            $anneePneu = $resquest->get('anneePneu') ? $resquest->get('anneePneu') : $currentYear;
            $dataPneu = null;
            if($resquest->get('moisPneu') == null){
                $dataPneu = $dataPneu = $this->repoHistPneu->findTotalNbrPneuSortie($anneePneu);
            }else{
                
                $dataPneu = $dataPneu = $this->repoHistPneu->findTotalNbrPneuSortie($anneePneu, $resquest->get('moisPneu'));
            }
            

            $data = json_encode($dataPneu);
            //dd($data);
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
       
    }
}

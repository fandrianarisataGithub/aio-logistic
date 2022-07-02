<?php

namespace App\Controller\Transport;

use App\Entity\TransCodeDesignationPiece;
use App\Repository\TransPneuRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransVehiculeRepository;
use App\Repository\TransCarburantRepository;
use App\Repository\TransChauffeurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransCarburantEntreRepository;
use App\Repository\TransCarburantSortieRepository;
use App\Repository\TransCodeDesignationPieceRepository;
use App\Repository\TransInterventionRepository;
use App\Repository\TransPneuHistRepository;
use App\Repository\TransVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
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
    private $repoCodeDes;
    private $repoInt;
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
        TransCodeDesignationPieceRepository $repoCodeDes,
        TransInterventionRepository $repoInt
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
        $this->repoHistPneu = $repoHistPneu;
        $this->repoCodeDes = $repoCodeDes;
        $this->repoInt = $repoInt;
    }
    /**
     * @Route("/profile/transport/home", name="transport_home")
     */
    public function home(): Response
    {
        // liste des années , clients pour les tris des graphes
        // garph carb
        $anneeCarb = $this->repoCarb->selectAllAnnee('GASOIL');
        $clientsCarb = $this->repoCarbSortie->selectAllClient('GASOIL');
        $now = new \DateTime();
        $currentYear = $now->format('Y');
        $dataCarb = $this->repoCarb->findTotalLitrageGasoilSortie('GASOIL', $currentYear);
        // fin graphe carb

        // graph voyage
        $anneeVoyage = $this->repoVoyage->selectAllAnnee();
        $clientsVoyages = $this->repoVoyage->selectAllClient();
        $dataVoyage = $this->repoVoyage->findTotalVoyageForGraph(null, $currentYear); // all cliet et currrent date (null == tout)
        
        // graph pneu
        $anneePneu = $this->repoHistPneu->selectAllAnnee();
        $pneuSortie = $this->repoHistPneu->allPneuSortie($currentYear);
        //dd($pneuSortie);
        $arrayPneu = [
            'remorque' => [
                'qte' => 0,
                'montant_total' => 0
            ],
            'tracteur' => [
                'qte' => 0,
                'montant_total' => 0
            ],
            'autre' => [
                'qte' => 0,
                'montant_total' => 0
            ]
        ];
        for($i = 0; $i< count($pneuSortie); $i++){
            if($pneuSortie[$i]['type_pneu'] == 'remorque'){
                $arrayPneu['remorque']['qte'] = $pneuSortie[$i]['total_par_qte'];
                $arrayPneu['remorque']['montant_total'] = $pneuSortie[$i]['somme_montant'];
            }
            if($pneuSortie[$i]['type_pneu'] == 'tracteur'){
                $arrayPneu['tracteur']['qte'] = $pneuSortie[$i]['total_par_qte'];
                $arrayPneu['tracteur']['montant_total'] = $pneuSortie[$i]['somme_montant'];
            }
            if($pneuSortie[$i]['type_pneu'] == 'autre'){
                $arrayPneu['autre']['qte'] = $pneuSortie[$i]['total_par_qte'];
                $arrayPneu['autre']['montant_total'] = $pneuSortie[$i]['somme_montant'];
            }
        }
        //dd($arrayPneu);
        $dataPneu = $this->repoHistPneu->findTotalNbrPneuSortie($currentYear);
        //dd($dataPneu);

        // data intervention
        $anneeIntervention = $this->repoInt->selectAllAnnee();
        $clientsIntervention = $this->repoInt->selectAllClient();
        $dataIntervention = $this->repoInt->dataGraphIntervention(null, $currentYear);
        //dd($dataIntervention);
        return $this->render('transport/home.html.twig', 
            [
                'anneeVoyage' => $anneeVoyage,
                'clientsVoyages' => $clientsVoyages,
                'anneeCarb' => $anneeCarb,
                'clientsCarb' => $clientsCarb,
                'dataCarb' => $dataCarb,
                'dataVoyage' => $dataVoyage,
                'anneePneu' => $anneePneu,
                'pneuSortie' => $arrayPneu,
                'dataPneu' => $dataPneu,
                'anneeIntervention' => $anneeIntervention,
                'clientsIntervention' => $clientsIntervention,
                'dataIntervention' => $dataIntervention
            ]
        );
    }

    /**
     * @Route("/profile/vehicule/", name="transport_vehicule")
     */
    public function vehicule()
    {
        return $this->render("transport/vehicule.html.twig");
    }
    /**
     * @Route("/profile/chauffeur/", name="transport_chauffeur")
     */
    public function chauffeur()
    {
        return $this->render("transport/chauffeur.html.twig");
    }
    /**
     * @Route("/profile/carburant/", name="transport_carburant")
     */
    public function carburant()
    {
        return $this->render("transport/carburant.html.twig");
    }

    /**
     * @Route("/profile/garage/entree", name="transport_garage_entree_piece")
     */
    public function transport_garage_entree_piece()
    {
        return $this->render("transport/garage/entree_piece.html.twig", [
            'listCodeDes' => $this->repoCodeDes->findAll()
        ]);
    }
    /**
     * @Route("/profile/garage/stock", name="transport_garage_stock_piece")
     */
    public function transport_garage_stock_piece()
    {
        return $this->render("transport/garage/stock_piece.html.twig");
    }
    /**
     * @Route("/profile/parametre/", name="transport_parametre")
     */
    public function parametre()
    {
        return $this->render("transport/parametre.html.twig");
    }
}

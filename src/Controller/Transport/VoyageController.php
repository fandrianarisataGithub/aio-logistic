<?php

namespace App\Controller\Transport;



use App\Entity\TransVoyage;
use App\Entity\TransVehicule;
use App\Entity\TransChauffeur;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\TransVehiculeRepository;
use App\Repository\TransCarburantRepository;
use App\Repository\TransChauffeurRepository;
use App\Repository\TransMarquePneuRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\TranPositionPneuRepository;
use App\Repository\TransStationCarbRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\TransTrajetVoyageRepository;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransReferencePneuRepository;
use App\Repository\TransCarburantEntreRepository;
use App\Repository\TransCarburantSortieRepository;
use App\Repository\TransClientVoyageCarbRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoyageController extends AbstractController
{
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
     * @Route("/profile/voyage/", name="transport_voyage")
     */
    public function voyage(ManagerRegistry $doctrine)
    {
        $vehicules = $doctrine->getRepository(TransVehicule::class)->pluckImmatriculation();
        $chauffeurs = $doctrine->getRepository(TransChauffeur::class)->pluckNomMatricule();
        $allClient = $this->repoTransClient->findAllclient();
        $allTrajet = $this->repoTrajet->findAllTrajet();
        return $this->render("transport/voyage.html.twig",[
            'vehicules' => $vehicules,
            'chauffeurs' => $chauffeurs,
            'allClient' => $allClient,
            'allTrajet' => $allTrajet
        ]);
    }
    /**
     * @Route("/profile/voyage/new", name="new_voyage")
     */
    public function newVoyage(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $vehicule = $entityManager->getRepository(TransVehicule::class)->find($request->get('vehicule'));
        if (!$vehicule) {
            throw $this->createNotFoundException(
                'No vehicule found for id '.$request->get('vehicule')
            );
        }
        $chauffeur = $entityManager->getRepository(TransChauffeur::class)->find($request->get('chauffeur'));
        if (!$chauffeur) {
            throw $this->createNotFoundException(
                'No chauffeur found for id '.$request->get('chauffeur')
            );
        }
        $now = new \DateTime();
        $date_debut = date_create_from_format('Y-m-d\TH:i', $request->get('date_debut'));
        $date_fin = date_create_from_format('Y-m-d\TH:i', $request->get('date_fin'));
        // $file = $request->files->get('facture');
        // $filename = $now->format('Y-m-d').'_'.$file->getClientOriginalName();

        // $request->files->get('facture')->move(
        //     'uploads/facture_trans',
        //     $filename
        // );
        $response = new Response();
        $voyage = new TransVoyage();
        $voyage->setVehicule($vehicule);
        $voyage->setChauffeur($chauffeur);
        $voyage->setClient($request->get('client'));
        $voyage->setTrajet($request->get('trajet'));
        $voyage->setOt($request->get('ot'));
        $voyage->setMontant(str_replace(' ', '', $request->get('montant')));
        //$voyage->setFacture('uploads/facture_trans/'.$filename);
        $voyage->setDateDebut($date_debut);
        $voyage->setDateFin($date_fin);
        $voyage->setCreatedAt($now);
        $voyage->setUpdatedAt($now);
        $entityManager->persist($voyage);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/voyage/edit", name="update_voyage")
     */
    public function updateVoyage(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $voyage = $entityManager->getRepository(TransVoyage::class)->find($request->get('id_edit'));
        if (!$voyage) {
            throw $this->createNotFoundException(
                'No pneu found for id '.$request->get('id_edit')
            );
        }
        $vehicule = $entityManager->getRepository(TransVehicule::class)->find($request->get('vehicule_edit'));
        if (!$vehicule) {
            throw $this->createNotFoundException(
                'No vehicule found for id '.$request->get('vehicule_edit')
            );
        }
        $chauffeur = $entityManager->getRepository(TransChauffeur::class)->find($request->get('chauffeur_edit'));
        if (!$chauffeur) {
            throw $this->createNotFoundException(
                'No chauffeur found for id '.$request->get('chauffeur_edit')
            );
        }
        $now = new \DateTime();
        $date_debut = date_create_from_format('Y-m-d\TH:i', $request->get('date_debut_edit'));
        $date_fin = date_create_from_format('Y-m-d\TH:i', $request->get('date_fin_edit'));
        $file = $request->files->get('facture_edit');
        if($file){
            $filename = $now->format('Y-m-d').'_'.$file->getClientOriginalName();

            $request->files->get('facture_edit')->move(
                'uploads/facture_trans',
                $filename
            );
        }
        $response = new Response();
        $voyage->setVehicule($vehicule);
        $voyage->setChauffeur($chauffeur);
        $voyage->setClient($request->get('client_edit'));
        $voyage->setTrajet($request->get('trajet_edit'));
        $voyage->setOt($request->get('ot_edit'));
        $voyage->setMontant(str_replace(' ', '', $request->get('montant_edit')));
        if($file) $voyage->setFacture('uploads/facture_trans/'.$filename);
        $voyage->setDateDebut($date_debut);
        $voyage->setDateFin($date_fin);
        $voyage->setUpdatedAt($now);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/voyage/list", name="list_voyage")
     */
    public function listVoyage(Request $request, ManagerRegistry $doctrine ){
        $response = new Response();
        $result = $doctrine->getRepository(TransVoyage::class)->listVoyage($request->get('date1'),$request->get('date2'));
        $data = json_encode($result);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/voyage/remove", name="remove_voyage")
     */
    public function removeVoyage(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $voyage = $entityManager->getRepository(TransVoyage::class)->find($request->get('id'));
        if (!$voyage) {
            throw $this->createNotFoundException(
                'No product found for id '.$request->get('id')
            );
        }
        $entityManager->remove($voyage);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
}

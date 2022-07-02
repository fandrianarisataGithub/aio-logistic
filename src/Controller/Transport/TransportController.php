<?php

namespace App\Controller\Transport;

use App\Entity\TransPneu;
use App\Entity\TransVoyage;
use App\Entity\TransVehicule;
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
use App\Repository\TransInterventionRepository;
use App\Repository\TransTrajetVoyageRepository;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransReferencePneuRepository;
use App\Repository\TransCarburantEntreRepository;
use App\Repository\TransCarburantSortieRepository;
use App\Repository\TransClientVoyageCarbRepository;
use App\Repository\TransInterventionDetailRepository;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TransportController extends AbstractController
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
     * @Route("/profile/vehicule/new", name="new_vehicule")
     */
    public function newVehicule(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $vehicule = new TransVehicule();
        $response = new Response();
        if(is_array($_FILES)) {
            if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                $sourcePath = $_FILES['image']['tmp_name'];
                $nom = $_FILES['image']['name'];
                //dd($_FILES['image']); ok
                $tab_nom = explode(".",$nom);
                $t = count($tab_nom) - 1;
                $ext = "";
                $tab_ext = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
                if($t > 0){
                    $ext = $tab_nom[$t];
                }
                if(in_array($ext, $tab_ext)){
                    $targetPath = "uploads/vehicules/" . $_FILES['image']['name'];
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                            $vehicule->setImage($_FILES['image']['name']);
                        }
                    }
                    else{
                        $data = json_encode(['code'=>0,'value'=>'error image']);
                        $response->headers->set('Content-Type', 'application/json');
                        $response->headers->set('Access-Control-Allow-Origin', '*');
                        $response->setContent($data);
                        return $response;
                    }
            }
        }
        $date = date_create_from_format('Y-m-d', $request->get('date_circulation'));
        
        $vehicule->setImmatriculation($request->get('immatriculation'));
        $vehicule->setCentre($request->get('centre'));
        $vehicule->setDateCirculation($date);
        $vehicule->setMarque($request->get('marque'));
        $vehicule->setType($request->get('type'));
        $vehicule->setReservoir($request->get('reservoir'));
        $vehicule->setEnergie($request->get('energie'));
        $entityManager->persist($vehicule);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
    /**
     * @Route("/profile/load_vehicule_id", name="load_vehicule_id")
     *
     */
    public function load_vehicule_id(Request $request)
    {
        $response = new Response();
        //dd($request);
        $vehicule = $this->repoVehicule->find($request->get('vehicule_id'));
        $fiche = $this->repoVehicule->loadImm($vehicule);
        $data = json_encode($fiche);
        //dd($data);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/load_vehicule", name="load_vehicule")
     */
    public function load_vehicule(Request $request)
    {
        $response = new Response();
        $vehicule = $this->repoVehicule->find($request->get('vehicule_id'));
        
        $fiche = $this->repoVehicule->showFiche($vehicule);
        //dd($fiche);
        $data = json_encode($fiche);
        //dd($data);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/load_chauffeur", name="load_chauffeur")
     */
    public function load_chauffeur(Request $request)
    {
        $response = new Response();

        $fiche = $this->repoVehicule->showFicheChauffeur($request->get('chauffeur_id'));
        //dd($fiche);
        $data = json_encode($fiche);
        //dd($data);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/vehicule/list", name="list_vehicule")
     */
    public function listVehicule(Request $request, ManagerRegistry $doctrine ){
        $response = new Response();
        $result = $doctrine->getRepository(TransVehicule::class)->findAllVehicule($request->get('date1'),$request->get('date2'));
        //dd($result);
        //$data = json_encode([['1','2','3','4','5','6','7'],['1','2','3','4','5','6','7']]);
        $data = json_encode($result);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/vehicule/edit", name="edit_vehicule")
     */
    public function editVehicule(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $vehicule = $entityManager->getRepository(TransVehicule::class)->find($request->get('id_edit'));
        if (!$vehicule) {
            throw $this->createNotFoundException(
                'No product found for id '.$request->get('id_edit')
            );
        }
        $date = date_create_from_format('Y-m-d', $request->get('date_circulation_edit'));
        $response = new Response();
        if(is_array($_FILES) && isset($_FILES['image'])) {
            if(is_uploaded_file($_FILES['image']['tmp_name'])) {
                $sourcePath = $_FILES['image']['tmp_name'];
                $nom = $_FILES['image']['name'];
                //dd($_FILES['image']); ok
                $tab_nom = explode(".",$nom);
                $t = count($tab_nom) - 1;
                $ext = "";
                $tab_ext = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
                if($t > 0){
                    $ext = $tab_nom[$t];
                }
                if(in_array($ext, $tab_ext)){
                    $targetPath = "uploads/vehicules/" . $_FILES['image']['name'];
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $vehicule->setImage($_FILES['image']['name']);
                    }
                }
                else{
                    $data = json_encode(['code'=>0,'value'=>'error image']);
                    $response->headers->set('Content-Type', 'application/json');
                    $response->headers->set('Access-Control-Allow-Origin', '*');
                    $response->setContent($data);
                    return $response;
                }
            }
        }
        $vehicule->setImmatriculation($request->get('immatriculation_edit'));
        $vehicule->setCentre($request->get('centre_edit'));
        $vehicule->setDateCirculation($date);
        $vehicule->setMarque($request->get('marque_edit'));
        $vehicule->setType($request->get('type_edit'));
        $vehicule->setReservoir($request->get('reservoir_edit'));
        $vehicule->setEnergie($request->get('energie_edit'));
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/vehicule/remove", name="remove_vehicule")
     */
    public function removeVehicule(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $vehicule = $entityManager->getRepository(TransVehicule::class)->find($request->get('id'));
        if (!$vehicule) {
            throw $this->createNotFoundException(
                'No product found for id '.$request->get('id')
            );
        }
        $entityManager->remove($vehicule);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/trans/load_liste_piece_int", name="load_liste_piece_int")
     */
    public function load_liste_piece_int(Request $request, TransInterventionRepository $repoInt)
    {
        $response = new Response();
        if($request->isXmlHttpRequest()){
            $data = null;
            if($request->get('int_id')){
                $allIntPiece = $repoInt->listPiece($request->get('int_id'));
                // dd($allIntPiece);
                //$html = '';

                // foreach($allIntPiece as $item){
                //     $prixTotal = $item['qte_piece'] * $item['piece_prix'];
                //     $html .='
                //         <tr data-piece="'. $item['piece_id'] .'">
                //             <td class="date">' . $item['designation_piece'] . '</td>
                //             <td class="date">'. $item['qte_piece'] .'</td>
                //             <td class="prix">'. $item['piece_prix'] .'</td>
                //             <td class="prix">'. $prixTotal .'</td>
                //         </tr>
                //     ';
                // }
                $data = json_encode($allIntPiece);
            }
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
    }


}

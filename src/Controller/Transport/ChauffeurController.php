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

class ChauffeurController extends AbstractController
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
     * @Route("/profile/transport/valider/chauffeur", name="add_chauffeur")
     */
    public function addChauffeur(Request $request)
    {
        $response = new Response();
        //dd($request);

        //$dataSended = json_decode(file_get_contents("php://input"), true);
        $data = null;
        if(!$request->get('id')){
            $c = new TransChauffeur();
            $c->setCreatedAt(new \DateTime());
        }else{
            $c = $this->repoChauffeur->find($request->get('id'));
            $c->setUpdatedAt(new \DateTime());
        }
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
                    $targetPath = "uploads/chauffeurs/" . $_FILES['image']['name'];
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $c->setImage($_FILES['image']['name']);
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
        $c->setNom($request->get('nom'));
        $c->setAppellation($request->get('appellation'));
        $c->setMatricule($request->get('matricule'));
        $embauche = date_create_from_format('Y-m-d', $request->get('embauche'));
        $naissance = date_create_from_format('Y-m-d', $request->get('naissance'));
        $visite = date_create_from_format('Y-m-d', $request->get('visite'));
        if($embauche) $c->setEmbauche($embauche);
        if($naissance) $c->setDateNaissance($naissance);
        if($visite) $c->setVisite($visite);
        $c->setAnciennete($request->get('anciennete'));
        $c->setCin($request->get('cin'));
        $c->setPermis($request->get('permis'));
        $c->setPermis($request->get('permis'));
        if(!$request->get('id')){
            $this->em->persist($c);
        }
        $this->em->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/transport/list/chauffeur", name="chauffeurt_list")
     */
    public function chauffeurt_list(Request $request)
    {
        $response = new Response();
        $result = $this->repoChauffeur->findAllChauffeur();
        $dataJson =  json_encode($result);
        
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($dataJson);
        return $response;
    }

    /**
     * @Route("/profile/transport/detail/chauffeur", name="chauffeurt_detail")
     */
    public function chauffeurt_detail(Request $request)
    {
        $response = new Response();
        $result = $this->repoChauffeur->detail($this->repoChauffeur->find($request->get('id')));
        $dataJson =  json_encode($result);

        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($dataJson);
        return $response;
    }
    /**
     * @Route("/profile/chauffeur/delete/{id}", name="delete_chauffeur")
     */
    public function delete_chauffeur(TransChauffeur $c)
    {
        $response = new Response();
        $data = json_encode(['code'=>0,'value'=>'success']);
        if($c){
            $this->em->remove($c);
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

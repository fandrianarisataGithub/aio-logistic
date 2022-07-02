<?php

namespace App\Controller\Transport;

use App\Form\RefPneuType;
use App\Entity\TransPiece;
use App\Form\MarquePneuType;
use App\Entity\TransVehicule;
use App\Entity\TransChauffeur;
use App\Form\PositionPneuType;
use App\Form\TransCodeDesType;
use App\Entity\TransMarquePneu;
use App\Entity\TransPieceEntre;
use App\Form\TransVehiculeType;
use App\Entity\TranPositionPneu;
use App\Entity\TransStationCarb;
use App\Form\TransChauffeurType;
use App\Entity\TransTrajetVoyage;
use App\Entity\TransReferencePneu;
use App\Form\TRansStationCarbType;
use App\Form\TransTrajetVoyageType;
use App\Entity\TransClientVoyageCarb;
use App\Form\TransClientVoyageCarbType;
use App\Repository\TransPneuRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\TransCodeDesignationPiece;
use App\Repository\TransVoyageRepository;
use App\Form\TransCodeDesignationPieceType;
use App\Repository\TransVehiculeRepository;
use App\Repository\TransCarburantRepository;
use App\Repository\TransChauffeurRepository;
use App\Repository\TransPieceEntreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransCarburantEntreRepository;
use App\Repository\TransCarburantSortieRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\TransClientVoyageCarbRepository;
use phpDocumentor\Reflection\PseudoTypes\PositiveInteger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ImportController extends AbstractController
{
    private $em;
    private $repoVehicule;
    private $repoChauffeur;
    private $repoCarb;
    private $repoCarbEntre;
    private $repoCarbSortie;
    private $repoPneu;
    private $repoVoyage;
    private $repoPieceEntre;
    public function __construct(
        EntityManagerInterface $em,
        TransCarburantRepository $repoCarb,
        TransChauffeurRepository $repoChauffeur,
        TransVehiculeRepository $repoVehicule,
        TransCarburantEntreRepository $repoCarbEntre,
        TransCarburantSortieRepository $repoCarbSortie,
        TransPneuRepository $repoPneu,
        TransVoyageRepository $repoVoyage,
        TransPieceEntreRepository $repoPieceEntre
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
        $this->repoPieceEntre = $repoPieceEntre;
    }
    /**
     * @Route("/profile/import-vehicule", name="importVehicule")
     */
    public function importVehicule(Request $request)
    {
        $formVehicule = $this->createForm(TransVehiculeType::class);
        $formChauffeur = $this->createForm(TransChauffeurType::class);
        // client voyage carb
        $formClientVoyage = $this->createForm(TransClientVoyageCarbType::class);
        // trajet
        $formTrajet = $this->createForm(TransTrajetVoyageType::class);
        // station carb
        $formStationCarb = $this->createForm(TRansStationCarbType::class);
        // ref pneu
        $formRefPneu = $this->createForm(RefPneuType::class);
        // pos pneu
        $formPosPneu = $this->createForm(PositionPneuType::class);
        // marque pneu
        $formMarquePneu = $this->createForm(MarquePneuType::class);
        // code-des
        $formCodeDes = $this->createForm(TransCodeDesType::class);

        $formChauffeur->handleRequest($request);
        $formVehicule->handleRequest($request);
        $formClientVoyage->handleRequest($request);
        $formTrajet->handleRequest($request);
        $formStationCarb->handleRequest($request);
        $formRefPneu->handleRequest($request);
        $formPosPneu->handleRequest($request);
        $formMarquePneu->handleRequest($request);
        $formCodeDes->handleRequest($request);
        if ($formVehicule->isSubmitted() && $formVehicule->isValid()) {
            $fichier = $formVehicule->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            /* $sheetname = "FOURNISSEURS";
                $reader->setLoadSheetsOnly($sheetname); */
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            for($i = 1; $i<count($data); $i++){
                $v = new TransVehicule();
                $v->setImmatriculation($data[$i][0]);
                $v->setCentre($data[$i][1]);
                $v->setMarque($data[$i][2]);
                $v->setEnergie($data[$i][3]);
                $v->setReservoir($data[$i][4]);
                $v->setType($data[$i][6]);
                $this->em->persist($v);
            }
            $this->em->flush();
        }
        // ref pneu
        if ($formRefPneu->isSubmitted() && $formRefPneu->isValid()) {
            $fichier = $formRefPneu->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            $sheetname = "LISTE REFERENCES PNEUS";
            $reader->setLoadSheetsOnly($sheetname);
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            //dd($data);
            if(count($data) > 0){
                //delete all 
                $em = $this->getDoctrine()->getManager();
                $sql = 'DELETE FROM trans_reference_pneu';
                $connection = $this->em->getConnection();
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->closeCursor();
                for($i = 0; $i<count($data); $i++){
                    if($data[$i][0] > 0 && gettype($data[$i][0]) == 'integer'){
                        $d = new TransReferencePneu();
                        $d->setNom($data[$i][1]);
                        $d->setRang($data[$i][0]);
                        $this->em->persist($d);
                    }
                }
            }
            $this->em->flush();
        }
        // marque pneu
        if ($formMarquePneu->isSubmitted() && $formMarquePneu->isValid()) {
            $fichier = $formMarquePneu->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            $sheetname = "LISTE MARQUES PNEUS";
            $reader->setLoadSheetsOnly($sheetname);
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            //dd($data);
            if(count($data) > 0){
                //delete all 
                $em = $this->getDoctrine()->getManager();
                $sql = 'DELETE FROM trans_marque_pneu';
                $connection = $this->em->getConnection();
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->closeCursor();
                for($i = 0; $i<count($data); $i++){
                    if($data[$i][0] > 0 && gettype($data[$i][0]) == 'integer'){
                        $d = new TransMarquePneu();
                        $d->setNom($data[$i][1]);
                        $d->setRang($data[$i][0]);
                        $this->em->persist($d);
                    }
                }
            }
            $this->em->flush();
        }
        //formClientVoyage
        if ($formClientVoyage->isSubmitted() && $formClientVoyage->isValid()) {
            $fichier = $formClientVoyage->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            $sheetname = "LISTE CLIENTS";
            $reader->setLoadSheetsOnly($sheetname); 
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            if(count($data) > 0){
                //delete all 
                $em = $this->getDoctrine()->getManager();
                $sql = 'DELETE FROM trans_client_voyage_carb';
                $connection = $this->em->getConnection();
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->closeCursor();
                for($i = 0; $i<count($data); $i++){
                    if($data[$i][0] > 0 && gettype($data[$i][0]) == 'integer'){
                        $d = new TransClientVoyageCarb();
                        $d->setNom($data[$i][1]);
                        $d->setRang($data[$i][0]);
                        $this->em->persist($d);
                    }
                }
            }
            $this->em->flush();
        }
        //formTrajet
        if ($formTrajet->isSubmitted() && $formTrajet->isValid()) {
            $fichier = $formTrajet->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            $sheetname = "LISTE TRAJETS ET MONTANT TTC";
            $reader->setLoadSheetsOnly($sheetname);
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            if(count($data) > 0){
                //delete all 
                $em = $this->getDoctrine()->getManager();
                $sql = 'DELETE FROM trans_trajet_voyage';
                $connection = $this->em->getConnection();
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->closeCursor();
                //dd($data);
                for($i = 0; $i<count($data); $i++){
                    if($data[$i][0] > 0 && gettype($data[$i][0]) == 'integer'){
                        $d = new TransTrajetVoyage();
                        $d->setNom($data[$i][1]);
                        $d->setRang($data[$i][0]);
                        $d->setMontant(str_replace(',', '',$data[$i][2]));
                        $this->em->persist($d);
                    }
                }
            }
            $this->em->flush();
        }
        //station
        if ($formStationCarb->isSubmitted() && $formStationCarb->isValid()) {
            $fichier = $formStationCarb->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            $sheetname = "LISTE STATIONS CARBURANT";
            $reader->setLoadSheetsOnly($sheetname); 
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            if(count($data) > 0){
                //delete all 
                $em = $this->getDoctrine()->getManager();
                $sql = 'DELETE FROM trans_station_carb';
                $connection = $this->em->getConnection();
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->closeCursor();
                for($i = 0; $i<count($data); $i++){
                    if($data[$i][0] > 0 && gettype($data[$i][0]) == 'integer'){
                        $d = new TransStationCarb();
                        $d->setNom($data[$i][1]);
                        $d->setRang($data[$i][0]);
                        $this->em->persist($d);
                    }
                }
            }
            $this->em->flush();
        }
        //position pneu
        if ($formPosPneu->isSubmitted() && $formPosPneu->isValid()) {
            $fichier = $formPosPneu->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            $sheetname = "LISTE POSITONS PNEUS";
            $reader->setLoadSheetsOnly($sheetname); 
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            //dd($data);
            if(count($data) > 0){
                //delete all 
                $em = $this->getDoctrine()->getManager();
                $sql = 'DELETE FROM tran_position_pneu';
                $connection = $this->em->getConnection();
                $stmt = $connection->prepare($sql);
                $stmt->execute();
                $stmt->closeCursor();
                for($i = 0; $i<count($data); $i++){
                    if($data[$i][0] > 0 && gettype($data[$i][0]) == 'integer'){
                        $d = new TranPositionPneu();
                        $d->setNom($data[$i][1]);
                        $d->setRang($data[$i][0]);
                        $this->em->persist($d);
                    }
                }
            }
            $this->em->flush();
        }
        // chauffeur
        if ($formChauffeur->isSubmitted() && $formChauffeur->isValid()) {
            // Novaina  piece
            $fichier = $formChauffeur->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            /* $sheetname = "FOURNISSEURS";
                $reader->setLoadSheetsOnly($sheetname); */
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            //dd($data);
            for($i = 1; $i<count($data); $i++){
                $date = date_create_from_format('m/d/Y', $data[$i][0]);
                $p = new TransPiece();
                $p->setCreatedAt($date);
                $p->setUpdatedAt($date);
                $p->setCode($data[$i][1]);
                $p->setDesignation($data[$i][2]);
                $p->setQte(intval($data[$i][3]));
                $p->setPrix(intval(str_replace(',','',$data[$i][4])));
                $p->setPrixTotal(intval($data[$i][3])*intval(str_replace(',','',$data[$i][4])));
                $p->setBl(' ');
                $p->setFournisseur(' ');
                $this->em->persist($p);
                $e = new TransPieceEntre();
                $e->setCreatedAt($date);
                $e->setUpdatedAt($date);
                $e->setCode($data[$i][1]);
                $e->setDesignation($data[$i][2]);
                $e->setQte(intval($data[$i][3]));
                $e->setPrix(intval(str_replace(',','',$data[$i][4])));
                $e->setPrixTotal(intval($data[$i][3])*intval(str_replace(',','',$data[$i][4])));
                $e->setBl(' ');
                $e->setFournisseur(' ');
                $this->em->persist($e);
            }
            $this->em->flush();
        }
        // TRans Code Des
        if ($formCodeDes->isSubmitted() && $formCodeDes->isValid()) {
            /*$fichier = $formCodeDes->get('fichier')->getData();
            $originalFilename1 = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
            // $safeFilename1 = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename1);
            // dd($safeFilename1);
            $newFilename1 = $originalFilename1 . '.' . $fichier->guessExtension();
            
            $fileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($fichier->getRealPath()); // d'après dd($fichier)
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($fileType); // ty le taloha
            $sheetname = "LISTE CODE DESIGNATION";
            $reader->setLoadSheetsOnly($sheetname); 
            $spreadsheet = $reader->load($fichier->getRealPath()); // le nom temporaire
            $data = $spreadsheet->getActiveSheet()->toArray();
            //dd($data);
            if(count($data) > 0){
                //delete all 
                
                for($i = 0; $i<count($data); $i++){
                    if($data[$i][0] > 0 && gettype($data[$i][0]) == 'integer'){
                        $d = new TranPositionPneu();
                        $d->setNom($data[$i][1]);
                        $d->setRang($data[$i][0]);
                        $this->em->persist($d);
                    }
                }
            }*/
            // on vide la liste actuelle
            $em = $this->getDoctrine()->getManager();
            $sql = 'DELETE FROM trans_code_designation_piece';
            $connection = $this->em->getConnection();
            $stmt = $connection->prepare($sql);
            $stmt->execute();
            $stmt->closeCursor();
            $this->em->flush();
            // on génère la nouvelle liste
            //repo TransPieceEntreRepository func findAllCodeDes
            $listCodeDes =  $this->repoPieceEntre->findAllCodeDes();
            //dd($listCodeDes);
            foreach($listCodeDes as $item){
                $codeDes = new TransCodeDesignationPiece();
                $codeDes->setCode($item['code']);
                $codeDes->setDesignation($item['designation']);
                $this->em->persist($codeDes);
            }
            $this->em->flush();
        }
        return $this->render('transport/import.html.twig', [
            'formVehicule' => $formVehicule->createView(),
            'formChauffeur' => $formChauffeur->createView(),
            'formClientVoyage' => $formClientVoyage->createView(),
            'formTrajet' => $formTrajet->createView(),
            'formStationCarb' => $formStationCarb->createView(),
            'formRefPneu' => $formRefPneu->createView(),
            'formPosPneu' => $formPosPneu->createView(),
            'formMarquePneu' => $formMarquePneu->createView(),
            'formCodeDes' => $formCodeDes->createView()
        ]);
    }
    
}


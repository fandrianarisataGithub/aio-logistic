<?php

namespace App\Controller\Transport;



use App\Entity\TransChauffeur;
use App\Entity\TransClientVoyageCarb;
use App\Entity\TransIntervention;
use App\Entity\TransInterventionDetail;
use App\Entity\TransPieceEntre;
use App\Entity\TransVehicule;
use App\Entity\TransPiece;
use App\Repository\TransPieceEntreRepository;
use App\Repository\TransPieceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PieceController extends AbstractController
{
    /**
     * @Route("/profile/garage/sortie", name="transport_garage_sortie_piece")
     */
    public function sortiePieces(ManagerRegistry $doctrine)
    {
        $vehicules = $doctrine->getRepository(TransVehicule::class)->pluckImmatriculation();
        $pieces = $doctrine->getRepository(TransPiece::class)->pluckDesignation();
        $chauffeurs = $doctrine->getRepository(TransChauffeur::class)->pluckNomMatricule();
        $allClient = $doctrine->getRepository(TransClientVoyageCarb::class)->findAllclient();
        return $this->render("transport/garage/sortie_piece.html.twig",[
            'vehicules' => $vehicules,
            'pieces' => $pieces,
            'chauffeurs' => $chauffeurs,
            'allClient' => $allClient,
        ]);
    }
    /**
     * @Route("/profile/garage/reload", name="reload")
     */
    public function reloadPieces(ManagerRegistry $doctrine)
    {
        $pieces = $doctrine->getRepository(TransPiece::class)->pluckDesignation();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent(json_encode($pieces));
        return $response;
    }
    /**
     * @Route("/profile/trans/delete-piece-entre", name="delete_piece_entre")
    */
    public function delete_piece_entre
    (
        Request $request,
        TransPieceRepository $repoPieceStock,
        TransPieceEntreRepository $repoPieceEntre,
        EntityManagerInterface $entityManager
    )
    {
        $response = new Response();
        $finalResult = null;
        $qtePieceEntre = $request->get('qtePieceEntre');
        $id_piece_entre = $request->get('id_piece_entre');
        $pieceEntre = $repoPieceEntre->find($id_piece_entre);
        $prixTotalPieceEntre = $pieceEntre->getPrixTotal();
        $code = $request->get('code');
        // test si on peut le supprimer (si qte dans stock >= qtePieceEntre)
        $pieceInstock = $repoPieceStock->findOneBy(['code' => $code]);
        $qteInstock = $pieceInstock->getQte();
        if($qteInstock >= $qtePieceEntre){
            // ok pour la suppressin
            $pms = $pieceInstock->getPrix(); // prix moyen in stock piece
            $pmAvant = ($qteInstock * $pms - $prixTotalPieceEntre)/($qteInstock - $qtePieceEntre); // prix moyen avant l'ajout (solina an'io le prix ao @ trans-piece)
            $newPrixTotalPieceInstock = $pmAvant * ($qteInstock - $qtePieceEntre);
            // hydratena sisa le piece stock $pieceInstock
            // edit $pieceStock
            $pieceInstock->setQte($qteInstock - $qtePieceEntre);
            $pieceInstock->setPrix($pmAvant);
            $pieceInstock->setPrixTotal($newPrixTotalPieceInstock);
            // on peut delete pieceEntre
            $entityManager->remove($pieceEntre);
            $entityManager->flush();
            $finalResult = 'deleted';
        }
        else{
            $finalResult = 'can not be deleted';
        }
    
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent(json_encode($finalResult));
        return $response;
    }

    /**
     * @Route("/profile/piece/new", name="new_piece")
     */
    public function newPiece(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        //dd($request);
        $now = new \DateTime();
        $response = new Response();
        $stockpiece = $entityManager->getRepository(TransPiece::class)->findOneBy(array('code' => $request->get('code'), 'designation' => $request->get('designation')));
        //$stockpiece = $entityManager->getRepository(TransPiece::class)->findOneByDesignation($request->get('designation'));
        if ($stockpiece) {
            //dd($stockpiece);
            $old_qte = $stockpiece->getQte();
            $old_prix = $stockpiece->getPrix();
            $qte = $old_qte + floatval($request->get('qte'));
            // if old_prix = 0, on somme la qte-old avec la qte-entré et on les assemble avec le nouveau prix-unitaire entré
            $prix = floatval(str_replace(' ', '', $request->get('prix')));
            $total = $qte * $prix;
            if($old_prix != 0){
                $total = ($old_prix*$old_qte) + floatval(str_replace(' ', '', $request->get('prix_total')));
                $prix = $total / $qte;
            }
            
            $stockpiece->setQte($qte);
            $stockpiece->setPrix($prix);
            $stockpiece->setPrixTotal($total);
            $stockpiece->setUpdatedAt($now);
        }else{
            $stockpiece = new TransPiece();
            //dd($request->get('designation'));
            $stockpiece->setCreatedAt(date_create_from_format('Y-m-d',$request->get('date')));
            $stockpiece->setUpdatedAt($now);
            $stockpiece->setPrix(floatval(str_replace(' ', '', $request->get('prix'))));
            $stockpiece->setPrixTotal(floatval(str_replace(' ', '', $request->get('prix_total'))));
            $stockpiece->setBl($request->get('bl'));
            $stockpiece->setCode($request->get('code'));
            $stockpiece->setDesignation($request->get('designation'));
            $stockpiece->setFournisseur($request->get('fournisseur'));
            $stockpiece->setQte($request->get('qte'));
            $entityManager->persist($stockpiece);
        }
        $piece = new TransPieceEntre();
        $piece->setCreatedAt(date_create_from_format('Y-m-d',$request->get('date')));
        $piece->setUpdatedAt($now);
        $piece->setPrix(floatval(str_replace(' ', '', $request->get('prix'))));
        $piece->setPrixTotal(floatval(str_replace(' ', '', $request->get('prix_total'))));
        $piece->setBl($request->get('bl'));
        $piece->setCode($request->get('code'));
        $piece->setDesignation($request->get('designation'));
        $piece->setFournisseur($request->get('fournisseur'));
        $piece->setQte($request->get('qte'));
        $entityManager->persist($piece);
        //dd($piece);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
    /**
     * @Route("/profile/piece/entrer", name="entrer_piece")
     */
    public function entrerPiece(Request $request, ManagerRegistry $doctrine){
        $response = new Response();
        $result = $doctrine->getRepository(TransPieceEntre::class)->entrerPiece($request->get('date1'),$request->get('date2'));
        $data = json_encode($result);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
    /**
     * @Route("/profile/piece/stock", name="stock_piece")
     */
    public function stockPiece(Request $request, ManagerRegistry $doctrine){
        $response = new Response();
        $result = $doctrine->getRepository(TransPieceEntre::class)->stockPiece($request->get('date1'),$request->get('date2'));
        $data = json_encode($result);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/intervention/new", name="new_intervention")
     */
    public function newIntervention(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $now = new \DateTime();
        $date_debut = date_create($request->get('date_debut'));
        $date_fin = date_create($request->get('date_fin'));
        $vehicule = $entityManager->getRepository(TransVehicule::class)->find($request->get('vehicule'));
        if (!$vehicule) {
            throw $this->createNotFoundException(
                'No vehicule found for id '.$request->get('vehicule')
            );
        }
        $intervention = new TransIntervention();
        $pieces = $request->get('piece');
        //dd($pieces);
        foreach ($pieces as $piesy){
            $piece = $entityManager->getRepository(TransPiece::class)->find($piesy['id']);
            if (!$piece) {
                throw $this->createNotFoundException(
                    'No piece found for id '.$piesy['id']
                );
            }else{
                $detail = new TransInterventionDetail();
                $detail->setPiece($piece);
                $detail->setQte($piesy['qte']);
                $detail->setIntervention($intervention);
                $detail->setCreatedAt($now);
                $detail->setUpdatedAt($now);
                $qte = $piece->getQte() - $piesy['qte'];
                $piece->setQte($qte);
                $prix = $piece->getPrix();
                $piece->setPrixTotal($qte*$prix);
                $piece->setUpdatedAt($now);
                $intervention->addPiece($piece);
                $entityManager->persist($detail);
            }
        }
        $chauffeur = $entityManager->getRepository(TransChauffeur::class)->find($request->get('chauffeur'));
        if ($chauffeur) {
            $intervention->setChauffeur($chauffeur);
        }
        $intervention->setClient($request->get('client'));
        $intervention->setDateDebut($date_debut);
        $intervention->setDateFin($date_fin);
        $intervention->setVehicule($vehicule);
        $intervention->setKm($request->get('km'));
        $intervention->setOt($request->get('ot'));
        $intervention->setMotif($request->get('motif'));
        $intervention->setIntervenant($request->get('intervenant'));
        $intervention->setLieuIntervention($request->get('lieuIntervention'));
        $intervention->setCommentaire($request->get('commentaire'));
        $intervention->setTotal($request->get('total_intervention'));
        $entityManager->persist($intervention);
        //dd($intervention);
        $entityManager->flush();
        $response = new Response();

        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/intervention/update", name="update_intervention")
     */
    public function updateIntervention(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $now = new \DateTime();
        $date_debut = date_create($request->get('date_debut'));
        $date_fin = date_create($request->get('date_fin'));
        $vehicule = $entityManager->getRepository(TransVehicule::class)->find($request->get('vehicule'));
        if (!$vehicule) {
            throw $this->createNotFoundException(
                'No vehicule found for id '.$request->get('vehicule')
            );
        }
        $intervention = $entityManager->getRepository(TransIntervention::class)->find($request->get('id'));
        if (!$intervention) {
            throw $this->createNotFoundException(
                'No intervention found for id '.$request->get('id')
            );
        }
        $pieces = $request->get('piece');
        foreach ($pieces as $piesy){
            $piece = $entityManager->getRepository(TransPiece::class)->find($piesy['id']);
            if (!$piece) {
                throw $this->createNotFoundException(
                    'No piece found for id '.$piesy['id']
                );
            }else{
                if(isset($piesy['detail_id']) && !is_null($piesy['detail_id'])){
                    $detail = $entityManager->getRepository(TransInterventionDetail::class)->find($piesy['detail_id']);
                    $old_qte = $detail->getQte();
                    $qte = $piece->getQte() - $piesy['qte'] + $old_qte;
                }else{
                    $detail = new TransInterventionDetail();
                    $detail->setIntervention($intervention);
                    $detail->setCreatedAt($now);
                    $detail->setPiece($piece);
                    $qte = $piece->getQte() - $piesy['qte'];
                    $intervention->addPiece($piece);
                }
                $detail->setQte($piesy['qte']);
                $detail->setUpdatedAt($now);
                $piece->setQte($qte);
                $prix = $piece->getPrix();
                $piece->setPrixTotal($qte*$prix);
                $piece->setUpdatedAt($now);
                $entityManager->persist($detail);
            }
        }$chauffeur = $entityManager->getRepository(TransChauffeur::class)->find($request->get('chauffeur'));
        if ($chauffeur) {
            $intervention->setChauffeur($chauffeur);
        }
        $intervention->setClient($request->get('client'));
        $intervention->setDateDebut($date_debut);
        $intervention->setDateFin($date_fin);
        $intervention->setVehicule($vehicule);
        $intervention->setKm($request->get('km'));
        $intervention->setOt($request->get('ot'));
        $intervention->setMotif($request->get('motif'));
        $intervention->setIntervenant($request->get('intervenant'));
        $intervention->setLieuIntervention($request->get('lieuIntervention'));
        $intervention->setCommentaire($request->get('commentaire'));
        $intervention->setTotal($request->get('total_intervention'));
        $entityManager->flush();
        $response = new Response();

        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/intervention/list", name="list_intervention")
     */
    public function listIntervention(Request $request, ManagerRegistry $doctrine ){
        $response = new Response();
        $result = $doctrine->getRepository(TransIntervention::class)->listIntervention($request->get('date1'),$request->get('date2'),$request->get('piece_id'));
        foreach($result as $key => $value){
            $pieces = $doctrine->getRepository(TransIntervention::class)->listPiece($value['id']);
            $result[$key]['pieces'] = $pieces;
        }
        $data = json_encode($result);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/intervention/listpiece", name="listpiece_intervention")
     */
    public function listPiece(Request $request, ManagerRegistry $doctrine ){
        $response = new Response();
        $result = $doctrine->getRepository(TransIntervention::class)->listPiece($request->get('id'));
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

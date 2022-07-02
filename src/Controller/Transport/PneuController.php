<?php

namespace App\Controller\Transport;



use App\Entity\TransChauffeur;
use App\Entity\TransPneu;
use App\Entity\TransPneuHist;
use App\Entity\TransVehicule;
use App\Entity\TransPneuEntre;
use App\Entity\TransMarquePneu;
use App\Entity\TransReferencePneu;
use App\Repository\TransClientVoyageCarbRepository;
use App\Repository\TransPneuRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TransVoyageRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\TransPneuHistRepository;
use App\Repository\TransVehiculeRepository;
use App\Repository\TransCarburantRepository;
use App\Repository\TransChauffeurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TransCarburantEntreRepository;
use App\Repository\TransCarburantSortieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PneuController extends AbstractController
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
        TransClientVoyageCarbRepository $repoTransClient,
        TransPneuHistRepository $repoHistPneu
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
        $this->repoTransClient = $repoTransClient;
    }
    //    PNEU
    /**
     * @Route("/profile/pneus/", name="transport_pneus")
     */
    public function pneus(ManagerRegistry $doctrine)
    {
        $vehicules = $doctrine->getRepository(TransVehicule::class)->pluckImmatriculation();
        $marques = $doctrine->getRepository(TransMarquePneu::class)->findAll();
        $references = $doctrine->getRepository(TransReferencePneu::class)->findAll();
        $counts = $doctrine->getRepository(TransPneu::class)->counts();
        $tracteurs = $doctrine->getRepository(TransPneu::class)->marques('tracteur');
        $remorques = $doctrine->getRepository(TransPneu::class)->marques('remorque');
        $autres = $doctrine->getRepository(TransPneu::class)->marques('autre');
        $chauffeurs = $doctrine->getRepository(TransChauffeur::class)->pluckNomMatricule();
        $allClient = $this->repoTransClient->findAllclient();

        return $this->render("transport/pneus.html.twig",[
            'vehicules' => $vehicules,
            'references' => $references,
            'marques' => $marques,
            'counts' => $counts,
            'chauffeurs' => $chauffeurs,
            'allClient' => $allClient,
            'tracteurs' => $tracteurs,
            'remorques' => $remorques,
            'autres' => $autres,
        ]);
    }
    /**
     * @Route("/profile/pneu/select", name="select_pneus")
     */
    public function pneuSelect(ManagerRegistry $doctrine, Request $request)
    {
        /*$pneus = $doctrine->getRepository(TransPneu::class)->pluckSerie();
        $html = '<option value="">---CHOISISSER---</option>';
        foreach ($pneus as $pneu){
            $html .= '<option value="'.$pneu['id'].'" data-marque="'.$pneu['marque'].'" data-prix="'.$pneu['prix'].'" data-type="'.$pneu['type'].'">'.$pneu['reference'].'</option>';
        }*/
        $pneu = $doctrine->getRepository(TransPneu::class)->findCustom($request->get('reference'), $request->get('marque'));
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent(json_encode($pneu));
        return $response;

    }
    /**
     * @Route("/profile/pneu/new", name="new_pneu")
     */
    public function newPneu(ManagerRegistry $doctrine, Request $request)
    {
        
        $entityManager = $doctrine->getManager();
        $now = new \DateTime();
        $date = date_create_from_format('Y-m-d\TH:i', $request->get('date'));
        $date = \DateTimeImmutable::createFromMutable($date);
        $datenow = \DateTimeImmutable::createFromMutable($now);
        $response = new Response();
        $pneu = $entityManager->getRepository(TransPneu::class)->findOneBy(array('marque' => $request->get('marque'), 'prix' => $request->get('prix'), 'reference' => $request->get('reference')));
        if($pneu){
            $qte = $pneu->getQte() + $request->get('qte');
        }else{
            $pneu = new TransPneu();
            $pneu->setCreatedAt($date);
            $qte = $request->get('qte');
        }

        $pneu->setMarque($request->get('marque'));
        $pneu->setReference($request->get('reference'));
        $pneu->setPrix($request->get('prix'));
        $pneu->setType($request->get('type'));
        $pneu->setSerie('   ');
        $pneu->setQte($qte);
        $entityManager->persist($pneu);
        $history = new TransPneuHist();
        $history->setPneu($pneu);
        $history->setQte($request->get('qte'));
        $history->setMontant($request->get('prix_total'));
        $history->setCreatedAt($date);
        $history->setUpdatedAt($date);
        $history->setDate($date);
        $entityManager->persist($history);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/pneu/update", name="update_pneu")
     */
    public function updatePneu(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $now = new \DateTime();
        $pneu = $entityManager->getRepository(TransPneu::class)->find($request->get('id'));
        if (!$pneu) {
            throw $this->createNotFoundException(
                'No pneu found for id '.$request->get('id')
            );
        }
        $vehicule = $entityManager->getRepository(TransVehicule::class)->find($request->get('vehicule'));
        if (!$vehicule) {
            throw $this->createNotFoundException(
                'No vehicule found for id '.$request->get('vehicule')
            );
        }
        $date = date_create_from_format('Y-m-d\TH:i', $request->get('date'));
        $response = new Response();
        $history = $entityManager->getRepository(TransPneuHist::class)->find($request->get('id_hist'));
        if (!$history) {
            $history = new TransPneuHist();
            $qte = $pneu->getQte();
            $pneu->setQte($qte - 1);
        }else{

        }
        $history->setVehicule($vehicule);
        $history->setSerie($request->get('serie'));
        $history->setKilometrage($request->get('kilometrage'));
        $history->setCreatedAt($now);
        $history->setUpdatedAt($now);
        $history->setPneu($pneu);
        $history->setDate($date);
        $history->setPosition($request->get('position'));
        $history->setClient($request->get('client'));
        $chauffeur = $entityManager->getRepository(TransChauffeur::class)->find($request->get('chauffeur'));
        if ($chauffeur) {
            $history->setChauffeur($chauffeur);
        }
        $history->setQte(1);
        $history->setMontant('-'.$request->get('prix'));
        $entityManager->persist($history);
        $entityManager->flush();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
    /**
     * @Route("/profile/pneu/transfert", name="transfert_pneu")
     */
    public function transfertPneu(ManagerRegistry $doctrine, Request $request){
        $entityManager = $doctrine->getManager();
        $pneu = $entityManager->getRepository(TransPneu::class)->find($request->get('id'));
        if (!$pneu) {
            throw $this->createNotFoundException(
                'No pneu found for id '.$request->get('id')
            );
        }
        $now = new \DateTime();
        $date = date_create_from_format('Y-m-d\TH:i', $request->get('date_transfert'));
        $history = $entityManager->getRepository(TransPneuHist::class)->find($request->get('id_hist_transfert'));
        if (!$history) {
            $history = new TransPneuHist();
            $qte = $pneu->getQte();
        }
        $history->setQte($request->get('qte'));
        $history->setCreatedAt($now);
        $history->setUpdatedAt($now);
        $history->setPneu($pneu);
        $history->setDate($date);
        $history->setMontant(' ');
        $history->setClient($request->get('client'));
        $pneu->setQte($pneu->getQte() - $request->get('qte') + intval($request->get('qte-old')));
        $entityManager->persist($history);
        $entityManager->flush();
        $response = new Response();
        $data = json_encode(['code'=>0,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/pneu/setnull", name="setnull_pneu")
     */
    public function setnullPneu(ManagerRegistry $doctrine, Request $request)
    {
        $entityManager = $doctrine->getManager();
        $history = $entityManager->getRepository(TransPneuHist::class)->find($request->get('id_hist'));
        if (!$history) {
            throw $this->createNotFoundException(
                'No history found for id '.$request->get('id_hist')
            );
        }
        $pneu = $entityManager->getRepository(TransPneu::class)->find($request->get('id'));
        if (!$pneu) {
            throw $this->createNotFoundException(
                'No pneu found for id '.$request->get('id')
            );
        }
        if("sortie" == $request->get('type')){
            $qte = $pneu->getQte();
            $pneu->setQte($qte+1);
            $nbr = +1;
        }else if("transfert" == $request->get('type')){
            $qte = $pneu->getQte();
            $pneu->setQte($qte+intval($request->get('qte')));
            $nbr = +1;
        }else{
            $entityManager->remove($pneu);
            $nbr = $history->getQte() * (-1);
        }
        $pneu->setVehicule(null);
        $pneu->setKilometrage(null);
        $pneu->setDate(null);
        $pneu->setPosition(null);
        $entityManager->remove($history);
        $response = new Response();
        $entityManager->flush();
        $data = json_encode(['code'=>$nbr,'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/pneu/sorties", name="sortie_pneu")
     */
    public function sortiePneu(Request $request, ManagerRegistry $doctrine ){
        $response = new Response();
        $result = $doctrine->getRepository(TransPneu::class)->sortiePneu($request->get('date1'),$request->get('date2'));
        $data = json_encode($result);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }

    /**
     * @Route("/profile/pneu/edit", name="edit_pneu")
     */
    public function editPneu(Request $request, ManagerRegistry $doctrine ){
        $now = new \DateTime();
        $response = new Response();
        $entityManager = $doctrine->getManager();
        $pneu = $entityManager->getRepository(TransPneu::class)->find($request->get('id'));
        if (!$pneu) {
            throw $this->createNotFoundException(
                'No pneu found for id '.$request->get('id')
            );
        }
        $history = $entityManager->getRepository(TransPneuHist::class)->find($request->get('id_hist'));
        if (!$history) {
            throw $this->createNotFoundException(
                'No history found for id '.$request->get('id_hist')
            );
        }
        $pneu->setMarque($request->get('marque'));
        $pneu->setReference($request->get('reference'));
        $pneu->setPrix($request->get('prix'));
        $qte = $pneu->getQte() + $request->get('qte') - $history->getQte();
        $pneu->setQte($qte);
        $history->setQte($request->get('qte'));
        $history->setMontant($request->get('prix_total'));
        $history->setUpdatedAt($now);
        $entityManager->flush();
        $entityManager->getRepository(TransPneu::class)->updateHistory($pneu->getId(), $pneu->getPrix());
        $data = json_encode(['code'=>$pneu->getType(),'value'=>'success']);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
    /**
     * @Route("/profile/loadListPneu-historique", name="loadListPneuHistorique")
     */
    public function loadListPneuHistorique(Request $request)
    {
        $response = new Response();
        $now = new \DateTime();
        $currentYear = $now->format('Y');
        if($request->isXmlHttpRequest()){
            $anneePneu = $request->get('anneePneu')  ? $request->get('anneePneu') : $currentYear;
            $pneuSortie = null;
            if($request->get('mois') == null){
                $pneuSortie = $this->repoHistPneu->allPneuSortie($anneePneu, null);
            }
            else{
                $pneuSortie = $this->repoHistPneu->allPneuSortie($anneePneu, $request->get('mois'));
            }
            $data = json_encode($pneuSortie);
            //dd($data);
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
    }
}

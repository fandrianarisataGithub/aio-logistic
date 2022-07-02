<?php

namespace App\Repository;

use App\Entity\TransVehicule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransVehicule|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransVehicule|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransVehicule[]    findAll()
 * @method TransVehicule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransVehiculeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransVehicule::class);
    }

    // /**
    //  * @return TransVehicule[] Returns an array of TransVehicule objects
    //  */
    /*
    public function findByExampleField($value)
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
    public function findOneBySomeField($value): ?TransVehicule
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllVehiculeMatriculation(){
        return $this->createQueryBuilder('t')
            ->select('t.immatriculation')
            ->orderBy('t.immatriculation', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function findAllVehicule($date1=null,$date2=null){
        /*$qb = $this->createQueryBuilder('t')
            ->getQuery();
        return $qb->getArrayResult();*/
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT immatriculation, centre, marque, energie, reservoir, DATE_FORMAT(date_circulation,"%d/%m/%Y") as date, type, id, image FROM trans_vehicule t
            /*WHERE t.price > :price
            ORDER BY t.price ASC*/
            ';
        $params = [];
        if(null!=$date1){
            $sql .= ' WHERE t.date_circulation >= :date1';
            $params['date1'] = $date1;
        }
        if(null!=$date2){
            if(null==$date1) {
                $sql .= ' WHERE t.date_circulation <= :date2';
            }else{
                $sql .= ' AND t.date_circulation <= :date2';
            }
            $params['date2'] = $date2;
        }
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery($params);

        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAllAssociative();
    }
    public function pluckImmatriculation(){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT id, immatriculation FROM trans_vehicule GROUP BY id ORDER BY immatriculation';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery();
        return $stmt->fetchAllAssociative();
    }

    public function loadImm($vehicule)
    {
        $v = $this->createQueryBuilder('t');
        $v = $v
            ->select('
                t.id as vehicule_id,
                t.immatriculation as immatriculation,
                t.marque as vehicule_marque,
                t.centre as vehicule_centre,
                t.image as vehicule_image
            ')
            ->andWhere('t.immatriculation = :val')
            ->setParameter('val', $vehicule->getImmatriculation())
            ->getQuery()
            ->getResult()
        ;
        return $v;
    }

    public function showFiche($vehicule)
    {
        //$v = $this->createQueryBuilder('t');
        /*$v = $v
            ->select('
                t.id as vehicule_id,
                t.immatriculation as immatriculation,
                t.marque as vehicule_marque,
                t.centre as vehicule_centre,
                t.image as vehicule_image,

                voyage.client as client_voyage,
                chauffeur.appellation as chauffeur_voyage,
                voyage.ot as voyage_ot,
                voyage.date_debut as voyage_dd,
                voyage.date_fin as voyage_df,
                voyage.trajet as voyage_trajet,
                voyage.montant as voyage_montant,

                carb.createdAt as date_carb,
                carb.station as carb_station,
                carb.kilometrage as carb_kilometrage,
                carb_chauffeur.appellation as carb_sortie_chauffeur,
                carb.client as carb_client,
                carb.typeCarburant as carb_type,
                carb.litrage as carb_litrage,
                carb.fondReservoir as carb_fond,
                carb.trajet as carb_trajet,
                carb.montant as carb_montant,

                pneu_hist.created_at as date_pneu,
                pneu_hist.kilometrage as pneu_kilometrage,
                pneu_hist.serie as pneu_serie,
                pneu.marque as pneu_marque,
                pneu.reference as pneu_reference,
                pneu_hist.position as pneu_position,
                pneu.prix as pneu_montant,

                int.date_debut as int_date_debut,
                int.date_fin as int_date_fin,
                int.km as int_km,
                int.ot as int_ot,
                int.motif as int_motif,
                int_detail.qte as nbr_piece_intervention,
                int.intervenant as intervenant,
                int.commentaire as int_conmmentaire,
                int.total as int_total
            ')
            ->leftjoin('App\Entity\TransVoyage', 'voyage', 'WITH', 't.id = voyage.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'chauffeur', 'WITH', 'chauffeur.id = voyage.chauffeur')
            ->leftjoin('App\Entity\TransCarburantSortie', 'carb', 'WITH', 't.id = carb.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'carb_chauffeur', 'WITH', 'carb_chauffeur.id = carb.chauffeur')
            ->leftJoin('App\Entity\TransPneuHist', 'pneu_hist', 'WITH', 't.id = pneu_hist.vehicule')
            ->leftJoin('App\Entity\TransPneu', 'pneu', 'WITH', 'pneu.id = pneu_hist.pneu')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.id = int.vehicule')
            ->leftJoin('App\Entity\TransPiece', 'piece', 'WITH', 'piece.intervention = int.id')
            ->leftJoin('App\Entity\TransInterventionDetail', 'int_detail', 'WITH', 'int_detail.piece = piece.id')
            ->andWhere('t.immatriculation = :val')
            ->setParameter('val', $vehicule->getImmatriculation())
            ->getQuery()
            ->getResult()
        ;*/
        $ficheVehicule = $this->createQueryBuilder('t')
        ->select('
            t.id as vehicule_id,
            t.immatriculation as immatriculation,
            t.marque as vehicule_marque,
            t.centre as vehicule_centre,
            t.image as vehicule_image
        ')
        ->leftjoin('App\Entity\TransVoyage', 'voyage', 'WITH', 't.id = voyage.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'chauffeur', 'WITH', 'chauffeur.id = voyage.chauffeur')
            ->leftjoin('App\Entity\TransCarburantSortie', 'carb', 'WITH', 't.id = carb.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'carb_chauffeur', 'WITH', 'carb_chauffeur.id = carb.chauffeur')
            ->leftJoin('App\Entity\TransPneuHist', 'pneu_hist', 'WITH', 't.id = pneu_hist.vehicule')
            ->leftJoin('App\Entity\TransPneu', 'pneu', 'WITH', 'pneu.id = pneu_hist.pneu')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.id = int.vehicule')
            ->leftJoin('App\Entity\TransPiece', 'piece', 'WITH', 'piece.intervention = int.id')
            ->leftJoin('App\Entity\TransInterventionDetail', 'int_detail', 'WITH', 'int_detail.piece = piece.id')
            ->andWhere('t.immatriculation = :val')
            ->setParameter('val', $vehicule->getImmatriculation())
            ->groupBy('t.id')
            ->getQuery()
            ->getResult();
        
        $ficheVoyage = $this->createQueryBuilder('t')
            ->select('
                voyage.client as client_voyage,
                chauffeur.appellation as chauffeur_voyage,
                voyage.ot as voyage_ot,
                voyage.date_debut as voyage_dd,
                voyage.date_fin as voyage_df,
                voyage.trajet as voyage_trajet,
                voyage.montant as voyage_montant
            ')
            ->leftjoin('App\Entity\TransVoyage', 'voyage', 'WITH', 't.id = voyage.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'chauffeur', 'WITH', 'chauffeur.id = voyage.chauffeur')
            ->leftjoin('App\Entity\TransCarburantSortie', 'carb', 'WITH', 't.id = carb.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'carb_chauffeur', 'WITH', 'carb_chauffeur.id = carb.chauffeur')
            ->leftJoin('App\Entity\TransPneuHist', 'pneu_hist', 'WITH', 't.id = pneu_hist.vehicule')
            ->leftJoin('App\Entity\TransPneu', 'pneu', 'WITH', 'pneu.id = pneu_hist.pneu')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.id = int.vehicule')
            ->leftJoin('App\Entity\TransPiece', 'piece', 'WITH', 'piece.intervention = int.id')
            ->leftJoin('App\Entity\TransInterventionDetail', 'int_detail', 'WITH', 'int_detail.piece = piece.id')
            ->andWhere('t.immatriculation = :val')
            ->setParameter('val', $vehicule->getImmatriculation())
            ->groupBy('voyage.id')
            ->getQuery()
            ->getResult();

        $ficheCarburant = $this->createQueryBuilder('t')
            ->select('
                carb.createdAt as date_carb,
                carb.station as carb_station,
                carb.kilometrage as carb_kilometrage,
                carb_chauffeur.appellation as carb_sortie_chauffeur,
                carb.client as carb_client,
                carb.typeCarburant as carb_type,
                carb.litrage as carb_litrage,
                carb.fondReservoir as carb_fond,
                carb.trajet as carb_trajet,
                carb.montant as carb_montant
            ')
            ->leftjoin('App\Entity\TransVoyage', 'voyage', 'WITH', 't.id = voyage.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'chauffeur', 'WITH', 'chauffeur.id = voyage.chauffeur')
            ->leftjoin('App\Entity\TransCarburantSortie', 'carb', 'WITH', 't.id = carb.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'carb_chauffeur', 'WITH', 'carb_chauffeur.id = carb.chauffeur')
            ->leftJoin('App\Entity\TransPneuHist', 'pneu_hist', 'WITH', 't.id = pneu_hist.vehicule')
            ->leftJoin('App\Entity\TransPneu', 'pneu', 'WITH', 'pneu.id = pneu_hist.pneu')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.id = int.vehicule')
            ->leftJoin('App\Entity\TransPiece', 'piece', 'WITH', 'piece.intervention = int.id')
            ->leftJoin('App\Entity\TransInterventionDetail', 'int_detail', 'WITH', 'int_detail.piece = piece.id')
            ->andWhere('t.immatriculation = :val')
            ->setParameter('val', $vehicule->getImmatriculation())
            ->groupBy('carb.id')
            ->orderBy('carb.date', 'DESC')
            ->getQuery()
            ->getResult();
        
        $fichePneu = $this->createQueryBuilder('t')
            ->select('
                pneu_hist.created_at as date_pneu,
                pneu_hist.kilometrage as pneu_kilometrage,
                pneu_hist.serie as pneu_serie,
                pneu.marque as pneu_marque,
                pneu.reference as pneu_reference,
                pneu_hist.position as pneu_position,
                pneu.prix as pneu_montant
            ')
            ->leftjoin('App\Entity\TransVoyage', 'voyage', 'WITH', 't.id = voyage.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'chauffeur', 'WITH', 'chauffeur.id = voyage.chauffeur')
            ->leftjoin('App\Entity\TransCarburantSortie', 'carb', 'WITH', 't.id = carb.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'carb_chauffeur', 'WITH', 'carb_chauffeur.id = carb.chauffeur')
            ->leftJoin('App\Entity\TransPneuHist', 'pneu_hist', 'WITH', 't.id = pneu_hist.vehicule')
            ->leftJoin('App\Entity\TransPneu', 'pneu', 'WITH', 'pneu.id = pneu_hist.pneu')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.id = int.vehicule')
            ->leftJoin('App\Entity\TransPiece', 'piece', 'WITH', 'piece.intervention = int.id')
            ->leftJoin('App\Entity\TransInterventionDetail', 'int_detail', 'WITH', 'int_detail.piece = piece.id')
            ->andWhere('t.immatriculation = :val')
            ->setParameter('val', $vehicule->getImmatriculation())
            ->groupBy('pneu_hist.id')
            ->getQuery()
            ->getResult();

        $fichePiece = $this->createQueryBuilder('t')
            ->select('
                int.date_debut as int_date_debut,
                int.date_fin as int_date_fin,
                int.km as int_km,
                int.ot as int_ot,
                int.motif as int_motif,
                SUM(int_detail.qte) as nbr_piece_intervention,
                int.intervenant as intervenant,
                int.commentaire as int_conmmentaire,
                int.total as int_total,
                int.id as intervention_id
            ')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.id = int.vehicule')
            ->leftJoin('App\Entity\TransInterventionDetail', 'int_detail', 'WITH', 'int_detail.intervention = int.id')
            ->andWhere('t.immatriculation = :val')
            ->andWhere('int_detail.qte > 0')
            ->setParameter('val', $vehicule->getImmatriculation())
            ->groupBy('int_detail.intervention')
            ->getQuery()
            ->getResult();
        //dd($ficheCarburant);
        foreach($ficheCarburant as $key=>$item){
            $conso = "";
            if( ($key-1) >= 0){
                $conso = round((($item['carb_litrage'] + $item['carb_fond'] - $ficheCarburant[$key-1]['carb_fond']) / ($ficheCarburant[$key-1]['carb_kilometrage'] - $item['carb_kilometrage'])),2) ." L/Km";
            }
            $ficheCarburant[$key]['conso'] = $conso;
        }
        return [
            'ficheVehicule' => $ficheVehicule,
            'ficheVoyage' => $ficheVoyage,
            'ficheCarburant' => $ficheCarburant,
            'fichePneu' => $fichePneu,
            'fichePiece' => $fichePiece
        ];
    }

    public function showFicheChauffeur($id)
    {

        $ficheVoyage = $this->createQueryBuilder('t')
            ->select('
                voyage.client as client_voyage,
                t.immatriculation as vehicule_voyage,
                voyage.ot as voyage_ot,
                voyage.date_debut as voyage_dd,
                voyage.date_fin as voyage_df,
                voyage.trajet as voyage_trajet,
                voyage.montant as voyage_montant
            ')
            ->leftjoin('App\Entity\TransVoyage', 'voyage', 'WITH', 't.id = voyage.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'chauffeur', 'WITH', 'chauffeur.id = voyage.chauffeur')
            ->leftjoin('App\Entity\TransCarburantSortie', 'carb', 'WITH', 't.id = carb.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'carb_chauffeur', 'WITH', 'carb_chauffeur.id = carb.chauffeur')
            ->andWhere('voyage.chauffeur = :val')
            ->setParameter('val', $id)
            ->groupBy('voyage.id')
            ->getQuery()
            ->getResult();

        $ficheCarburant = $this->createQueryBuilder('t')
            ->select('
                carb.createdAt as date_carb,
                carb.station as carb_station,
                carb.kilometrage as carb_kilometrage,
                t.immatriculation as vehicule_voyage,
                carb.client as carb_client,
                carb.typeCarburant as carb_type,
                carb.litrage as carb_litrage,
                carb.fondReservoir as carb_fond,
                carb.trajet as carb_trajet,
                carb.montant as carb_montant
            ')
            ->leftjoin('App\Entity\TransCarburantSortie', 'carb', 'WITH', 't.id = carb.vehicule')
            ->leftjoin('App\Entity\TransChauffeur', 'carb_chauffeur', 'WITH', 'carb_chauffeur.id = carb.chauffeur')
            ->andWhere('carb.chauffeur = :val')
            ->setParameter('val', $id)
            ->groupBy('carb.id')
            ->orderBy('carb.date', 'DESC')
            ->getQuery()
            ->getResult();

        $fichePneu = $this->createQueryBuilder('t')
            ->select('
                t.immatriculation as vehicule_voyage,
                pneu_hist.created_at as date_pneu,
                pneu_hist.kilometrage as pneu_kilometrage,
                pneu_hist.serie as pneu_serie,
                pneu.marque as pneu_marque,
                pneu.reference as pneu_reference,
                pneu_hist.position as pneu_position,
                pneu.prix as pneu_montant
            ')
            ->leftJoin('App\Entity\TransPneuHist', 'pneu_hist', 'WITH', 't.id = pneu_hist.vehicule')
            ->leftJoin('App\Entity\TransPneu', 'pneu', 'WITH', 'pneu.id = pneu_hist.pneu')
            ->andWhere('pneu_hist.chauffeur = :val')
            ->setParameter('val', $id)
            ->groupBy('pneu_hist.id')
            ->getQuery()
            ->getResult();

        $fichePiece = $this->createQueryBuilder('t')
            ->select('
                t.immatriculation as vehicule_voyage,
                int.date_debut as int_date_debut,
                int.date_fin as int_date_fin,
                int.km as int_km,
                int.ot as int_ot,
                int.motif as int_motif,
                SUM(int_detail.qte) as nbr_piece_intervention,
                int.intervenant as intervenant,
                int.commentaire as int_conmmentaire,
                int.total as int_total,
                int.id as intervention_id
            ')
            ->leftJoin('App\Entity\TransIntervention', 'int', 'WITH', 't.id = int.vehicule')
            ->leftJoin('App\Entity\TransInterventionDetail', 'int_detail', 'WITH', 'int_detail.intervention = int.id')
            ->andWhere('int.chauffeur = :val')
            ->andWhere('int_detail.qte > 0')
            ->setParameter('val', $id)
            ->groupBy('int_detail.intervention')
            ->getQuery()
            ->getResult();

        return [
            'ficheVoyage' => $ficheVoyage,
            'ficheCarburant' => $ficheCarburant,
            'fichePneu' => $fichePneu,
            'fichePiece' => $fichePiece
        ];
    }
}

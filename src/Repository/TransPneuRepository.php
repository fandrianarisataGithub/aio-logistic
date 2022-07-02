<?php

namespace App\Repository;

use App\Entity\TransPneu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TransPneu|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransPneu|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransPneu[]    findAll()
 * @method TransPneu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransPneuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransPneu::class);
    }

    // /**
    //  * @return TransPneu[] Returns an array of TransPneu objects
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
    public function findOneBySomeField($value): ?TransPneu
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function pluckSerie(){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT id, marque, reference, prix, type FROM trans_pneu WHERE qte > 0 GROUP BY id ORDER BY reference';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery();
        return $stmt->fetchAllAssociative();
    }
    public function findCustom($reference, $marque){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT id, marque, reference, prix, qte, type FROM trans_pneu WHERE qte > 0 AND reference = :reference AND marque = :marque ORDER BY id ASC LIMIT 1';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery(['reference'=>$reference, 'marque'=>$marque]);
        return $stmt->fetchAllAssociative();
    }

    public function updateHistory($id, $prix){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'UPDATE trans_pneu_hist SET montant = CONCAT("- ", :prix) WHERE pneu_id = :id AND qte = 1 AND serie IS NOT NULL';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery(['id'=>$id, 'prix'=>$prix]);

    }

    public function sortiePneu($date1=null,$date2=null){

    $conn = $this->getEntityManager()->getConnection();

    $sql = '
            SELECT 
                DATE_FORMAT(h.date,"%d/%m/%Y %H:%i") as date, 
                (SELECT immatriculation 
                    FROM trans_vehicule 
                    WHERE trans_vehicule.id = h.vehicule_id
                ) as immatriculation, 
                h.vehicule_id as vehicule_id,
                h.kilometrage, 
                h.serie, 
                p.marque,
                p.qte as qte_now, 
                reference, 
                h.position, 
                REPLACE(REPLACE(montant," ","")," ","") as prix, 
                h.id, 
                h.qte, 
                h.client as client, 
                (SELECT CONCAT(appellation," - ",matricule) 
                    FROM trans_chauffeur 
                    WHERE trans_chauffeur.id = h.chauffeur_id
                ) as chauffeur,  
                (SELECT id
                    FROM trans_chauffeur 
                    WHERE trans_chauffeur.id = h.chauffeur_id
                ) as chauffeur_id, 
                p.id as id_pneu, 
                p.prix as prix_pneu, 
                CONCAT( UPPER(SUBSTR(p.type,1,1)), SUBSTR(p.type,2)) as type_pneu, 
                IF(h.serie IS NULL,IF(h.client IS NULL,"entrer","transfert"),"sortie") as type, 
                (
                    SELECT COALESCE(SUM(th.qte),0) 
                    FROM trans_pneu_hist as th 
                        INNER JOIN trans_pneu pn ON pn.id = th.pneu_id 
                    WHERE th.vehicule_id IS NOT NULL 
                    AND h.pneu_id = pn.id
                ) as qte_min 
                FROM trans_pneu_hist h 
                    INNER JOIN trans_pneu p ON h.pneu_id = p.id
                WHERE h.pneu_id IS NOT NULL
            ';
    $params = [];
    if(null!=$date1){
        $sql .= ' AND h.date >= :date1';
        $params['date1'] = $date1;
    }
    if(null!=$date2){
        $sql .= ' AND h.date <= :date2';
        $params['date2'] = $date2 .' 23:59:00.000';
    }
    $sql .= ' ORDER BY h.date DESC';
    $stmt = $conn->prepare($sql);
    $stmt->executeQuery($params);

    // returns an array of arrays (i.e. a raw data set)
    return $stmt->fetchAllAssociative();
    }

    public function counts(){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT type, SUM(qte) as total  FROM trans_pneu GROUP BY type';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery();

        return $stmt->fetchAllAssociativeIndexed();

    }

    public function marques($type){
        $conn = $this->getEntityManager()->getConnection();
        $sql = 'SELECT marque, reference, qte, prix, REPLACE(REPLACE(prix," ","")," ","")*qte as total  FROM trans_pneu WHERE type = :type AND qte > 0 ORDER BY marque ASC';
        $stmt = $conn->prepare($sql);
        $stmt->executeQuery(['type'=>$type]);

        return $stmt->fetchAllAssociative();

    }
}

<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use App\Entity\TransChauffeur;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method TransChauffeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method TransChauffeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method TransChauffeur[]    findAll()
 * @method TransChauffeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransChauffeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TransChauffeur::class);
    }
    public function findAllNomAndMatricule(){
        return $this->createQueryBuilder('t')
            ->select('t.appellation, t.matricule')
            ->orderBy('t.appellation', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    public function pluckNomMatricule(){
        return $this->createQueryBuilder('t')
            ->select('t.id, t.appellation as nom, t.matricule')
            ->orderBy('t.nom', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function findAllChauffeur()
    {
        $sqlAsc = $this->createQueryBuilder('t') 
        ;
        $sqlAsc = $sqlAsc
            ->orderBy('t.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
        // format array object result
        $arrayResult = [];
        if(count($sqlAsc) > 0){
            foreach($sqlAsc as $item){
                $visite = $item->getVisite() ? $item->getVisite()->format('d/m/Y') : '';
                if($visite) $visite = $item->getExpired() ? "<span style='background-color:#61f361;color:white';</span>".$visite."</span>" :  "<span style='background-color:red;color:white';</span>".$visite."</span>";
                $arrayResult[] = [
                    "nom" => strtoupper($item->getNom()),
                    "id" => $item->getId(),
                    "prenom" => ucfirst($item->getPrenom()),
                    "appellation" => ucfirst($item->getAppellation()),
                    "matricule" => $item->getMatricule(),
                    "cin" => $item->getCin(),
                    "permis" => $item->getPermis(),
                    "anciennete" => $item->getAnciennete(),
                    "naissance" => $item->getDateNaissance() ? $item->getDateNaissance()->format('d/m/Y') : '',
                    "embauche" => $item->getEmbauche() ? $item->getEmbauche()->format('d/m/Y') : '',
                    "visite" => $visite,
                    "age" => $item->getAge(),
                    "image" => $item->getImage(),
                    "action" => '<a href="#"  
                                    data-id="'. $item->getId() .'" class="edit_chauffeur">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a
                                    href="#" data-id="' . $item->getId() . '" class="delete_chauffeur">
                                    <span class="fa fa-trash-o"></span>
                                </a>'
                ];
            }
            return $arrayResult;
        }else{
            return [
                "nom" => null,
                "id" => null,
                "prenom" =>null,
                "appellation" => null,
                "matricule" => null,
                "action" => null
            ];
        }
        
        
    }

    public function detail($item){
        $visite = $item->getVisite() ? $item->getVisite()->format('d/m/Y') : '';
        if($visite) $visite = $item->getExpired() ? "<span style='background-color:#61f361;color:white';</span>".$visite."</span>" :  "<span style='background-color:red;color:white';</span>".$visite."</span>";
        $arrayResult = [
            "nom" => strtoupper($item->getNom()),
            "id" => $item->getId(),
            "prenom" => ucfirst($item->getPrenom()),
            "appellation" => ucfirst($item->getAppellation()),
            "matricule" => $item->getMatricule(),
            "cin" => $item->getCin(),
            "permis" => $item->getPermis(),
            "anciennete" => $item->getAnciennete(),
            "naissance" => $item->getDateNaissance() ? $item->getDateNaissance()->format('d/m/Y') : '',
            "embauche" => $item->getEmbauche() ? $item->getEmbauche()->format('d/m/Y') : '',
            "visite" => $visite,
            "age" => $item->getAge(),
            "image" => $item->getImage(),
            "action" => '<a href="#"  
                                    data-id="'. $item->getId() .'" class="edit_chauffeur">
                                    <span class="fa fa-pencil"></span>
                                </a>
                                <a
                                    href="#" data-id="' . $item->getId() . '" class="delete_chauffeur">
                                    <span class="fa fa-trash-o"></span>
                                </a>'
        ];
        return $arrayResult;
    }

    // /**
    //  * @return TransChauffeur[] Returns an array of TransChauffeur objects
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
    public function findOneBySomeField($value): ?TransChauffeur
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

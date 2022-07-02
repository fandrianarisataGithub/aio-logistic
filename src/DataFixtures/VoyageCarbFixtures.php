<?php

namespace App\DataFixtures;

use App\Entity\TransPneu;
use App\Entity\TransVoyage;
use Faker\Provider\Fakecar;
use App\Entity\TransVehicule;
use App\Entity\TransChauffeur;
use App\Entity\TransCarburantEntre;
use App\Entity\TransCarburantSortie;
use App\Repository\TransPneuRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\TransVoyageRepository;
use App\Repository\TransVehiculeRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Repository\TransChauffeurRepository;
use App\Repository\TransCarburantEntreRepository;
use App\Repository\TransCarburantSortieRepository;

class VoyageCarbFixtures extends Fixture
{
    private $repoVehicule;
    private $repoVoyage;
    private $repoCarbEntre;
    private $repoCarbSortie;
    private $repoChauffeur;
    private $repoPneu;
    
    public function __construct(
        TransVehiculeRepository $repoVehicule,
        TransCarburantEntreRepository $repoCarbEntre,
        TransCarburantSortieRepository $repoCarbSortie,
        TransVoyageRepository $repoVoyage,
        TransChauffeurRepository $repoChauffeur,
        TransPneuRepository $repoPneu
    )
    {
        $this->repoVoyage = $repoVoyage;
        $this->repoCarbEntre = $repoCarbEntre;
        $this->repoCarbsortie = $repoCarbSortie;
        $this->repoVehicule = $repoVehicule;
        $this->repoChauffeur = $repoChauffeur;
        $this->repoPneu = $repoPneu;
    }
    public function load(ObjectManager $manager): void
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        for ($i=0; $i < 100; $i++) { 
            $v = new TransVehicule();
            $v->setImmatriculation($faker->vehicleRegistration);
            $v->setMarque($faker->vehicle);
            if($i % 3 == 0){
                $v->setCentre('ENAC TANA');
                $v->setReservoir('400');
                $v->setType("Moto");
                if($i % 2 == 0){
                    $v->setCentre('ENAC TAMATAVE');
                    $v->setReservoir('300');
                    $v->setType("Engin");
                }
                else{
                    $v->setCentre('ENAC MAJUNGA');
                    $v->setReservoir('450');
                    $v->setType("Plaisir");
                }
            }
            else if($i % 3 != 0){
                $v->setCentre('ENAC MAJUNGA');
                $v->setReservoir('350');
                $v->setType("Camion"); // camio na tract
            }
            
            $v->setEnergie($faker->vehicleFuelType);
           
            $v->setDateCirculation($faker->dateTimeBetween('-10 years'));
            
            $v->setImage($faker->imageUrl);
            // voyages
            for($j = 0; $j < 30; $j++){
                $voy = new TransVoyage();
                $voy->setVehicule($v);
                $voy->setChauffeur(null);
                $voy->setClient(strtoupper($faker->name));
                $voy->setOt($faker->word);
                $voy->setDateDebut($faker->dateTimeBetween('-5 years'));
                $date = $voy->getDateDebut();
                date_add($date, date_interval_create_from_date_string('3 days'));
                $voy->setDateFin($date);
                $voy->setTrajet($faker->sentence(3));
                $voy->setMontant($faker->numberBetween(1000000, 5000000));
                $voy->setFacture($faker->imageUrl);
                $voy->setCreatedAt($date = $voy->getDateDebut());
                $voy->setUpdatedAt($date = $voy->getDateDebut());
                $manager->persist($voy);
            }
            // 
            $manager->persist($v);
        }
        $manager->flush();
        // $product = new Product();
        // $manager->persist($product);
        // fake chauffeur aloha (100)
        for($i = 0; $i <50; $i++){
            $chauffeur = new TransChauffeur();
            $chauffeur->setNom($faker->name);
            $chauffeur->setPrenom($faker->firstNameMale);
            $chauffeur->setMatricule('ADM-' . $i);
            $manager->persist($chauffeur);
            $manager->flush();
        }
        
        // voyage
        $allVoyages = $this->repoVoyage->findAll();
        foreach($allVoyages as $item){
            $chauffeur = $this->repoChauffeur->find(random_int(1, 52));
            $item->setChauffeur($chauffeur);
            $manager->flush();
        }
        // carb
        // carb entré
        
        for($i=0; $i<2500; $i++){
            if($i % 25 == 0){
                $carbE = new TransCarburantEntre();
                $carbE->setTypeCarburant('ESSENCE');
                
                $carbE->setCreatedAt($faker->dateTimeBetween('-3 months'));
                $carbE->setLitrage('10000');
                $carbE->setMontant('100000000');
                
                $carb2 = new TransCarburantEntre();
                $carb2->setTypeCarburant('GASOIL');
                $carb2->setCreatedAt($faker->dateTimeBetween('-3 months'));
                $carb2->setLitrage('50000');
                $carb2->setMontant('100000000');

                $manager->persist($carbE);
                $manager->persist($carb2);
                
            }
            // manao sorie ess sy gasoil ny dateDepart -> manaky
            // ess 
          
            $ces = new TransCarburantSortie();
            $ces->setTypeCarburant('ESSENCE');
            $chauffeur = $this->repoChauffeur->find(random_int(1, 52));
            $ces->setChauffeur($chauffeur);
            $ces->setLitrage(random_int(200, 600));
            $ces->setMontant(random_int(100000, 200000));
            $dateBas = $faker->dateTimeBetween('-6 months');
            $now = new \DateTime();
            $ces->setCreatedAt($faker->dateTimeInInterval($dateBas, $now->format('Y-m-d')));
            $vehicule = $this->repoVehicule->find(random_int(4, 103));
            $ces->setVehicule($vehicule);
            $ces->setStation($faker->word);
            $ces->setKilometrage(random_int(1000, 30000));
            $ces->setFondReservoir(450);
            $ces->setTrajet($faker->sentence(3));
            $ces->setClient($faker->name . "-client");
            // ess 
            
            $ceg = new TransCarburantSortie();
            $ceg->setTypeCarburant('GASOIL');
            $chauffeur = $this->repoChauffeur->find(random_int(1, 52));
            $ceg->setChauffeur($chauffeur);
            $ceg->setLitrage(random_int(200, 600));
            $ceg->setMontant(random_int(100000, 200000));
            $dateBas = $faker->dateTimeBetween('-6 months');
            $now = new \DateTime();
            $ceg->setCreatedAt($faker->dateTimeInInterval($dateBas, $now->format('Y-m-d')));
            $vehicule = $this->repoVehicule->find(random_int(4, 103));
            $ceg->setVehicule($vehicule);
            $ceg->setStation($faker->word);
            $ceg->setKilometrage(random_int(1000, 30000));
            $ceg->setFondReservoir(450);
            $ceg->setTrajet($faker->sentence(3));
            $ceg->setClient($faker->name . "-client");

            $manager->persist($ces);
            $manager->persist($ceg);
            
        }

        $manager->flush();
        // pneu
        /*$marque = ['Marque1', 'Marque2', 'Marque3', 'Marque4'];
        $ref = ['ref-t-x1', 'ref-t-x2', 'ref-t-x3', 'ref-t-x4'];
        $type = ['TRACTEUR', 'REMORQUE', 'AUTRE'];
        
        // insert pneu 200

        for($i = 0; $i <500; $i++){
            $pneu = new TransPneu();
            $pneu->setCreatedAt(new \DateTimeImmutable());
            $pneu->setSerie($faker->swiftBicNumber);
            $pneu->setMarque($marque[random_int(0,3)]);
            $pneu->setReference($ref[random_int(0,3)]);
            $pneu->setType($type[random_int(0,2)]);
            $pneu->setPrix(random_int(1000000, 40000000));
            $manager->persist($pneu);
            $manager->flush();
        }
        

        // sorti pneu

        for($i = 0; $i <350; $i++){
            $pneu = new TransPneu();
            $pneu->setCreatedAt(new \DateTimeImmutable());
            $pneuSelected = $this->repoPneu->find(random_int(1,501)) ? $this->repoPneu->find(random_int(1,501)) : $this->repoPneu->find(random_int(1,501));
            $pneu->setSerie($pneuSelected->getSerie());
            $pneu->setMarque($pneuSelected->getMarque());
            $pneu->setReference($pneuSelected->getReference());
            $pneu->setType($pneuSelected->getType());
            $pneu->setPrix($pneuSelected->getPrix());
            $pneu->setPosition($faker->word . 'pos');
            $pneu->setDate(new \Datetime());
            $pneu->setKilometrage(random_int(1000,15000));
            $vehicule = $this->repoVehicule->find(random_int(4, 103));
            $pneu->setVehicule($vehicule);
            $manager->persist($pneu);
        }
        $manager->flush();*/
        
    }
}

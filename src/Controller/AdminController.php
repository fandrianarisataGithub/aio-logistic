<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use App\Repository\HotelRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin/lister_user", name="setting")
     */
    public function index()
    {
        return $this->render('admin/setting.html.twig');
    }

    /**
     * @Route("/profile/insert_user_by_login", name="insert.by.login")
     */
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passEnc)
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_statut_logout');
        }
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
            //dd($form->getData());
            $user = $form->getData();
            $user->setHotel("tous");
            $user->setRoles(["ROLE_ADMIN"]);
            $hash = $passEnc->encodePassword($user, $form->get('password')->getData());
            $user->setPassword($hash);
             $entityManager->persist($user);
            $entityManager->flush();
            //dd($user);
        }
        return $this->render('admin/registerByLogin.html.twig', [
            "form" => $form->createView()
        ]);
    }

    public function removeAllUserEtablissement(User $user)
    {
        $allEt = $user->getEtablissement();
        foreach ($allEt as $value) {
            $user->removeEtablissement($value);
        }
        return $user;
    }


    /**
     * @Route("/security/delete_user/{id}", name = "delete.user")
     */
    public function delete_user($id, Request $request, EntityManagerInterface $manager, UserRepository $repoUser)
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_statut_logout');
        }
        $response = new Response();
        $user =  new User();
        if ($request->isXmlHttpRequest()) {
            $user = $repoUser->find($id);
            $manager->remove($user);
            $manager->flush();
            $data = json_encode('ok'); 
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;          
        }
    }

    /**
     * @Route("/profile/add_pdp/{id_user}", name = "edit_pdp")
     */
    public function edit_pdp($id_user, Request $request, UserRepository $repoUser, EntityManagerInterface $manager)
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_statut_logout');
        }
        $response = new Response();
        $user =  new User();
        if ($request->isXmlHttpRequest()) {
            $user = $repoUser->find($id_user);
           
           if(is_array($_FILES)) {
                if(is_uploaded_file($_FILES['fichier']['tmp_name'])) {
                    $sourcePath = $_FILES['fichier']['tmp_name'];
                    $nom = $_FILES['fichier']['name'];
                    $tab_nom = explode(".",$nom);
                    $t = count($tab_nom) - 1;
                    $ext = "";
                    $tab_ext = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
                    if($t > 0){
                        $ext = $tab_nom[$t];
                    }
                    if(in_array($ext, $tab_ext)){
                        $targetPath = "uploads/" . $_FILES['fichier']['name'];
                        if (move_uploaded_file($sourcePath, $targetPath)) {
                            $user->setImage($targetPath);
                            $manager->flush();
                            $html = '
                                <div class="pdp_image" style="background-image : url({{ asset('. $targetPath .') | raw }});">
                                    <input type="file" name="fichier" id="fichier">
                                    <span class="icone_upload fa fa-plus"></span>
                                </div>
                            ';
                            $data = json_encode($html);
                            $response->headers->set('Content-Type', 'application/json');
                            $response->headers->set('Access-Control-Allow-Origin', '*');
                            $response->setContent($data);
                            return $response;
                        }
                    }
                    else{
                        $data = json_encode("error");
                        $response->headers->set('Content-Type', 'application/json');
                        $response->headers->set('Access-Control-Allow-Origin', '*');
                        $response->setContent($data);
                        return $response;
                    }

                    
                   
                }
            }
                
            
           
        }
    }

    /**
     * @Route("/profile/edit_user_compte" , name = "edit_user_compte")
     */
    public function edit_user_compte(UserPasswordEncoderInterface $passEnc, Request $request, UserRepository $repoUser, EntityManagerInterface $manager)
    {
        if(!$this->getUser()){
            return $this->redirectToRoute('app_statut_logout');
        }
        $response = new Response();
        if($request->isXmlHttpRequest()){
            $email = $request->request->get('email');
            $pass = $request->request->get('pass');
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $id = $request->request->get('id');
            $c_pass = $request->request->get('c_pass');
            $user = $repoUser->find($id);
            if(is_array($_FILES) && isset($_FILES['file'])) {
                if($pass == $c_pass){
                    if(is_uploaded_file($_FILES['file']['tmp_name'])) {
                    
                        $sourcePath = $_FILES['file']['tmp_name'];
                        $fichier = $_FILES['file']['name'];
                        //dd($_FILES['file']); ok
                        $tab_nom = explode(".",$fichier);
                        $t = count($tab_nom) - 1;
                        $ext = "";
                        $tab_ext = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
                        if($t > 0){
                            $ext = $tab_nom[$t];
                        }
                        if(in_array($ext, $tab_ext)){
                            $targetPath = "uploads/users/" . $_FILES['file']['name'];
                            if (move_uploaded_file($sourcePath, $targetPath)) {
                                $user->setImage($_FILES['file']['name']);
                            }
                        }
                        else{
                            $data = json_encode('error image');
                            $response->headers->set('Content-Type', 'application/json');
                            $response->headers->set('Access-Control-Allow-Origin', '*');
                            $response->setContent($data);
                            return $response;
                        }
                    }
                }else{
                    $data = json_encode('Erreur de mot de passe');
                    $response->headers->set('Content-Type', 'application/json');
                    $response->headers->set('Access-Control-Allow-Origin', '*');
                    $response->setContent($data);
                    return $response;
                }
            }
            $data = "";
            if(!empty($email)){
                $user->setEmail($email);
                
                if (!empty($pass) && !empty($c_pass)) {
                    if ($c_pass == $pass) {
                        $hash = $passEnc->encodePassword($user, $pass);
                        $user->setPassword($hash);
                        $manager->flush();
                        $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);
                    } else {
                        $data = json_encode("Les mots de passes entrés ne sont pas identiques");
                    }
                }
                else{
                    $manager->flush();
                    $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);

                }
            }
            else{
                if (!empty($pass) && !empty($c_pass)) {
                    if ($c_pass == $pass) {
                        $hash = $passEnc->encodePassword($user, $pass);
                        $user->setPassword($hash);
                        $manager->flush();
                        $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);
                       
                    } else {
                        $data = json_encode("Les mots de passes entrés ne sont pas identiques");
                    }
                } else{
                    if($user->getImage() != ''){
                        $manager->flush();
                        $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);
                    }else{
                        $data = '';
                    }
                }
            }
            
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
           
        }else{
            $email = $request->request->get('email');
            $pass = $request->request->get('pass');
            $nom = $request->request->get('nom');
            $prenom = $request->request->get('prenom');
            $id = $request->request->get('id');
            $c_pass = $request->request->get('c_pass');
            $user = $repoUser->find($id);
            if(is_array($_FILES) && isset($_FILES['file'])) {
                
                if(is_uploaded_file($_FILES['file']['tmp_name'])) {
                    
                    $sourcePath = $_FILES['file']['tmp_name'];
                    $fichier = $_FILES['file']['name'];
                    //dd($_FILES['file']); ok
                    $tab_nom = explode(".",$fichier);
                    $t = count($tab_nom) - 1;
                    $ext = "";
                    $tab_ext = ['png', 'jpg', 'jpeg', 'JPG', 'JPEG', 'PNG'];
                    if($t > 0){
                        $ext = $tab_nom[$t];
                    }
                    if(in_array($ext, $tab_ext)){
                        $targetPath = "uploads/users/" . $_FILES['file']['name'];
                        if (move_uploaded_file($sourcePath, $targetPath)) {
                            $user->setImage($_FILES['file']['name']);
                            $user->setNom($nom);
                            $user->setPrenom($prenom);
                        }
                    }
                    else{
                        $data = json_encode('error image');
                        $response->headers->set('Content-Type', 'application/json');
                        $response->headers->set('Access-Control-Allow-Origin', '*');
                        $response->setContent($data);
                        return $response;
                    }
                }
            }
            $data = "";
            if(!empty($email)){
                $user->setEmail($email);
                $user->setNom($nom);
                $user->setPrenom($prenom);
                if (!empty($pass) && !empty($c_pass)) {
                    if ($c_pass == $pass) {
                        $hash = $passEnc->encodePassword($user, $pass);
                        $user->setPassword($hash);
                        $manager->flush();
                        $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);
                    } else {
                        $data = json_encode("Les mots de passes entrés ne sont pas identiques");
                    }
                }
                else{
                    $manager->flush();
                    $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);

                }
            }
            else{
                $user->setNom($nom);
                $user->setPrenom($prenom);
                if (!empty($pass) && !empty($c_pass)) {
                    if ($c_pass == $pass) {
                        $hash = $passEnc->encodePassword($user, $pass);
                        $user->setPassword($hash);
                        $manager->flush();
                        $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);
                       
                    } else {
                        $data = json_encode("Les mots de passes entrés ne sont pas identiques");
                    }
                } else{
                    if($user->getImage() != ''){
                        $manager->flush();
                        $data = json_encode(['statut' => 'success', 'image' => $user->getImage()]);
                    }else{
                        $data = '';
                    }
                }
            }
            
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
    }
    /**
     * @Route("/profile/trans/load/trans/list_user", name="list_user_trans")
     */
    public function list_user_trans(Request $request, UserRepository $repoUser)
    {
        $response = new Response();
        $allUser =  $repoUser->findAllUserParam();
        //dd($allUser);
        $data = json_encode($allUser);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->setContent($data);
        return $response;
    }
  
    /**
     * @Route("/profile/get-user/parametre/{id}", name ="fetchUser")
     */
    public function fetchUser(User $user, Request $request)
    {
        $response = new Response();
        if($request->isXmlHttpRequest()){
            //dd($user->getEtablissement()->count());
            $data = json_encode([
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail(),
                'hotel_nom' => $user->getHotel(),
                'profile' => $user->getProfile(),
                'receptionniste' => $user->getReceptionniste(),
                'comptable' => $user->getComptable(),
                'roles' => $user->getRoles(),
                'etablissement' => $user->getEtablissement()[0]->getNom(),
            ]);
            //dd($data); // formater le résultat de la requête en json
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
            return $response;
        }
    }
    /**
     * @Route("/profile/trans/addUser", name="trans_add_user")
     */
    public function trans_add_user(
        Request $request, 
        UserRepository $repoUser, 
        EntityManagerInterface $manager,
        UserPasswordEncoderInterface $passEnc,
        HotelRepository $reposHotel
    )
    {
        $response = new Response();
        $dataSended = json_decode(file_get_contents("php://input"), true);
        // deb add
        $role = $request->get('role'); // super_admin, admin_all_hotels, admin_hotel, receptionniste_hotel, admin_tropicalwood, admin_enac_transport, comptable_hotel
        $hotel = $dataSended['hotelEntreprise']; // tous, tous_hotel, nom etablissement ou hotel
        $nom = $dataSended['nomUser'];
        $prenom = $dataSended['prenomUser'];
        $email = array_key_exists("emailUser", $dataSended) ? $dataSended['emailUser'] : null;
        $password = array_key_exists("passUser", $dataSended) ? $dataSended['passUser'] : null;
        $role = $dataSended['typeAdmin'];
        $editNoMailPass = array_key_exists("editNoMailPass", $dataSended) ? $dataSended['editNoMailPass'] : null;
        $isVoyage = array_key_exists("isVoyage", $dataSended) ? $dataSended['isVoyage'] : null;
        $isCarburant = array_key_exists("isCarburant", $dataSended) ? $dataSended['isCarburant'] : null;
        $isPneu = array_key_exists("isPneu", $dataSended) ? $dataSended['isPneu'] : null;
        $isVehicule = array_key_exists("isVehicule", $dataSended) ? $dataSended['isVehicule'] : null;
        $isChauffeur = array_key_exists("isChauffeur", $dataSended) ? $dataSended['isChauffeur'] : null;
        $isGarage = array_key_exists("isGarage", $dataSended) ? $dataSended['isGarage'] : null;
        $user_id = array_key_exists("user_id", $dataSended) ? $dataSended['user_id'] : null;
        //$username = $dataSended['hotelEntreprise'];
            
        $erreur = 0;
        $user = new User();
        
        if(!empty($email) && !empty($password) && !empty($nom)) {
            $user = new User();
            $tab = $repoUser->findBy(array("email"=>$email));
            $taille = count($tab);

            if($taille == 1){
                // erreur email déjà utilisé
                $data = json_encode("L'adresse mail est déjà utilisé");
                $response->headers->set('Content-Type', 'application/json');
                $response->headers->set('Access-Control-Allow-Origin', '*');
                $response->setContent($data);
            }
            // si ce user n'est pas là
            else if($taille == 0){
                $user->setEmail($email);
                // hasher le password 
                $hash = $passEnc->encodePassword($user, $password);
                $user->setPassword($hash);
                $user->setNom($nom);
                $user->setPrenom($prenom);
                //par défaut son username est la première partie de son nom 
                //$user->setUsername($username);
                // le role 
                if ($role == "super_admin") {
                    $user->setRoles(array('ROLE_ADMIN'));
                    $user->setProfile("super_admin"); // acces à tous
                    // on select tous les hotels
                    $hotels = $reposHotel->findAll();
                    foreach ($hotels as $h) {
                        $user->addEtablissement($h);
                    }
                }
                else if($role == "admin_all_hotels"){
                    $user->setRoles(array('ROLE_ADMIN'));
                    $user->setProfile("admin_all_hotels"); // acces unique pour tous les hotel
                    $user->setHotel($dataSended['hotelEntreprise']);
                    // on select tous les hotels
                    $hotels = $reposHotel->findAll();
                    foreach($hotels as $h){
                        $son_nom = $h->getNom();
                        // il ne faut pas que les noms d'hôtel autre que les hôtels entre dans cette liste
                        if($son_nom != "Tropical wood" && $son_nom != "ENAC Transport"){
                            $user->addEtablissement($h);
                        }
                    }
                }
                else if($role == "admin_hotel") {
                    $user->setRoles(array('ROLE_ADMIN'));
                    $user->setProfile("admin_hotel");
                    $hotelEntity = $reposHotel->findOneByNom($hotel);
                    $user->addEtablissement($hotelEntity);
                } 
                else if ($role == "admin_tropicalwood") {
                    $user->setProfile("admin_tropical_wood");
                    $user->setRoles(array('ROLE_TROPICAL_WOOD'));
                    $user->addEtablissement($reposHotel->findOneByNom($hotel));
                }
                else if ($role == "admin_enac_transport") {
                    $user->setProfile("admin_enac_transport");
                    $user->setRoles(array('ROLE_ENAC_TRANSPORT'));
                    $user->setTransportVoyage($isVoyage);
                    $user->setTransportGarage($isGarage);
                    $user->setTransportCarburant($isCarburant);
                    $user->setTransportPneu($isPneu);
                    $user->setTransportVehicule($isVehicule);
                    $user->setTransportChauffeur($isChauffeur);

                    $user->addEtablissement($reposHotel->findOneByNom($hotel));
                }
                else if ($role == "receptionniste_hotel") {
                    $user->setRoles(array('ROLE_USER'));
                    $user->setProfile("admin_hotel"); // hotel unique
                    $user->setReceptionniste('oui'); // stria tsy tadidiko tsoony ze moimba anle profile tany
                    $hotels = $reposHotel->findOneByNom($hotel);
                    $user->addEtablissement($hotels);
                }

                else if ($role == "comptable_hotel") {
                    $user->setRoles(array('ROLE_USER'));
                    $user->setProfile("admin_hotel"); // hotel unique
                    $user->setComptable('oui'); // stria tsy tadidiko tsoony ze moimba anle profile tany
                    $hotels = $reposHotel->findOneByNom($hotel);
                    $user->addEtablissement($hotels);
                }

                $user->setHotel($hotel);
                $user->setUserName($user->getEmail());
                
                // on persist 
                $manager->persist($user);
                // on flush 
                $manager->flush();

                // on récupère tous les users
                $tab_user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findAll();
                // on stock ces data dans u tableau 
                $data = json_encode("ok"); // formater le résultat de la requête en json
                $response->headers->set('Content-Type', 'application/json');
                $response->headers->set('Access-Control-Allow-Origin', '*');
                $response->setContent($data);
            }                   
        }
        if($editNoMailPass == true && $user_id != null){
            $user = $this->getDoctrine()->getRepository(User::class)->find($user_id);
            //dd($user);
            /*
                $hotel = $dataSended['hotelEntreprise']; // tous, tous_hotel, nom etablissement ou hotel
                $nom = $dataSended['nomUser'];
                $prenom = $dataSended['prenomUser'];
                $email = array_key_exists("emailUser", $dataSended) ? $dataSended['emailUser'] : null;
                $password = array_key_exists("passUser", $dataSended) ? $dataSended['passUser'] : null;
                $role = $dataSended['typeAdmin'];
                $editNoMailPass = $dataSended['editNoMailPass'];
                $user_id = $dataSended['user_id'];
            */
            $user->setNom($nom);
            $user->setPrenom($prenom);
            if ($role == "super_admin") {
                $user->setRoles(array('ROLE_ADMIN'));
                $user->setProfile("super_admin"); // acces à tous
                // on select tous les hotels
                $hotels = $reposHotel->findAll();
                foreach ($hotels as $h) {
                    $user->addEtablissement($h);
                }
            }
            else if($role == "admin_all_hotels"){
                $user->setRoles(array('ROLE_ADMIN'));
                $user->setProfile("admin_all_hotels"); // acces unique pour tous les hotel
                $user->setHotel($dataSended['hotelEntreprise']);
                // on select tous les hotels
                $hotels = $reposHotel->findAll();
                foreach($hotels as $h){
                    $son_nom = $h->getNom();
                    // il ne faut pas que les noms d'hôtel autre que les hôtels entre dans cette liste
                    if($son_nom != "Tropical wood" && $son_nom != "ENAC Transport"){
                        $user->addEtablissement($h);
                    }
                }
            }
            else if($role == "admin_hotel") {
                $user->setRoles(array('ROLE_ADMIN'));
                $user->setProfile("admin_hotel");
                $hotelEntity = $reposHotel->findOneByNom($hotel);
                $user->addEtablissement($hotelEntity);
            } 
            else if ($role == "admin_tropicalwood") {
                $user->setProfile("admin_tropical_wood");
                $user->setRoles(array('ROLE_TROPICAL_WOOD'));
                $user->addEtablissement($reposHotel->findOneByNom($hotel));
            }
            else if ($role == "admin_enac_transport") {
                $user->setProfile("admin_enac_transport");
                $user->setRoles(array('ROLE_ENAC_TRANSPORT'));
                $user->addEtablissement($reposHotel->findOneByNom($hotel));
            }
            else if ($role == "receptionniste_hotel") {
                $user->setRoles(array('ROLE_USER'));
                $user->setProfile("admin_hotel"); // hotel unique
                $user->setReceptionniste('oui'); // stria tsy tadidiko tsoony ze moimba anle profile tany
                $hotels = $reposHotel->findOneByNom($hotel);
                $user->addEtablissement($hotels);
            }

            else if ($role == "comptable_hotel") {
                $user->setRoles(array('ROLE_USER'));
                $user->setProfile("admin_hotel"); // hotel unique
                $user->setComptable('oui'); // stria tsy tadidiko tsoony ze moimba anle profile tany
                $hotels = $reposHotel->findOneByNom($hotel);
                $user->addEtablissement($hotels);
            }

            $user->setHotel($hotel);
            $user->setUserName($user->getEmail());
            $manager->flush();
            $data = json_encode("ok"); // formater le résultat de la requête en json
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->setContent($data);
        }

        return $response;
    }
}

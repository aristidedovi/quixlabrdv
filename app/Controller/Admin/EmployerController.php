<?php

namespace App\Controller\Admin;

use Informagenie\OrangeSDK;

//var_dump(dirname(dirname((dirname(__DIR__)))));

require_once dirname(dirname((dirname(__DIR__)))).'/vendor/autoload.php';

class EmployerController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Employer');
        $this->loadModel('Service');
        $this->loadModel('Domaine');
    }

    public function index(){
        $employers = $this->Employer->allEmployer();
        $services = $this->Service->countService();
        $domaine = $this->Domaine->countDomaine();
        $employer = $this->Employer->findEmployer($_SESSION['id']);
        //$services = (array)$services;
        //var_dump($services->nombre);
       // echo $services->nombre;
        if($_SESSION["id_type"] == 1){
            $this->render('admin.employer.index', compact('employers','services','domaine'));
        }elseif($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 3){
           return $this->profil();
        }else{
            echo "pas access";
        }
    }

    public function profil(){
        if(!isset($_GET['id'])){
            $employer = $this->Employer->findEmployer($_SESSION['id']);
        }else{
            $employer = $this->Employer->findEmployer($_GET['id']);
        }
       // $first_login = $_SESSION['first_login'];

        $this->render('admin.employer.profil',compact('employer'));

    }

    public function lister(){
        $employers = $this->Employer->allEmployer();
        // var_dump($employers);
        if($_SESSION["id_type"] == 1){
            $this->render('admin.employer.lister', compact('employers'));
        }else{
            echo "pas access a index";
        }
    }

    public function generatePassword($size){
        $characters = array(0,1,2,3,4,5,6,7,8,9,"a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
        $password = '';
        for ($i = 0; $i < $size; $i++){
            $password .= ($i*2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }
        return $password;
    }

    public function add(){

        //generation de mot de passe pour les employer
        $mot_de_password = $this->generatePassword(10);
       //var_dump($mot_de_passeword);
       //die();
        $errors = 0;
        if(!empty($_POST)){
            if(preg_match("#^[7][7806][0-9]{7}$#",$_POST['telephone']) === 1 &&
                filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
                $_POST['nomComplet'] != '' && ctype_alpha(str_replace(' ','', $_POST['nomComplet'])) === true){

                $em = $this->Employer->findEmmployerByNumero($_POST['telephone']);
                $_POST['password'] = $mot_de_password;

                if($em["telephone"] === $_POST['telephone']){
                    $errors = 2;
                }else{
                    $result = $this->Employer->create([
                        'nomComplet' => $_POST['nomComplet'],
                        'telephone' => $_POST['telephone'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'adresse' => $_POST['adresse'],
                        'id_type_employer' => $_POST['id_type_employer'],
                        'id_domaine' => $_POST['id_domaine'],
                        'id_service' => $_POST['id_service']
                    ]);
                    if($result){
                        //header('Location: admin.php?p=admin.posts.edit&id='.App::getInstance()->getDb()->lastInsertId());
                        $credential = array(
                            'client_id' => 'pY2CXnwAsn7uZePeOgAFGlrHemJE1YA4',
                            'client_secret' => 'lBqxGAMEzFmlCIie'
                        );

                        $sms = new OrangeSDK($credential);
                        $number = $_POST['telephone'];

                        $response = $sms->message('Mot de passe par defaut est : '.$_POST['password'])
                            ->from(+221778580286)
                            ->as('RDV-APP')
                            ->to('+221'.$number)
                            ->send();

                        return $this->lister();
                    }
                }
            }else{
                $errors = 1;
            }
        }
        $this->loadModel('TypeEmployer');
        $this->loadModel('Domaine');
        $this->loadModel('Service');
        $type = $this->TypeEmployer->extract('id','libelle');
        $domaine = $this->Domaine->extract('id','libelle');
        $services = $this->Service->extract('id','libelle');
        //var_dump($type);
        //die();
        $_POST['password'] = $mot_de_password;
        $form = new \Core\HTML\BootstrapForm($_POST);

        $first_login = $_SESSION['first_login'];

        if($_SESSION["id_type"] == 1){
            $this->render('admin.employer.add', compact('type','domaine','form','services','errors','first_login'));
        }else{
            echo "pas access a add";
        }
    }

    public function edit(){
        $errors = 0;
        if(!empty($_POST)){
            if(preg_match("#^[7][7806][0-9]{7}$#",$_POST['telephone']) === 1 &&
                filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
                $_POST['nomComplet'] != '' && ctype_alpha(str_replace(' ','', $_POST['nomComplet'])) === true){
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $session = false;
                }else{
                    $id = $_SESSION['id'];
                    $session = true;
                }
                $employer = $this->Employer->find($_SESSION['id']);
               // var_dump($employer['password']);
               // die();
                if($employer['password'] === $_POST['password']){
                    $result = $this->Employer->update($id,[
                        'nomComplet' => $_POST['nomComplet'],
                        'telephone' => $_POST['telephone'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'adresse' => $_POST['adresse'],
                        'id_type_employer' => $_POST['id_type_employer'],
                        'id_domaine' => $_POST['id_domaine'],
                        'id_service' => $_POST['id_service']
                    ]);
                }else{
                    $result = $this->Employer->update($id,[
                        'nomComplet' => $_POST['nomComplet'],
                        'telephone' => $_POST['telephone'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'adresse' => $_POST['adresse'],
                        'id_type_employer' => $_POST['id_type_employer'],
                        'id_domaine' => $_POST['id_domaine'],
                        'id_service' => $_POST['id_service'],
                        'first_login' => 1
                    ]);
                    $_SESSION['first_login'] = "1";
                }


                if($result){
                    if($session === true){
                        $_SESSION['nomComplet'] = $_POST['nomComplet'];
                        return $this->profil();
                    }else{
                        return $this->lister();
                    }

                }
            }else{
                $errors = 1;
            }
        }
        if(!isset($_GET['id'])){
            $employer = $this->Employer->find($_SESSION['id']);
        }else{
            $employer = $this->Employer->find($_GET['id']);
        }
        //var_dump($employer);
        $this->loadModel('TypeEmployer');
        $this->loadModel('Domaine');
        $this->loadModel('Service');

        $type = $this->TypeEmployer->extract('id','libelle');
        $domaine = $this->Domaine->extract('id','libelle');
        $services = $this->Service->extract('id','libelle');


        $form = new \Core\HTML\BootstrapForm($employer);

        $first_login = $_SESSION['first_login'];
        if($_SESSION["id_type"] == 1 || $_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 3){
            $this->render('admin.employer.add', compact('type','domaine','form','employer','errors','services','first_login'));
        }else{
            echo "pas access a edit";
        }
    }

    public function logout(){
        session_destroy();
        session_reset();
        header('location: index.php');
    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Employer->delete($_POST['id']);
            //header('location: admin.php');
            return $this->lister();
        }
    }

    public function stats(){


        $this->render('admin.employer.stats');

    }
}
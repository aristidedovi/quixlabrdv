<?php
namespace App\Controller\Admin;

class MedecinController extends AppController {


    public function __construct(){
        parent::__construct();
        $this->loadModel('RendezVous');
        $this->loadModel('Patient');
    }

    public function index(){
       // $rendezvous = $this->RendezVous->allRendezVous();
        //$jour = $this->RendezVous->rdvDuJour();

        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);

        $rendezvous = $this->RendezVous->allRendezVousByDomaine($_SESSION["id_domaine"]);

//var_dump($e);
        $jour = $this->RendezVous->rdvDuJourByDomaine($_SESSION["id_domaine"]);
        //var_dump($e,$_SESSION['telephone']);

        //var_dump($e,$_SESSION["telephone"],$jour);

        if($_SESSION["id_type"] == 3 || $_SESSION["id_type"] == 1){
            $this->render('admin.medecin.index', compact('rendezvous','jour','e'));
        }else{
            echo "pas access";
        }
    }


    public function calendrier(){
        //$rendezvous = $this->RendezVous->allRendezVous();

        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);

    //var_dump($_SESSION["id_domaine"]);
        //die();
        $rendezvous = $this->RendezVous->allRendezVousByDomaine($_SESSION["id_domaine"]);

        //var_dump($rendezvous);
        // var_dump($employers);
        if($_SESSION["id_type"] == 3 || $_SESSION["id_type"] == 1){
            $this->render('admin.medecin.calendrier', compact('rendezvous','e'));
        }else{
            echo "pas access";
        }
    }


    public function lister(){
        $rendezvous = $this->RendezVous->rdvDuJourTotal();
        // var_dump($employers);
        if($_SESSION["id_type"] == 3 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.lister', compact('rendezvous'));
        }else{
            echo "pas access";
        }
    }

    public function listerTotal(){

        if($_POST){
            var_dump($_POST);
           // die();

            $rd = $this->RendezVous->update($_GET['id'],[
                'priseEnCharge' => $_POST["priseEnCharge"],
                'id_medecin' => $_POST['id_medecin'],
                'id_etat_rendez_vous' => 4
            ]);

            if($rd){
                //return $this->lister();
                header('Location: index.php?p=admin.medecin.lister');

            }
        }


        $rendezvous = $this->RendezVous->allRendezVous();

        $form = new \Core\HTML\BootstrapForm($_POST);
        // var_dump($employers);
        if($_SESSION["id_type"] == 3 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.lister', compact('rendezvous','form'));
        }else{
            echo "pas access";
        }
    }

    public function effectuer(){
        $rendezvous = $this->RendezVous->allRendezVousDo();

        //$form = new \Core\HTML\BootstrapForm($_POST);
        // var_dump($employers);
        if($_SESSION["id_type"] == 3 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.listerDo', compact('rendezvous'));
        }else{
            echo "pas access";
        }
    }
}
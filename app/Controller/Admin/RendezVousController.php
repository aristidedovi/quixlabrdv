<?php


namespace App\Controller\Admin;


use Core\HTML\BootstrapForm;

class RendezVousController extends AppController {


    public function __construct(){
        parent::__construct();
        $this->loadModel('RendezVous');
        $this->loadModel('Patient');
    }

    public function index(){
        $rendezvous = $this->RendezVous->allRendezVous();
        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);

        $jour = $this->RendezVous->rdvDuJour($e->id_service);
       // var_dump($e);

       // var_dump($jour,$_SESSION["id_service"],$e->id_service);
        //die();
        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.index', compact('rendezvous','jour','e'));
        }else{
            echo "pas access";
        }
    }

    public function add(){
        $errors = 0;
        if(!empty($_POST)){
           //var_dump($_POST);
            //die();
            if(preg_match("#^[7][7806][0-9]{7}$#",$_POST['telephone']) === 1 &&
                $_POST['nomComplet'] != '' && ctype_alpha(str_replace(' ','', $_POST['nomComplet'])) === true
                && $_POST["motif"] != ''){

                $dt = $_POST['heureRendezVous'];
                //$dt = $dt.'00';
                $dt = str_replace('/','-',$dt);
                $newDateTime = date("Y-m-d H:i:s", strtotime($dt));
                $newDate = date("Y-m-d", strtotime($dt));
                // var_dump($newDateTime);
                //var_dump($newDate); findRendezVousByDate

               $r = $this->RendezVous->findRendezVousByDate($newDateTime,$_POST['id_domaine']);

               //var_dump($r);
               //die();

                if($r){
                    $errors = 2;
                    //var_dump($r->heureRendezVous);
                   // die();
                    //var_dump($r,$r["heureRendezVous"], $newDateTime);
                    //die();
                }else{
                    //var_dump($r,$r["heureRendezVous"], $newDateTime);
                    //die("tout es ok");
                    $patient = $this->Patient->create([
                        'nomComplet' => $_POST['nomComplet'],
                        'adresse' => $_POST['adresse'],
                        'telephone' => $_POST['telephone'],
                        'motif' => $_POST['motif']
                    ]);

                    $id_patient = $this->Patient->lastPatient();
                    $id_patient = intval($id_patient->id);

                    $rdv = $this->RendezVous->create([
                        'dateRendezVous' => $newDate,
                        'heureRendezVous' => $newDateTime,
                        'id_patient' => $id_patient,
                        'id_domaine' => $_POST['id_domaine'],
                        'id_etat_rendez_vous' => $_POST['id_etat_rendez_vous']
                    ]);

                    if($rdv & $patient){
                        header('Location: index.php?p=admin.rendezVous.listerTotal');
                        //return $this->listerTotal();
                    }
                }

            }else{
                $errors = 1;
            }
        }
        $this->loadModel('EtatRendezVous');
        $this->loadModel('Domaine');
        $etat = $this->EtatRendezVous->extract('id','libelle');
        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);
        $domaine = $this->Domaine->extractByTag('id','libelle',$e->service);
       // var_dump($domaine,$_SESSION);
        //die();
        //$rendezvous = $this->RendezVous->allRendezVous();

        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);

//        var_dump('employee',$e);
        //die();
        $rendezvous = $this->RendezVous->allRendezVousByservice($e->id_service);


        $form = new \Core\HTML\BootstrapForm($_POST);

        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.add', compact('etat','domaine','form','rendezvous','errors','e'));
        }else{
            echo "pas access";
        }
    }


    public function edit(){
        $errors = 0;
        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1 || $_SESSION["id_type"] == 3 ){
                if(!empty($_POST)){
                    if(preg_match("#^[7][7806][0-9]{7}$#",$_POST['telephone']) === 1 &&
                        $_POST['nomComplet'] != '' && ctype_alpha(str_replace(' ','', $_POST['nomComplet'])) === true
                        && $_POST["motif"] != ''){
                        $dt = $_POST['heureRendezVous'];
                        //$dt = $dt.'00';
                        $dt = str_replace('/','-',$dt);
                        $newDateTime = date("Y-m-d H:i:s", strtotime($dt));
                        $newDate = date("Y-m-d", strtotime($dt));
                        // var_dump($newDateTime);
                        //var_dump($newDate);
                        $r = $this->RendezVous->findRendezVousByDateAndId($newDateTime,$_POST['id_domaine'],$_GET['id']);

                        if($r){
                            $errors = 2;
                        }else{

                            //die();
                            $rd = $this->RendezVous->update($_GET['id'],[
                                'dateRendezVous' => $newDate,
                                'heureRendezVous' => $newDateTime,
                                'id_domaine' => $_POST['id_domaine'],
                                'id_etat_rendez_vous' => $_POST['id_etat_rendez_vous']
                            ]);

                            $id_patient = $this->RendezVous->findPatient($_GET['id']);
                            $id_patient = intval($id_patient->id);

                            $patient = $this->Patient->update($id_patient,[
                                'nomComplet' => $_POST['nomComplet'],
                                'adresse' => $_POST['adresse'],
                                'telephone' => $_POST['telephone'],
                                'motif' => $_POST['motif']
                            ]);


                            if($rd & $patient){
                                //return $this->lister();
                                header('Location: index.php?p=admin.rendezVous.listerTotal');

                            }


                        }
                    }else{
                        $errors = 1;
                    }

                }

                $rdv = $this->RendezVous->findRendezVous($_GET['id']);

                $this->loadModel('EtatRendezVous');
                $this->loadModel('Domaine');

                $etat = $this->EtatRendezVous->extract('id','libelle');
                $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);
                $domaine = $this->Domaine->extractByTag('id','libelle',$e->service);

                $form = new \Core\HTML\BootstrapForm($rdv);

            $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);

//        var_dump('employee',$e);
            //die();
            $rendezvous = $this->RendezVous->allRendezVousByservice($e->id_service);

                $this->render('admin.rendezVous.add', compact('etat','domaine','form','rendezvous','errors','e'));
        }else{
            echo "pas access";
        }
    }

    public function calendrier(){

        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);

    // var_dump('employee',$e->service);
        //die();
        if ($_SESSION['id_type'] === "1"){
            $rendezvous = $this->RendezVous->allRendezVous();
        }else{
            $rendezvous = $this->RendezVous->allRendezVousByservice($e->id_service);
        }

        //var_dump("RDV",$rendezvous);
       // var_dump('employee',$e);
       // die();
        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.calendrier', compact('rendezvous','e'));
        }else{
            echo "pas access";
        }
    }

    public function listerTotal(){
        $rendezvous = $this->RendezVous->allRendezVous();
        //var_dump($rendezvous);
        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);
        //var_dump($e);
       // die();
        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.lister', compact('rendezvous','e'));
        }else{
            echo "pas access";
        }
    }

    public function lister(){
        $rendezvous = $this->RendezVous->rdvDuJourTotal();

        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);
        //var_dump($e);
        //die();
        // var_dump($employers);
        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.lister', compact('rendezvous', 'e'));
        }else{
            echo "pas access";
        }
    }

    public function delete(){
        if ($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1) {
            if (!empty($_POST)) {
                $result = $this->RendezVous->delete($_POST['id']);
                //header('location: admin.php');
                return $this->lister();
            }
        } else {
            echo "pas access";
        }
    }
    public function detail(){
        if($_POST){
            var_dump($_POST);
            //die();

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

        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);
        $i = $rendezvous = $this->RendezVous->findRendezVous($_GET['id']);

        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){
            if(!empty($_GET['id'])){
                $rendezvous = $this->RendezVous->findRendezVousForDetail($_GET['id']);
                if(!$rendezvous){
                    $rendezvous = $this->RendezVous->findRendezVous($_GET['id']);
                }
            }
                $this->render('admin.rendezVous.detail', compact('rendezvous','e'));

        }elseif ($_SESSION["id_type"] == 3){
                $rendezvous = $this->RendezVous->findRendezVous($_GET['id']);
                if($i->id_etat_rendez_vous == 4){
                    $rendezvous = $this->RendezVous->findRendezVousForDetail($_GET['id']);
                    $this->render('admin.rendezVous.detail', compact('rendezvous','e'));
                }else{
                    $form = new BootstrapForm($_POST);
                    $this->render('admin.rendezVous.detail', compact('rendezvous','form','e'));
                }
               // var_dump($i);

        }
    }

    public function effectuer(){
        $rendezvous = $this->RendezVous->allRendezVousDo();

        $e = $this->RendezVous->findServiceEmployerByNumero($_SESSION["telephone"]);


        //$form = new \Core\HTML\BootstrapForm($_POST);
        // var_dump($employers);
        if($_SESSION["id_type"] == 2 || $_SESSION["id_type"] == 1){
            $this->render('admin.rendezVous.listerDo', compact('rendezvous','e'));
        }else{
            echo "pas access";
        }
    }
}
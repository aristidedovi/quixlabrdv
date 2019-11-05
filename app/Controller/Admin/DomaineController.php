<?php


namespace App\Controller\Admin;


class DomaineController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Domaine');

    }

    public function index(){
        $items = $this->Domaine->allDomaine();
        $this->render('admin.domaine.lister', compact('items'));
    }



    public function add(){
        if(!empty($_POST)){
            $result = $this->Domaine->create([
                'libelle' => $_POST['libelle'],
                'id_service' => $_POST['id_service']
            ]);

            if($result){
                //header('Location: admin.php?p=admin.posts.edit&id='.App::getInstance()->getDb()->lastInsertId());
                header('Location: index.php?p=admin.domaine.index');

            }
        }
        $this->loadModel('Service');
        $services = $this->Service->extract('id','libelle');

        $form = new \Core\HTML\BootstrapForm($_POST);
        $this->render('admin.domaine.add', compact('services','form'));

    }

    public function edit(){
        if(!empty($_POST)){
            $result = $this->Domaine->update($_GET['id'],[
                'libelle' => $_POST['libelle'],
                'id_service' => $_POST['id_service']
            ]);

            if($result){
                return $this->index();
            }
        }
        $post = $this->Domaine->find($_GET['id']);
        $this->loadModel('Service');
        $services = $this->Service->extract('id','libelle');
        $form = new \Core\HTML\BootstrapForm($post);
        $this->render('admin.domaine.add', compact('services','form'));

    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Domaine->delete($_POST['id']);
            //header('location: admin.php');
            if($result){
                return $this->index();
            }else{
                die("Suppression impossible");
            }
        }
    }

}
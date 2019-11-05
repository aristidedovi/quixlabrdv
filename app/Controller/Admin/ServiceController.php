<?php


namespace App\Controller\Admin;


class ServiceController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Service');
    }

    public function index(){
       // $items = $this->Service->all();
        $items = $this->Service->countDomaineInService();
        $this->render('admin.service.lister', compact('items'));
    }



    public function add(){
        if(!empty($_POST)){
            $result = $this->Service->create([
                'libelle' => $_POST['libelle'],
            ]);
            //header('Location: admin.php?p=admin.categories.edit&id='.App::getInstance()->getDb()->lastInsertId());
            if($result){
                header('Location: index.php?p=admin.service.index');
            }
        }
        $form = new \Core\HTML\BootstrapForm($_POST);
        $this->render('admin.service.add', compact('form'));

    }

    public function edit(){
        if(!empty($_POST)){
            $result = $this->Service->update($_GET['id'],[
                'libelle' => $_POST['libelle'],
            ]);
            return $this->index();
        }
        $service = $this->Service->find($_GET['id']);
        $form = new \Core\HTML\BootstrapForm($service);
        $this->render('admin.service.add', compact('form'));

    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Service->delete($_POST['id']);
            //header('location: admin.php');
            if($result){
                return $this->index();
            }else{
                die("Suppression impossible");
            }
        }
    }

}
<?php


namespace App\Controller\Admin;


class TypeEmployerController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('TypeEmployer');
    }

    public function index(){
        // $items = $this->Service->all();
        $items = $this->TypeEmployer->countEmployerInType();
        $this->render('admin.typeEmployer.lister', compact('items'));
    }


    public function add(){
        if(!empty($_POST)){
            $result = $this->TypeEmployer->create([
                'libelle' => $_POST['libelle'],
            ]);
            //header('Location: admin.php?p=admin.categories.edit&id='.App::getInstance()->getDb()->lastInsertId());
            if($result){
                header('Location: index.php?p=admin.typeEmployer.index');
            }
        }
        $form = new \Core\HTML\BootstrapForm($_POST);
        $this->render('admin.typeEmployer.add', compact('form'));

    }

    public function edit(){
        if(!empty($_POST)){
            $result = $this->TypeEmployer->update($_GET['id'],[
                'libelle' => $_POST['libelle'],
            ]);
            return $this->index();
        }
        $service = $this->TypeEmployer->find($_GET['id']);
        $form = new \Core\HTML\BootstrapForm($service);
        $this->render('admin.typeEmployer.add', compact('form'));

    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->TypeEmployer->delete($_POST['id']);
            //header('location: admin.php');
            if($result){
                return $this->index();
            }else{
                die("Suppression impossible");
            }
        }
    }

}
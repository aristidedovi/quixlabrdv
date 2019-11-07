<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use \App;
use Core\Database\MysqlDatabase;


//require_once '../app/src/Clockwork.php';
//require_once '../app/src/ClockworkException.php';


class UsersController extends AppController {

    public function login(){
        $API_KEY = "166511b2d18d5f5713e9e9ca9931d9ac4f1ceeff";
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());

                if($auth->login($_POST['username'], $_POST['password'])){
                    
                    //var_dump($_SESSION);

                    // Process your response here
                    //echo $response;

                 //   $clockwork = new Clockwork( $API_KEY ); //Be careful not to post your API Keys to public repositories.
                 /*   $messages = array(
                        array( 'to' => '778580286', 'message' => 'This is a test!' ),
                    );
                    $results = $clockwork->send( $messages );

                    var_dump($results);
                    die();*/

                    if($_SESSION["first_login"] == 0){
                        //$form = new \Core\HTML\BootstrapForm();
                        header('Location: index.php?p=admin.employer.edit');
                    }else{
                        if($_SESSION["id_type"] === "1"){
                            header('Location: index.php?p=admin.employer.index');
                            // $this->render("admin.employer.index");
                        }elseif ($_SESSION["id_type"] === "2"){
                            header('Location: index.php?p=admin.rendezVous.index');
                            // $this->render("admin.rendezVous.index");
                        }elseif ($_SESSION["id_type"] === "3"){
                            header('Location: index.php?p=admin.medecin.index');
                            // $this->render("admin.medecin.index");
                        }
                    }
        }else{
                    $errors = true;
                }
        }
        $form = new \Core\HTML\BootstrapForm($_POST);
        $this->render('templates.login',compact('form','errors'));
        }

        public function logout(){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->loggeOut()){
                $form = new \Core\HTML\BootstrapForm();
                $this->render('templates.login',compact('form'));
            }
        }

        public function db(){
            require($this->viewPath.'templates/db.php');
        }

        public function firstLogin(){
            var_dump("dzfdz");
            die();
        }

}
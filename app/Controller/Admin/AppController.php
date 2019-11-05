<?php

namespace App\Controller\Admin;

use \App;
use Core\Auth\DBAuth;

class AppController extends \App\Controller\AppController {

   public function __construct(){
        parent::__construct();
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->logged()){
            //$this->forbidden();
            header('Location: index.php');
            //require ROOT.'/pages/users/login.php';
        }
    }


}
<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth{

    private $db;


    /**
     * DBAuth constructor.
     * @param Database $db
     */
    public function __construct(Database $db){
            $this->db = $db;
    }

    /**
     * @return bool|mixed
     */
    public function getUserId(){
        if($this->logged()){
            return $_SESSION['telephone'];
        }
        return false;
    }


    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function login($username, $password){
        $user = $this->db->prepare("
        SELECT employer.id, 
        nomComplet,email,
        telephone,password,
        typeEmployer.libelle as typeEmployer, domaine.libelle as domaine,
        typeEmployer.id as id_type,
        domaine.id as id_domaine,
        service.id as id_service,
        first_login
        FROM employer,typeEmployer,domaine,service
        WHERE employer.id_type_employer = typeEmployer.id AND domaine.id = employer.id_domaine 
        AND service.id = domaine.id_service AND 
        telephone = ?", [$username], null, true);
//var_dump($user);
//die();
        if($user){
             if($user->password === $password/*sha1($password)*/){
               $_SESSION['telephone'] = $user->telephone;
               $_SESSION['nomComplet'] = $user->nomComplet;
               $_SESSION['domaine'] = $user->domaine;
               $_SESSION['id_domaine'] = $user->id_domaine;
               $_SESSION['id_service'] = $user->id_service;
               $_SESSION['id_type'] = $user->id_type;
               $_SESSION['type'] = $user->typeEmployer;
               $_SESSION['id'] = $user->id;
               $_SESSION['first_login'] = $user->first_login;
                 //var_dump($_SESSION);
                 //die();
                 return true;
             }
        }
        return false;
    }


    /**
     * @return bool
     */
    public function logged(){
        return isset($_SESSION['telephone']);
    }

    /**
     * @return bool
     */
    public function loggeOut(){
        session_destroy();
        session_reset();
        return true;
    }
}
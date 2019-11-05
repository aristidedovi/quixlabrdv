<?php
namespace Core\Database;

use Core\Config;
use \PDO;

class MysqlDatabase extends Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;


    /**
     * MysqlDatabase constructor.
     */
    public function __construct(){
        $var = new Config('../config/config.php');
        $this->db_user = $var->get("db_user");
        $this->db_pass = $var->get("db_pass");
        $this->db_name = $var->get("db_name");
        $this->db_host = $var->get("db_host");
    }

    /**
     * @return PDO
     */
    public function getPDO(){

        if($this->pdo == null){

            try{
                $pdo = new PDO('mysql:dbname='.$this->db_name.';host='.$this->db_host.';charset=UTF8', $this->db_user,$this->db_pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8',65536));
                $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch (\PDOException $exception){

                return $exception->getCode();
               // $codeErrors = $exception->getCode();
             /*   if($exception->getCode() === 1049){
                    var_dump('Erreur de la base de donnée',$exception->getMessage(), $exception->getCode());
                }elseif ($exception->getCode() === 2002){
                    var_dump('Adresse introuvale',$exception->getMessage(), $exception->getCode());
                }elseif ($exception->getCode() === 1045){
                    var_dump('Erreur sur les identifiant de connexion',$exception->getMessage(), $exception->getCode());
                }*/
            }

            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    /**
     * @param $statement
     * @param null $class_name
     * @param bool $one
     * @return array|false|mixed|\PDOStatement
     */
    public function query($statement, $class_name = null, $one = false){
        $req =  $this->getPDO()->query($statement);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $req;
        }
        if($class_name != null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }


    /**
     * @param $statement
     * @param $value
     * @param null $class_name
     * @param bool $one
     * @return array|bool|mixed
     */
    public function prepare($statement, $value, $class_name = null,$one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($value);
        if(
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ){
            return $res;
        }

        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        }
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    /**
     * @return string
     */
    public function lastInsertId(){
        return $this->getPDO()->lastInsertId();
    }
}
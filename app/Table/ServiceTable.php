<?php


namespace App\Table;
use Core\Table\Table;

class ServiceTable extends Table{


    protected $table = 'service';

    public function countService(){
        return $this->query("
                            SELECT COUNT(*) as nombre
                            FROM service",[],true);
    }


    public function countDomaineInService(){
        return $this->query("
                            SELECT service.id,service.libelle as libelle,
                            COUNT(domaine.id_service) as nb
                            FROM service  
                            LEFT JOIN domaine ON service.id = domaine.id_service
                            GROUP BY service.id");
    }

}
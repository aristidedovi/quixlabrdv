<?php


namespace App\Table;
use Core\Table\Table;

class DomaineTable extends Table{


    protected $table = 'domaine';

    public function countDomaine(){
        return $this->query("
                            SELECT COUNT(*) as nombreDomaine
                            FROM domaine",[],true);
    }

    public function allDomaine(){
        return $this->query("
                            SELECT  domaine.id as id,
                            domaine.libelle as libelle,
                            service.libelle as service
                            FROM domaine, service
                            WHERE domaine.id_service = service.id");
    }


}
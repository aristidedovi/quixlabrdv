<?php


namespace App\Table;
use Core\Table\Table;

class TypeEmployerTable extends Table{


    protected $table = 'typeEmployer';


    public function countEmployerInType(){
        return $this->query("
                            SELECT typeEmployer.id,typeEmployer.libelle as libelle,
                            COUNT(employer.id) as nb
                            FROM typeEmployer
                            LEFT JOIN employer ON typeEmployer.id = employer.id_type_employer
                            GROUP BY typeEmployer.id");
    }


}
<?php


namespace App\Table;
use Core\Table\Table;

class EmployerTable extends Table{


    protected $table = 'employer';

    public function allEmployer(){
        return $this->query("
                            SELECT employer.id, nomComplet,email,
                            telephone,typeEmployer.libelle as typeEmployer, 
                            domaine.libelle as domaine,
                            employer.id_type_employer as id_type
                            FROM employer, typeEmployer,domaine
                            WHERE employer.id_type_employer = typeEmployer.id && employer.id_domaine = domaine.id
                            ");
    }

    public function findEmployer($id){
        return $this->query("
                            SELECT employer.id, nomComplet,email,adresse,password,
                            telephone,typeEmployer.libelle as typeEmployer, 
                            domaine.libelle as domaine,
                            employer.id_type_employer as id_type
                            FROM employer, typeEmployer,domaine
                            WHERE employer.id_type_employer = typeEmployer.id && employer.id_domaine = domaine.id
                             && employer.id = ?
                            ",[$id],true);
    }

    public function findServiceByDomaine($id){
        return $this->query("
                            SELECT * FROM domaine, service 
                            WHERE service.id = domaine.id_service AND domaine.id = ? 
                            ",[$id],true);
    }

    public function findEmmployerByNumero($id){
        return $this->query("
                            SELECT employer.id, nomComplet,email,adresse,password,telephone
                            FROM employer
                            WHERE employer.telephone = ?
                            ",[$id],true);
    }
}
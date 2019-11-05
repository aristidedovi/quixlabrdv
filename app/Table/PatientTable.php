<?php


namespace App\Table;


class PatientTable extends \Core\Table\Table {

    protected $table = 'patient';


    public function lastPatient(){
        return $this->query("SELECT MAX(id) as id
                                    FROM patient",[],true);
    }

    public function findPatient($id){
        return $this->query(
            "SELECT patient.id as id, patient.nomComplet as nomComplet 
            FROM rendezVous, patient 
            WHERE patient.id = rendezVous.id_patient AND rendezVous.id = ?",[$id],true
        );
    }

}
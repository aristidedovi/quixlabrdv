<?php


namespace App\Table;


class RendezVousTable extends \Core\Table\Table {

    protected $table = 'rendezVous';


    public function allRendezVous(){
        return $this->query("
                            SELECT rendezVous.id,
                                    dateRendezVous as dateR,
                                    heureRendezVous as heureR,
                                    motif,
                                    patient.nomComplet as nomComplet,
                                    patient.telephone as telephone,
                                    domaine.libelle as domaine,
                                    domaine.id as id_domaine,
                                    etatRendezVous.libelle as etat,
                                    rendezVous.id_etat_rendez_vous as id_etat_rendez_vous,
                                    service.libelle as service
                            FROM rendezVous, patient,etatRendezVous,domaine,service
                            WHERE rendezVous.id_patient = patient.id 
                            AND rendezVous.id_domaine = domaine.id AND 
                            rendezVous.id_etat_rendez_vous = etatRendezVous.id AND id_etat_rendez_vous != 4 AND service.id = domaine.id_service
                            ORDER BY rendezVous.heureRendezVous DESC
                            ");
    }

    public function allRendezVousDo(){
        return $this->query("
                            SELECT rendezVous.id,
                                    dateRendezVous as dateR,
                                    heureRendezVous as heureR,
                                    motif,
                                    patient.nomComplet as nomComplet,
                                    patient.telephone as telephone,
                                    domaine.libelle as domaine,
                                    domaine.id as id_domaine,
                                    etatRendezVous.libelle as etat,
                                    rendezVous.id_etat_rendez_vous as id_etat_rendez_vous,
                                    service.libelle as service
                            FROM rendezVous, patient,etatRendezVous,domaine,service
                            WHERE rendezVous.id_patient = patient.id 
                            AND rendezVous.id_domaine = domaine.id AND 
                            rendezVous.id_etat_rendez_vous = etatRendezVous.id AND service.id = domaine.id_service
                            AND id_etat_rendez_vous = 4
                            ORDER BY rendezVous.heureRendezVous DESC
                            ");
    }

    public function findRendezVous($id){
        return $this->query("
                            SELECT rendezVous.id,
                                    dateRendezVous,
                                    heureRendezVous,
                                    rendezVous.id_domaine as id_domaine,
                                    rendezVous.id_etat_rendez_vous as id_etat_rendez_vous,
                                    patient.nomComplet as nomComplet,
                                    patient.adresse as adresse,
                                    patient.telephone as telephone,
                                    patient.motif as motif,
                                    priseEnCharge, id_medecin
                            FROM rendezVous, patient,etatRendezVous,domaine
                            WHERE rendezVous.id_patient = patient.id 
                            AND rendezVous.id_domaine = domaine.id AND 
                            rendezVous.id_etat_rendez_vous = etatRendezVous.id AND rendezVous.id = ? 
                            ORDER BY rendezVous.heureRendezVous DESC
                            ",[$id],true);
    }

    public function findRendezVousForDetail($id){
        return $this->query("
                            SELECT rendezVous.id,
                                  dateRendezVous,
                                  heureRendezVous,
                                  rendezVous.id_domaine as id_domaine,
                                  domaine.libelle,
                                  rendezVous.id_etat_rendez_vous as id_etat_rendez_vous,
                                  patient.nomComplet as nomComplet,
                                  patient.adresse as adresse,
                                  patient.telephone as telephone,
                                  patient.motif as motif,
                                  priseEnCharge, id_medecin,employer.nomComplet as medecinNomComplet,
                                  service.libelle
                            FROM rendezVous, patient,etatRendezVous,domaine,employer,service
                            WHERE rendezVous.id_patient = patient.id 
                            AND rendezVous.id_domaine = domaine.id AND service.id = domaine.id_service AND
                            rendezVous.id_etat_rendez_vous = etatRendezVous.id AND 
                            rendezVous.id_medecin = employer.id AND rendezVous.id = ? 
                            ORDER BY rendezVous.heureRendezVous DESC",[$id],true);
    }

    public function findPatient($id){
        return $this->query(
            "SELECT patient.id as id, patient.nomComplet as nomComplet 
            FROM rendezVous, patient 
            WHERE patient.id = rendezVous.id_patient AND rendezVous.id = ? ORDER BY rendezVous.heureRendezVous DESC",[$id],true
        );
    }

    public function rdvDuJour($id){
        return $this->query(
            "SELECT COUNT(*) as duJour
                        FROM rendezVous, domaine, service
                        WHERE domaine.id = rendezVous.id_domaine AND id_etat_rendez_vous != 4 AND
                        service.id = domaine.id_service AND service.id = ? AND
                        rendezVous.dateRendezVous = DATE(NOW())",[$id],true);
    }

    public function rdvDuJourByDomaine($id){
        return $this->query(
            "SELECT COUNT(*) as duJour
                        FROM rendezVous, domaine, service
                        WHERE domaine.id = rendezVous.id_domaine AND 
                        service.id = domaine.id_service AND domaine.id = ? AND id_etat_rendez_vous != 4 AND
                        rendezVous.dateRendezVous = DATE(NOW())",[$id],true);
    }

    public function rdvDuJourtotal(){
        return $this->query(
            "SELECT rendezVous.id,
                                    rendezVous.dateRendezVous,
                                    heureRendezVous as heureR,
                                    dateRendezVous as dateR,
                                    motif,
                                    patient.nomComplet as nomComplet,
                                    patient.telephone as telephone,
                                    domaine.libelle as domaine,
                                    domaine.id as id_domaine,
                                    etatRendezVous.libelle as etat,
                                    service.libelle as service,
                                    rendezVous.id_etat_rendez_vous as id_etat_rendez_vous
            FROM rendezVous, patient,etatRendezVous,domaine, service
            WHERE rendezVous.id_domaine = domaine.id AND 
                    rendezVous.id_etat_rendez_vous = etatRendezVous.id  AND 
                    rendezVous.id_patient = patient.id AND service.id = domaine.id_service AND
                    rendezVous.dateRendezVous = DATE(NOW()) ORDER BY heureR DESC");
    }


    public function findRendezVousByDate($date,$id_domaine){
        return $this->query("
                            SELECT *
                            FROM rendezVous,domaine
                            WHERE rendezVous.id_domaine = domaine.id AND 
                            rendezVous.heureRendezVous = ? AND domaine.id = ?
                            ",[$date,$id_domaine],true);
    }

    public function findServiceEmployerByNumero($id){
        return $this->query("
                            SELECT employer.id, nomComplet,email,adresse,password,telephone, 
                            service.libelle as service,service.id as id_service,
                            domaine.libelle as domaine,domaine.id_service
                            FROM employer, service,domaine
                            WHERE employer.id_service = service.id AND 
                            domaine.id_service = service.id
                            AND employer.telephone = ?",[$id],true);
    }

    /**WHERE employer.id_service = service.id
    AND domaine.id_service = service.id
     * @param $id
     * @return mixed SELECT employer.id, nomComplet,email,adresse,password,telephone,
    service.libelle as service,service.id as id_service,
    domaine.libelle as domaine
    FROM employer, service, domaine
    WHERE employer.id_service = service.id
    AND domaine.id = employer.id_domaine
    AND employer.telephone =
     */

    public function allRendezVousByservice($id){
        return $this->query("
                            SELECT rendezVous.id,
                                   dateRendezVous as dateR,
                                   heureRendezVous as heureR,
                                   motif,
                                   patient.nomComplet as nomComplet,
                                   patient.telephone as telephone,
                                   domaine.libelle as domaine,
                                  domaine.id as id_domaine,
                                  etatRendezVous.libelle as etat,
                                  rendezVous.id_etat_rendez_vous as id_etat_rendez_vous,
                                  service.libelle as service,
                                  service.id as id_service
                            FROM rendezVous, patient,etatRendezVous,domaine,service
                            WHERE rendezVous.id_patient = patient.id 
                            AND rendezVous.id_domaine = domaine.id AND 
                                 rendezVous.id_etat_rendez_vous = etatRendezVous.id AND 
                                service.id = domaine.id_service AND id_etat_rendez_vous != 4 AND  id_service = ? ORDER BY heureR DESC",[$id],false);
    }


    public function findRendezVousByDateAndId($date,$id_domaine,$id_rdv){
        return $this->query("
                            SELECT *
                            FROM rendezVous,domaine
                            WHERE rendezVous.id_domaine = domaine.id AND 
                            rendezVous.heureRendezVous = ? AND domaine.id = ? AND rendezVous.id != ? 
                            ORDER BY rendezVous.heureRendezVous DESC
                            ",[$date,$id_domaine,$id_rdv],true);
    }

/*  'dateRendezVous' => $_POST['dateRendezVous'],
                'heureRendezVous' => $_POST['heureRendezVous'],
                'id_domaine' => $_POST['id_domaine'],
                'id_etat_rendez_vous' => $_POST['id_etat_rendez_vous']

 'nomComplet' => $_POST['nomComplet'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'motif' => $_POST['motif']*/

    public function allRendezVousByDomaine($id){
        return $this->query("
                            SELECT rendezVous.id,
                                   dateRendezVous as dateR,
                                   heureRendezVous as heureR,
                                   motif,
                                   patient.nomComplet as nomComplet,
                                   patient.telephone as telephone,
                                   domaine.libelle as domaine,
                                  domaine.id as id_domaine,
                                  etatRendezVous.libelle as etat,
                                  rendezVous.id_etat_rendez_vous as id_etat_rendez_vous,
                                  service.libelle as service,
                                  service.id as id_service
                            FROM rendezVous, patient,etatRendezVous,domaine,service
                            WHERE rendezVous.id_patient = patient.id 
                            AND rendezVous.id_domaine = domaine.id AND 
                                 rendezVous.id_etat_rendez_vous = etatRendezVous.id AND 
                                service.id = domaine.id_service AND id_etat_rendez_vous != 4 AND id_domaine = ? ",[$id],false);
    }
}
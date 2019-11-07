<?php
//var_dump($rendezvous);
//var_dump(sha1('thiam	'));
// $rdv = [];
//foreach ($rendezvous as $rd){
//     $rdv = $rd;
//  }
// var_dump($rdv);
$array = json_encode($rendezvous);
//var_dump($_SESSION);
//echo $array;
?>
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Sécretaire</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Rendez-vous</a></li>
        </ol>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        <h4 class="card-title">Formulaire de demande de rendez-vous</h4>
                        <?php
                        if($errors == 1){
                        ?>
                            <span class="alert alert-danger"><em>il y a des erreurs de données au niveau du formulaire</em></span>
                        <?php
                        }elseif ($errors == 2){
                        ?>
                            <span class="alert alert-danger"><em>La date <strong><?= $_POST["heureRendezVous"]; ?></strong> pour le
                                    <strong><?= $_POST["id_domaine"]; ?></strong> existe déjà.</em></span>
                        <?php
                        } ?>
                       <!-- <h6 class="card-subtitle">Use <code>.bootstrapMaterialDatePicker</code> to create it.</h6>-->
                        <div class="row form-material">
                            <div class="col-md-8">
                                <script type='text/javascript'>

                                    var rdvCalendrier = <?php echo json_encode($array);?>;
                                    var rdvC = JSON.parse(rdvCalendrier);

                                    console.log("calendrier",rdvCalendrier);
                                    console.log("calendrier parser",rdvC);
                                    var tabCalendrier = [];

                                    for(var i = 0; i < rdvC.length; i++){
                                        var objCalendrier = new Object();
                                        objCalendrier.title = rdvC[i].nomComplet;

                                        var datereel = new Date(rdvC[i].heureR);
                                        var datefin = new Date(datereel);
                                        datefin = new Date(datefin.setMinutes(datefin.getMinutes()+30)),

                                            objCalendrier.start = datereel ;
                                        objCalendrier.end = datefin ;

                                        if(rdvC[i].id_etat_rendez_vous == 1){
                                            objCalendrier.className = 'bg-succes';
                                        }else if(rdvC[i].id_etat_rendez_vous == 2){
                                            objCalendrier.className = 'bg-primary';
                                        }else if(rdvC[i].id_etat_rendez_vous == 3){
                                            objCalendrier.className = 'bg-danger';
                                        }

                                        tabCalendrier.push(objCalendrier);

                                    }
                                    console.log("nouveau Tableau", tabCalendrier);
                                    //console.log("heure", rdvC[i].heureR);
                                    // ...
                                </script>
                                <!--</div>-->
                                <div class="col-md-12">
                                    <div class="card-box m-b-50">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                                <?php
                                    if($_SESSION["id_type"] == 3){
                                ?>
                                    <?= $form->input('motif','',['type' => 'textarea'],true,true); ?>
                                <?php
                                    }else{
                                ?>
                                <?= $form->input('motif','Motif',['type' => 'textarea']); ?>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="col-md-4">

                            <?php 
                                if($_SESSION["id_type"] == 3){
                            ?>
                             <?= $form->select('id_domaine','Spécialité concerner', $domaine,true,true); ?>
                                <?= $form->input('heureRendezVous','Heure & Date du RDV',['type' => 'date'],true,false); ?>
                                <?php  // echo $form->input('dateRendezVous','Date du RDV'); ?>
                                <?= $form->input('nomComplet','Nom complet',[],true,true); ?>
                                <?= $form->input('adresse','Adresse',[],true,true); ?>
                                <?= $form->input('telephone','Telepehone',[],true,true); ?>
                                <?php
                                if($_GET['id'] != NULL){
                                ?>
                                    <?= $form->select('id_etat_rendez_vous','Etat RDV', $etat); ?>
                                <?php
                                }else{
                                ?>
                                    <?= $form->select('id_etat_rendez_vous','Etat RDV', $etat,false,true); ?>
                                <?php
                                }
                                ?>
                            <?php 
                            }else{
                            ?>
                                <?= $form->select('id_domaine','Spécialité concerner', $domaine,true); ?>
                                <?= $form->input('heureRendezVous','Heure & Date du RDV',['type' => 'date']); ?>
                                <?php  // echo $form->input('dateRendezVous','Date du RDV'); ?>
                                <?= $form->input('nomComplet','Nom complet'); ?>
                                <?= $form->input('adresse','Adresse'); ?>
                                <?= $form->input('telephone','Telepehone'); ?>
                                <?php
                                if($_GET['id'] != NULL){
                                ?>
                                    <?= $form->select('id_etat_rendez_vous','Etat RDV', $etat); ?>
                                <?php
                                }else{
                                ?>
                                    <?= $form->select('id_etat_rendez_vous','Etat RDV', $etat,false,true); ?>
                                <?php
                                }
                                ?>
                            <?php
                                }
                            ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-primary btn-block">Enregistre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--    $patient = $this->Patient->create([
                'nomComplet' => $_POST['nomComplet'],
                'adresse' => $_POST['adresse'],
                'telephone' => $_POST['telephone'],
                'motif' => $_POST['motif']
            ]);

            $rdv = $this->RendezVous->create([
                'dateRendezVous' => $_POST['dateRendezVous'],
                'heureRendezVous' => $_POST['heureRendezVous'],
                'id_patient' => $_POST['id_patient'],
                'id_domaine' => $_POST['id_domaine'],
                'id_etat_rendez_vous' => $_POST['id_etat_rendez_vous']
                -->
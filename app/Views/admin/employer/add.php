<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Administration</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Employer</a></li>
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
                        <h4 class="card-title">Formulaire d'employer</h4>
                        <?php
                        //var_dump($errors);
                        if($errors == 1){
                            ?>
                                <span class="alert alert-danger"><em>il y a des erreurs de données au niveau du formulaire</em></span>
                            <?php
                            }elseif ($errors == 2){
                            ?>
                            <span class="alert alert-danger"><em>Le numéro de <strong><?= $_POST["telephone"]; ?></strong> téléphone existe déjà.</em></span>
                            <?php
                            } ?>
                        <!-- <h6 class="card-subtitle">Use <code>.bootstrapMaterialDatePicker</code> to create it.</h6>-->
                        <form action="" method="post">
                            <div class="row form-material">
                                <div class="col-md-8">
                                        <?= $form->input('nomComplet','Nom complet'); ?>
                                        <em>EX: 778580286</em>
                                        <?= $form->input('telephone','Téléphone'); ?>
                                        <?= $form->input('email','Email',['type' => 'email']); ?>
                                    <?php
                                    //var_dump($first_login);
                                    if($first_login === "0"){
                                        ?>
                                        <em class="alert alert-danger">Veuillez modifier votre mot de passe svp</em>
                                    <?php
                                    }
                                    ?>
                                        <?= $form->input('password','Mot de passe',['type' => 'password']);?>
                                </div>
                                <div class="col-md-4">
                                    <?= $form->input('adresse','Adresse');?>
                                    <?php
                                     //   var_dump($_SESSION);
                                    if(isset($_GET["type"])){
                                        $type = $_GET["type"];
                                    }else{
                                        $type = $employer["id_type_employer"];
                                    }
                                    //var_dump($type);
                                    if($type === "1"){
                                    ?>

                                        <?= $form->select('id_type_employer','type employer', ["1" => "admin"]); ?>
                                        <?= $form->select('id_domaine','domaine', ["1" => "admin"],false,true); ?>
                                        <?= $form->select('id_service','service', ["1" => "admin"],false,true); ?>
                                    <?php
                                    }elseif ($type === "2"){
                                    ?>
                                        <?= $form->select('id_type_employer','type employer', ["2" => "sécretaire"],false,true); ?>
                                        <?php
                                             if($_SESSION["id_type"] === "2" ){
                                        ?>
                                                 <?= $form->select('id_service','service du secretaire', $services,true,true); ?>
                                        <?php
                                             }else{
                                        ?>
                                                 <?= $form->select('id_service','service du secretaire', $services,true); ?>
                                        <?php
                                           }
                                        ?>
                                                <?= $form->select('id_domaine','domaine', ["2" => "sécretariat"],false,true); ?>
                                        <?php
                                    }elseif ($type === "3"){
                                    ?>
                                        <?= $form->select('id_type_employer','type employer', ["3" => "médecin"],false,true); ?>

                                        <?php
                                        if($_SESSION["id_type"] === "3" ){
                                            ?>
                                            <?= $form->select('id_domaine', 'Domaine du médecin', $domaine,true,true); ?>
                                            <?php
                                        }else{
                                            ?>
                                            <?= $form->select('id_domaine', 'Domaine du médecin', $domaine,true); ?>
                                            <?php
                                        }
                                        ?>
                                        <?= $form->select('id_service','service', ["3" => "service"],false,true); ?>

                                    <?php
                                    }
                                    ?>
                                    <?php // $form->select('id_type_employer','Type employer', $type); ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-block">Enregistre</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  'nomComplet' => $_POST['nomComplet'],
                'telephone' => $_POST['telephone'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'adresse' => $_POST['adresse'],
                'id_type_employer' => $_POST['id_type_employer'],
                'id_domaine' => $_POST['id_domaine']-->
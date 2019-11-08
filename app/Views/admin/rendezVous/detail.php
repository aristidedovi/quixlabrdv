
<!--**********************************
    Content body start
***********************************-->
<?php
//var_dump($rendezvous);
?>

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Rendez-vous</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center mb-4">

                       <img class="mr-3" src="images/avatar/v.png" width="80" height="80" alt="">
                        <div class="media-body">
                            <h3 class="mb-1"><?= $rendezvous->nomComplet; ?> <em><?= $rendezvous->heureRendezVous; ?></em></h3>
                            <p class="text-muted mb-1">Telepone: <?= $rendezvous->telephone ?></p>
                            <p class="text-muted mb-1">Adresse :<?= $rendezvous->adresse ?></p>
                            <p class="text-muted mb-1">Motif :<?= $rendezvous->motif ?></p>
                        </div>
                    </div>

                    <?php
                    if($_SESSION['id_type'] == 2 || $_SESSION['id_type'] == 1){
                    ?>
                        <div class="row mb-0">
                            <div class="col-md-12">
                                <div class="card card-profile text-center">
                                    <?php 
                                        if($rendezvous->id_etat_rendez_vous == 4){
                                    ?>
                                        <!-- <span class="mb-1 text-primary"><i class="icon-people"></i></span>-->
                                        <h3 class="mb-0 alert alert-success">Prise en charge par <?= $rendezvous->medecinNomComplet ?></h3>
                                        <p class="text-muted px-4"><?=$rendezvous->priseEnCharge; ?></p>
                                    <?php
                                        }else{
                                    ?>
                                        <h3 class="mb-0 alert alert-danger">Prise en charge pas encore effectuer</h3>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>

                        </div>
                    <?php
                    }elseif ($_SESSION['id_type'] == 3 && $rendezvous->id_etat_rendez_vous != 4){
                    ?>
                        <form action="" method="post">
                            <input type="text" name="id_medecin" value="<?= $_SESSION['id'] ?>" hidden>
                            <div class="row mb-0">
                                <div class="col-md-12">
                                    <label for="">Prise en charge</label>
                                    <div class="card card-profile text-center">
                                        <?= $form->input('priseEnCharge','',['type' => 'textarea']); ?>
                                        <!-- <span class="mb-1 text-primary"><i class="icon-people"></i></span>
                                         <h3 class="mb-0">263</h3>
                                         <p class="text-muted px-4">Following</p>-->
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn btn-danger px-5">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    }

                    ?>


                    <!--<h4>About Me</h4>
                    <p class="text-muted">Hi, I'm Pikamy, has been the industry standard dummy text ever since the 1500s.</p>
                    <ul class="card-profile__info">
                        <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                        <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
<!--**********************************
    Content body end
***********************************-->
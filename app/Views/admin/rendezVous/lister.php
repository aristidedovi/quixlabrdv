<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Sécretariat</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Rendez-vous</a></li>
        </ol>
    </div>
</div>

<!--<p><a href="?p=admin.posts.add" class="btn btn-primary">Nouveau medecin</a></p>-->

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Les rendez-vous prises</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>Date & heure</th>
                        <th>Nom Complet</th>
                        <th>Téléphone</th>
                        <th width="10%">domaine</th>
                        <th>Etat</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rendezvous as $rd): ?>
                    <?php
                    //var_dump($rd);
                    if($_SESSION["domaine"] === $rd->domaine && $_SESSION['id_type'] != 1 && $rd->id_etat_rendez_vous != 4 ){
                    ?>
                        <tr>
                            <td><em><?= $rd->heureR ?></em></td>
                            <td><?= $rd->nomComplet ?></td>
                            <td><?= $rd->telephone ?></td>
                            <td><?= $rd->domaine ?></td>
                            <td>
                                <?php
                                if($rd->id_etat_rendez_vous == 1){
                                    ?>
                                    <span class="badge badge-pill badge-success"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->id_etat_rendez_vous == 2){
                                    ?>
                                    <span class="badge badge-pill badge-warning"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->id_etat_rendez_vous == 3){
                                    ?>
                                    <span class="badge badge-pill badge-danger"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->id_etat_rendez_vous == 4){
                                    ?>
                                    <span class="badge badge-pill badge-info"><?= $rd->etat?></span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a href="?p=admin.rendezVous.edit&id=<?= $rd->id ; ?>" class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                <!--  <a style="margin-right: -20px;" href="?p=admin.rendezVous.detail&id=<?php // $rd->id ; ?>" style="width: 5px; margin-right: -20px; background-color: transparent; border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                            <i class="fa fa-eye color-muted m-r-5"></i></a>-->


                                <a href="?p=admin.rendezVous.detail&id=<?= $rd->id ; ?>" class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-eye color-muted m-r-5"></i>
                                </a>

                                <form action="?p=admin.rendezVous.delete" method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?= $rd->id; ?>">
                                    <button type="button" class="btn btn-default" data-container="body"
                                            style="margin-left: -10px; margin-right: -20px; background-color: transparent; border: none;"
                                            data-toggle="popover" data-placement="right"
                                            data-content="Arrive bientôt.">
                                        <i class="fa fa-close color-danger"></i>
                                    </button>
                                    <!--  <button type="submit" style="width: 5px; margin-right: -20px; background-color: ;
                                    border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top"
                                    title="Supprimer"><i class="fa fa-close color-danger"></i></button>-->
                                </form>
                            </td>
                        </tr>
                    <?php
                    }elseif ($_SESSION["id_type"] == 2 && $rd->service === $e->service && $rd->id_etat_rendez_vous != 4 ){
                        ?>
                        <tr>
                            <td><?= $rd->heureR ?></td>
                            <td><?= $rd->nomComplet ?></td>
                            <td><?= $rd->telephone ?></td>
                            <td><?= $rd->domaine ?></td>
                            <td>
                                <?php
                                if($rd->id_etat_rendez_vous == 1){
                                ?>
                                <span class="badge badge-pill badge-success"><?= $rd->etat?></span>
                                <?php
                                }elseif ($rd->id_etat_rendez_vous == 2){
                                    ?>
                                <span class="badge badge-pill badge-warning"><?= $rd->etat?></span>
                                <?php
                                }elseif ($rd->id_etat_rendez_vous == 3){
                                    ?>
                                <span class="badge badge-pill badge-danger"><?= $rd->etat?></span>
                                <?php
                                }elseif ($rd->id_etat_rendez_vous == 4){
                                    ?>
                                <span class="badge badge-pill badge-info"><?= $rd->etat?></span>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a href="?p=admin.rendezVous.edit&id=<?= $rd->id ; ?>" class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                <!--  <a style="margin-right: -20px;" href="?p=admin.rendezVous.detail&id=<?php // $rd->id ; ?>" style="width: 5px; margin-right: -20px; background-color: transparent; border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                            <i class="fa fa-eye color-muted m-r-5"></i></a>-->

                                <a href="?p=admin.rendezVous.detail&id=<?= $rd->id ; ?>" class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-eye color-muted m-r-5"></i>
                                </a>


                                <form action="?p=admin.rendezVous.delete" method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?= $rd->id; ?>">
                                    <button type="button" class="btn btn-default" data-container="body"
                                            style="margin-left: -10px; margin-right: -20px; background-color: transparent; border: none;"
                                            data-toggle="popover" data-placement="right"
                                            data-content="Arrive bientôt.">
                                        <i class="fa fa-close color-danger"></i>
                                    </button>
                                    <!--  <button type="submit" style="width: 5px; margin-right: -20px; background-color: ;
                                    border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top"
                                    title="Supprimer"><i class="fa fa-close color-danger"></i></button>-->
                                </form>
                            </td>
                    </tr>
                    <?php
                    }elseif ($_SESSION["id_type"] == 1 && $rd->id_etat_rendez_vous != 4 ){
                        //var_dump($e->service, $_SESSION["domaine"]);
                        ?>
                        <tr>
                            <td><em><?= $rd->heureR ?></em></td>
                            <td><?= $rd->nomComplet ?></td>
                            <td><?= $rd->telephone ?></td>
                            <td><?= $rd->domaine ?></td>
                            <td>
                                <?php
                                if($rd->id_etat_rendez_vous == 1){
                                    ?>
                                    <span class="badge badge-pill badge-success"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->id_etat_rendez_vous == 2){
                                    ?>
                                    <span class="badge badge-pill badge-warning"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->id_etat_rendez_vous == 3){
                                    ?>
                                    <span class="badge badge-pill badge-danger"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->id_etat_rendez_vous == 4){
                                    ?>
                                    <span class="badge badge-pill badge-info"><?= $rd->etat?></span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <a href="?p=admin.rendezVous.edit&id=<?= $rd->id ; ?>" class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                <!--  <a style="margin-right: -20px;" href="?p=admin.rendezVous.detail&id=<?php // $rd->id ; ?>" style="width: 5px; margin-right: -20px; background-color: transparent; border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                            <i class="fa fa-eye color-muted m-r-5"></i></a>-->




                                <button style="margin-left: -10px;width: 5px; background-color: transparent; border: none;"
                                        type="button"
                                        class="btn btn-default"
                                        data-toggle="modal"
                                        data-target="#exampleModal"
                                        data-whatever="@mdo">
                                    <i class="fa fa-eye color-muted m-r-5"></i>
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Rendez vous du <?= $rd->heureR;?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="width: 90%;">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <h3>Nom Complet : <?= $rd->nomComplet;?></h3>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8 col-sm-6">
                                                            <h5>Motif : <?= $rd->motif;?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label alert alert-danger">Prise en charge durant rendez-vous</label>
                                                                <textarea class="form-control" id="message-text" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                        <button type="button" class="btn btn-primary">Valider</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!-- Button trigger modal -->
                                <!--  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalGrid"
                                          style="margin-left: -10px;width: 5px; background-color: transparent; border: none;" >
                                      <i class="fa fa-eye color-muted m-r-5"></i>
                                  </button>-->
                                <!-- Modal -->
                                <!-- <div class="modal fade" id="modalGrid">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Rendez vous du <?= $rd->heureR;?></h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-4"><?= $rd->nomComplet;?></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-9">
                                                            <div class="row">
                                                                <div class="col-8 col-sm-6"><?= $rd->motif;?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <form action="?p=admin.rendezVous.delete" method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?= $rd->id; ?>">
                                    <button type="button" class="btn btn-default" data-container="body"
                                            style="margin-left: -10px; margin-right: -20px; background-color: transparent; border: none;"
                                            data-toggle="popover" data-placement="right"
                                            data-content="Arrive bientôt.">
                                        <i class="fa fa-close color-danger"></i>
                                    </button>
                                    <!--  <button type="submit" style="width: 5px; margin-right: -20px; background-color: ;
                                    border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top"
                                    title="Supprimer"><i class="fa fa-close color-danger"></i></button>-->
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Nom Complet</th>
                        <th>Telephone</th>
                        <th>Type</th>
                        <th>Domaine</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>




<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Médecin</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Rendez-vous</a></li>
        </ol>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Les rendez-vous</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom Complet</th>
                        <th>Téléphone</th>
                        <th>Date & heure</th>
                        <th>domaine</th>
                        <th>Etat</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rendezvous as $rd): ?>
                        <tr>
                            <td><?= $rd->id ?></td>
                            <td><?= $rd->nomComplet ?></td>
                            <td><?= $rd->telephone ?></td>
                            <td><?= $rd->heureR?></td>
                            <td><?= $rd->domaine ?></td>
                            <td>
                                <?php
                                if($rd->etat === 'accorder'){
                                    ?>
                                    <span class="badge badge-pill badge-success"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->etat === 'reporter'){
                                    ?>
                                    <span class="badge badge-pill badge-warning"><?= $rd->etat?></span>
                                    <?php
                                }elseif ($rd->etat === 'annuler'){
                                    ?>
                                    <span class="badge badge-pill badge-danger"><?= $rd->etat?></span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                              <!--  <a style="margin-right: -20px; margin-left: -10px;" href="?p=admin.rendezVous.edit&id=<?php //$rd->id ; ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                <a style="margin-right: -20px;" href="?p=admin.rendezVous.edit&id=<?php //$rd->id ; ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                    <i class="fa fa-eye color-muted m-r-5"></i></a>-->



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
                                                        <div class="col-md-6">
                                                            <h1><?= $rd->nomComplet;?></h1>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-8 col-sm-6">
                                                            <h3><?= $rd->motif;?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-md-11">
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Prise en charge du rendez-vous</label>
                                                                <textarea class="form-control" id="message-text"></textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary">Valider</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                    <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nom Complet</th>
                        <th>Telephone</th>
                        <th>Email</th>
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
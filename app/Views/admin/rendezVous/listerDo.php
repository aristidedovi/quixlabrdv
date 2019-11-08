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
            <h4 class="card-title">Les rendez-vous prises <em class="alert alert-success" style="font-size: 10px;">Les rendez-vous dont leurs état est effecté</em></h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom Complet</th>
                        <th>Téléphone</th>
                        <th>Date & heure</th>
                        <th width="10%">domaine</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rendezvous as $rd): ?>
                        <?php
                        //var_dump($rd);
                        if($_SESSION["domaine"] === $rd->domaine && $_SESSION['id_type'] != 1 && $rd->id_etat_rendez_vous == 4 ){
                            ?>
                            <tr>
                                <td><?= $rd->id ?></td>
                                <td><?= $rd->nomComplet ?></td>
                                <td><?= $rd->telephone ?></td>
                                <td><?= $rd->heureR?></td>
                                <td><?= $rd->domaine ?></td>
                                <td>
                                    <a href="?p=admin.rendezVous.edit&id=<?= $rd->id ; ?>" class="btn btn-default" 
                                    style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" 
                                    data-toggle="tooltip" data-placement="top" title="Reporter/Annuler">
                                        <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                    <!--  <a style="margin-right: -20px;" href="?p=admin.rendezVous.detail&id=<?php // $rd->id ; ?>" style="width: 5px; margin-right: -20px; background-color: transparent; border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                            <i class="fa fa-eye color-muted m-r-5"></i></a>-->


                                    <a href="?p=admin.rendezVous.detail&id=<?= $rd->id ; ?>" 
                                    class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" 
                                    data-toggle="tooltip" data-placement="top" title="Prendre en charge">
                                        <i class="fa fa-eye color-muted m-r-5"></i>
                                    </a>

                                    <form action="?p=admin.rendezVous.delete" method="post" style="display: inline">
                                        <input type="hidden" name="id" value="<?= $rd->id; ?>">
                                        <button type="button" class="btn btn-default" data-container="body"
                                                style="margin-left: -10px; margin-right: -20px; background-color: transparent; border: none;"
                                                data-toggle="popover" data-placement="right"
                                                data-content="Arrive bientôt." disabled="disabled">
                                            <i class="fa fa-close color-danger"></i>
                                        </button>
                                        <!--  <button type="submit" style="width: 5px; margin-right: -20px; background-color: ;
                                        border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top"
                                        title="Supprimer"><i class="fa fa-close color-danger"></i></button>-->
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }elseif ($_SESSION["id_type"] == 2 && $rd->service === $e->service && $rd->id_etat_rendez_vous == 4 ){
                            ?>
                            <tr>
                                <td><?= $rd->id ?></td>
                                <td><?= $rd->nomComplet ?></td>
                                <td><?= $rd->telephone ?></td>
                                <td><?= $rd->heureR?></td>
                                <td><?= $rd->domaine ?></td>
                                <td>
                                   <!-- <a href="#" class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                        <i class="fa fa-pencil color-muted m-r-5"></i></a>-->
                                    <!--  <a style="margin-right: -20px;" href="?p=admin.rendezVous.detail&id=<?php // $rd->id ; ?>" style="width: 5px; margin-right: -20px; background-color: transparent; border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                            <i class="fa fa-eye color-muted m-r-5"></i></a>-->
                                    <a href="?p=admin.rendezVous.detail&id=<?= $rd->id ; ?>" class="btn btn-default" 
                                    style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" 
                                    data-toggle="tooltip" data-placement="top" title="Detail">
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
                        }elseif ($_SESSION["id_type"] == 1 && $rd->id_etat_rendez_vous == 4 ){
                            //var_dump($e->service, $_SESSION["domaine"]);
                            ?>
                            <tr>
                                <td><?= $rd->id ?></td>
                                <td><?= $rd->nomComplet ?></td>
                                <td><?= $rd->telephone ?></td>
                                <td><?= $rd->heureR?></td>
                                <td><?= $rd->domaine ?></td>
                                <td>
                                    <!--<a href="#" class="btn btn-default" style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                        <i class="fa fa-pencil color-muted m-r-5"></i></a>-->
                                    <!--  <a style="margin-right: -20px;" href="?p=admin.rendezVous.detail&id=<?php // $rd->id ; ?>" style="width: 5px; margin-right: -20px; background-color: transparent; border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                            <i class="fa fa-eye color-muted m-r-5"></i></a>-->
                                    <a href="?p=admin.rendezVous.detail&id=<?= $rd->id ; ?>" class="btn btn-default" 
                                    style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" 
                                    data-toggle="tooltip" data-placement="top" title="Detail">
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
                        }
                        ?>
                    <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nom Complet</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>



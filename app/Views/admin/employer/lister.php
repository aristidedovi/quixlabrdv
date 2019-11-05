<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Administration</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Employer</a></li>
        </ol>
    </div>
</div>


<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Les employés</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom Complet</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <!--<th>Type</th>-->
                        <th width="5%">Domaine</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($employers as $k => $val){
                        if($val->id === $_SESSION['id']){
                            unset($employers[$k]);
                        }
                        //var_dump($employers);
                    }
                    //var_dump((array)$employers);
                    ?>
                    <?php foreach ($employers as $k => $employer): ?>
                        <tr>
                            <td><?= $employer->id ?></td>
                            <td><?= $employer->nomComplet ?></td>
                            <td><?= $employer->telephone ?></td>
                            <td><?= $employer->email?></td>
                           <!-- <td><?php //$employer->typeEmployer ?></td>-->
                            <td><?= $employer->domaine?></td>
                            <td>
                                <a style="width: 5px; margin-left: -10px; background-color: transparent; border: none;" href="?p=admin.employer.edit&id=<?= $employer->id ; ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                <a style="margin-left: -10px;width: 5px; background-color: transparent; border: none;" href="?p=admin.employer.profil&id=<?= $employer->id ; ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Affcher">
                                    <i class="fa fa-eye color-muted m-r-5"></i></a>
                                <form action="?p=admin.employer.delete" method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?= $employer->id; ?>">
                                        <button type="button" class="btn btn-default" data-container="body"
                                                style="margin-left: -10px; margin-right: -20px; background-color: transparent; border: none;"
                                                data-toggle="popover" data-placement="right"
                                                data-content="Arrive bientôt.">
                                            <i class="fa fa-close color-danger"></i>
                                        </button>

                                  <!--  <button type="submit" style="width: 5px; margin-right: -20px; background-color: ; border: none;"
                                  class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                  <i class="fa fa-close color-danger"></i></button>
                               -->
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
                        <!--<th>Type</th>-->
                        <th>Domaine</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
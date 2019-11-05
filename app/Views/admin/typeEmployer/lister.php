<div class="row page-titles mx-0">
    <div class="col p-md-0">
        Bienvenue <span style="text-transform: uppercase; font-size: large;"><?= $_SESSION['nomComplet']; ?></span> vous êtes un <span style="text-transform: uppercase; font-size: large;"><?= $_SESSION['type']; ?></span> faites tout ce que vous voulez</br>
        <?php
        var_dump($_SESSION['telephone'],$_SESSION['id'],$_SESSION['domaine'],$_SESSION['type']);
        // var_dump($nb);
        ?>
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
                        <th>Type employer(Nombre d'employer dans ayant le type)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><?= $item->libelle ?>(<?= $item->nb ?>)</td>
                            <td>
                                <a style="margin-right: -20px; margin-left: -10px;" href="?p=admin.typeEmployer.edit&id=<?= $item->id ; ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                <form action="?p=admin.typeEmployer.delete" method="post" style="display: inline">
                                    <input type="hidden" name="id" value="<?= $item->id; ?>">
                                    <button type="submit" style="width: 5px; margin-right: -20px; background-color: ; border: none;" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-close color-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Libelle</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
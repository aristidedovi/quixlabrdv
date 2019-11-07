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
            <h4 class="card-title">Les services <em class="alert alert-danger" style="font-size: 10px;">Pour supprimer un service il faut supprimer tous ces domaines</em></h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Libelle(Nombre de domaine dans le service)</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><?= $item->libelle ?>(<?= $item->nb ?>)</td>
                            <td>
                                <a style="margin-right: -20px; margin-left: -10px;" href="?p=admin.service.edit&id=<?= $item->id ; ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Modifier">
                                    <i class="fa fa-pencil color-muted m-r-5"></i></a>
                                    <form action="?p=admin.service.delete" method="post" style="display: inline">
                                            <input type="hidden" name="id" value="<?= $item->id; ?>">
                                    <?php
                                        if($item->nb != 0){
                                    ?>
                                          <button type="button" style="width: 5px; margin-right: -20px; background-color: ; border: none;" 
                                            class="btn btn-default" data-container="body"
                                            data-toggle="popover" data-placement="right"
                                            data-content="Arrive bientôt." disabled="disabled">
                                            <i class="fa fa-close color-danger"></i></button>
                                    <?php 
                                        }else{
                                    ?>
                                
                                            <button type="button" style="width: 5px; margin-right: -20px; background-color: ; border: none;" 
                                            class="btn btn-default" data-container="body"
                                            data-toggle="popover" data-placement="right"
                                            data-content="Arrive bientôt.">
                                            <i class="fa fa-close color-danger"></i></button>
                                       
                                    <?php
                                        }
                                    ?>
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
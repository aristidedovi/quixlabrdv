<div class="row page-titles mx-0" xmlns="http://www.w3.org/1999/html">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Administration</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Employer</a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Administration</h4>
                <div class="general-button">
                    <!-- Split dropup button -->
                    <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="btn-group dropup mb-2">
                            <button type="button" class="btn btn-primary">Nouveau employer</button>
                            <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                                <span class="sr-only">Nouveau employer</span>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="?p=admin.employer.add&type=1">Nouveau admin</a>
                                <a class="dropdown-item" href="?p=admin.employer.add&type=3">Nouveau médecin</a>
                                <a class="dropdown-item" href="?p=admin.employer.add&type=2">Nouveau sécretaire</a>
                            </div>
                        </div>
                    </div>
                    
                    <!--
                    <a href="?p=admin.employer.add&type=1" class="btn mb-1 btn-primary">Nouveau admin</a>
                    <a href="?p=admin.employer.add&type=2">Nouveau sécretaire</a>
                    <a href="?p=admin.employer.add&type=3">Nouveau medecin</a>-->
                    <div class="col-lg-3 col-sm-6">
                        <a href="?p=admin.service.add" class="btn mb-1 btn-secondary">Nouveau service</a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="?p=admin.domaine.add" class="btn mb-1 btn-danger">Nouveau domaine</a>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <a href="?p=admin.typeEmployer.add" class="btn mb-1 btn-warning">Nouveau type employer</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<p><a href="?p=admin.posts.add" class="btn btn-primary">Nouveau medecin</a></p>-->
</div>
<!-- row -->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Nombre total de medecin</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            <?php
                                $i =0;
                                foreach ($employers as $employer){
                                    if(strtolower($employer->id_type) == 3){
                                        $i ++;
                                    }
                                }
                            echo $i;
                            ?>
                        </h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                    <!--<span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>-->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Nombre total de sécretaire</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            <?php
                            $i =0;
                            foreach ($employers as $employer){
                                if(strtolower($employer->id_type) == 2){
                                   $i++;
                                }
                            }
                            echo $i;
                            ?>
                        </h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                  <!--  <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>-->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Nombre total de service</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $services->nombre; ?></h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                    <!--<span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>-->
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Nombre total de spécialisté</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white"><?= $domaine->nombreDomaine; ?></h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                    <!--<span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>-->
                </div>
            </div>
        </div>
    </div>
    </div>



<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Sécretariat</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Rendez-vous</a></li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rendez-vous</h4>
                <div class="general-button">
                    <?php for ($i=0;$i<100;$i++): ?>
                        &nbsp;
                    <?php  endfor;?>
                    <a href="?p=admin.rendezVous.add" class="btn mb-1 btn-danger">Nouveau rendez-vous</a>
                    <?php for ($i=0;$i<10;$i++): ?>
                        &nbsp;
                    <?php  endfor;?>
                </div>
            </div>
        </div>
    </div>
    <?php
       // var_dump($rendezvous);

    ?>
<!-- row -->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-1">
                <div class="card-body">
                    <h3 class="card-title text-white">Rendez-vous du jours</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            <?= $jour->duJour; ?>
                        </h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-2">
                <div class="card-body">
                    <h3 class="card-title text-white">Rendez-vous reporter</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            <?php
                            $i = 0;
                            foreach ($rendezvous as $rdv){
                                if($rdv->id_etat_rendez_vous == 2 && $e->service === $rdv->service){
                                    $i++;
                                }
                            }
                            echo $i;
                            ?>
                        </h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-3">
                <div class="card-body">
                    <h3 class="card-title text-white">Rendez-vous annuler</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            <?php
                            $i = 0;
                            foreach ($rendezvous as $rdv){
                                if($rdv->id_etat_rendez_vous == 3 && $e->service === $rdv->service){
                                    $i++;
                                }
                            }
                            echo $i;
                            ?>
                        </h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card gradient-4">
                <div class="card-body">
                    <h3 class="card-title text-white">Les rendez-vous</h3>
                    <div class="d-inline-block">
                        <h2 class="text-white">
                            <?php
                                $i = 0;
                                foreach ($rendezvous as $rdv){
                                    if($e->service === $rdv->service){
                                        $i++;
                                    }
                                }
                                echo $i;
                            ?>
                        </h2>
                        <!--<p class="text-white mb-0">Jan - March 2019</p>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

  <!--<p><a href="?p=admin.posts.add" class="btn btn-primary">Nouveau medecin</a></p>-->



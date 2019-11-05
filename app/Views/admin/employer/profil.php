


<!--**********************************
    Content body start
***********************************-->
<?php
//var_dump($employers);
?>

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Employer</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<?php
// var_dump('La session',$_SESSION['telephone'],$_SESSION['id'],$_SESSION['domaine'],$_SESSION['type'],$_SESSION["id_type"]);
//var_dump($employer);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center mb-4">
                        <img class="mr-3" src="images/avatar/v.png" width="80" height="80" alt="">
                        <div class="media-body">
                            <h3 class="mb-0"><?= $employer["nomComplet"]?></h3>
                            <p class="text-muted mb-0"><?= $employer["typeEmployer"];?></p>
                        </div>
                    </div>
                    <h4>A propos de moi</h4>
                    <p class="text-muted">Mon adresse est <strong><?= $employer["adresse"]?></strong> et mon mot de passe est <s><em><?= $employer["password"]?></em></s></p>
                    <?php
                    //var_dump($_SESSION['first_login']);
                    if($_SESSION['first_login'] === "0"){
                      ?>
                        <a href="/index.php?p=admin.employer.edit" class="btn btn-danger">Modifier le mot de pass</a>
                        <br><br>
                    <?php
                    }
                    ?>
                    <ul class="card-profile__info">
                        <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span><?= $employer["telephone"]?></span></li>
                        <li><strong class="text-dark mr-4">Email</strong> <span><?= $employer["email"]?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->

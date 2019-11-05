<body class="h-100">
<div style="padding-top: 50px;">

</div>
<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0">
                        <div class="card-body pt-5">
                            <a class="text-center" href="#"> <h2 style="font-family: Arial, Helvetica, sans-serif">Quixlab</h2></a>
                            <?php if($errors):?>
                                <div class="alert alert-danger">
                                    Indentifiant incorrect
                                </div>
                            <?php endif; ?>
                            <div class="alert alert-success">
                                   Lien github du projet <a class="btn btn-warning" href="https://github.com/aristidedovi/gestionrdv" target="_blank">VISITER</a>
                                </div>

                            <form action="" method="post"  class="mt-5 mb-5 login-input">
                                <?= $form->input('username','Téléphone',[],true); ?>
                                <?= $form->input('password','Mot de passe', ['type' => 'password']); ?>
                                <button class="btn login-form__btn submit w-100">Valider</button>
                            <!--<p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p>
                        --></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!--**********************************
    Scripts
***********************************-->
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

</body>
</html>






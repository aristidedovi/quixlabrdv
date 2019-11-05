
<form action="" method="post">
    <?= $form->input('libelle','Nom du domaine'); ?>
    <?= $form->select('id_service','Services', $services); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
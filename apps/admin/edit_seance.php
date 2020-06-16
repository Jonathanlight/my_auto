<?php include_once('../../composants/dashboard/admin/header.php'); ?>
<?php include_once('../../functions/admin/listSeance.php'); ?>
<?php include_once('../../functions/admin/listUser.php'); ?>
<?php include_once('../../functions/admin/editSeance.php'); ?>
<?php
  $types = [
    'CODE',
    'CONDUITE'
  ];
?>

<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/admin/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Séances</h1>
      </div>

      <?php include_once('../../composants/flashMessage.php'); ?>

      <div class="col-md-12 p-lg-5 mx-auto my-5">

        <h1 class="display-5 font-weight-normal">Seance</h1>
      
        <form method="POST" action="edit_seance.php?seance=<?php echo $seance['id'] ?>">
          <div class="row mb-4">
            <div class="col-md-6">
              <label for="date_start" class="mr-sm-2">Date de debut: </label>
              <input type="datetime-local" class="form-control" id="date_start" value="<?php echo str_replace(' ', 'T', $seance['date_debut']);  ?>" name="date_start">
            </div>
            <div class="col-md-6">
              <label for="date_end" class="mr-sm-2">Date de fin:</label>
              <input type="datetime-local" id="date_end" class="form-control" value="<?php echo str_replace(' ', 'T', $seance['date_fin']);  ?>"  name="date_end">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-4">
              <label for="address" class="mr-sm-2">Adresse:</label>
              <input type="text" required class="form-control" placeholder="adresse" id="address" value="<?php echo $seance['adresse'] ?>"  name="address">
            </div>
            <div class="col-md-4">
              <label for="city" class="mr-sm-2">Ville:</label>
              <input type="text" required class="form-control" placeholder="Ville" id="city" value="<?php echo $seance['ville'] ?>"  name="city">
            </div>
            <div class="col-md-4">
              <label for="code_postal" class="mr-sm-2">Code postal:</label>
              <input type="text" required class="form-control" placeholder="Code postal" id="code_postal" value="<?php echo $seance['code_postal'] ?>"  name="code_postal">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <label for="type" class="mr-sm-2">Type de Seance:</label>
              <select name="type" class="form-control" id="type">
                <?php foreach ($types as $type): ?> 
                  <?php if ($type == $seance['type'] ) { ?>
                    <option value="<?php echo $type; ?>" selected> <?php echo $type; ?> </option>
                  <?php }else{ ?>
                    <option value="<?php echo $type; ?>"> <?php echo $type; ?> </option>
                  <?php } ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="user" class="mr-sm-2">Moniteur:</label>
              <select name="user" class="form-control" id="user">
                <?php foreach ($users as $reponse): ?> 
                  <?php if ($reponse['id'] == $seance['monitor_id'] ) { ?>
                    <option value="<?= $reponse['id'] ?>" selected> <?= $reponse['email'] ?> - <?= $reponse['nom'] ?> <?= $reponse['prenom'] ?> </option>
                  <?php }else{ ?>
                    <option value="<?= $reponse['id'] ?>"> <?= $reponse['email'] ?> - <?= $reponse['nom'] ?> <?= $reponse['prenom'] ?> </option>
                  <?php } ?>
                  
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <button type="submit" name="seance" class="btn btn-primary btn-block">Modifier</button>
        </form>
      </div>
    </main>
  </div>
</div>

<?php include_once('../../composants/dashboard/footer.php'); ?>
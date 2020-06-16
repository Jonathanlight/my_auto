<?php include_once('../../composants/dashboard/admin/header.php'); ?>
<?php include_once('../../functions/admin/listSeance.php'); ?>
<?php include_once('../../functions/admin/listUser.php'); ?>
<?php include_once('../../functions/admin/addSeance.php'); ?>

<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/admin/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Séances</h1>
      </div>

      <?php include_once('../../composants/flashMessage.php'); ?>

      <div class="col-md-12 p-lg-5 mx-auto my-5">

        <h1 class="display-5 font-weight-normal">Nouvelle seance</h1>
      
        <form method="POST" action="seances.php">
          <div class="row mb-4">
            <div class="col-md-6">
              <label for="date_start" class="mr-sm-2">Date de debut:</label>
              <input type="datetime-local" class="form-control" id="date_start" name="date_start">
            </div>
            <div class="col-md-6">
              <label for="date_end" class="mr-sm-2">Date de fin:</label>
              <input type="datetime-local" id="date_end" class="form-control" name="date_end">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-4">
              <label for="address" class="mr-sm-2">Adresse:</label>
              <input type="text" required class="form-control" placeholder="adresse" id="address" name="address">
            </div>
            <div class="col-md-4">
              <label for="city" class="mr-sm-2">Ville:</label>
              <input type="text" required class="form-control" placeholder="Ville" id="city" name="city">
            </div>
            <div class="col-md-4">
              <label for="code_postal" class="mr-sm-2">Code postal:</label>
              <input type="text" required class="form-control" placeholder="Code postal" id="code_postal" name="code_postal">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <label for="type" class="mr-sm-2">Type de Seance:</label>
              <select name="type" class="form-control" id="type">
                <option value="CODE">Code</option>
                <option value="CONDUITE">Conduite</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="user" class="mr-sm-2">Moniteur:</label>
              <select name="user" class="form-control" id="user">
                <?php foreach ($users as $reponse): ?> 
                  <option value="<?= $reponse['id'] ?>"> <?= $reponse['email'] ?> - <?= $reponse['nom'] ?> <?= $reponse['prenom'] ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <button type="submit" name="seance" class="btn btn-primary btn-block">Enregistrer</button>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Type</th>
              <th>Adresse</th>
              <th>Date de debut</th>
              <th>Date de fin </th>
              <th>Moniteur</th>
              <th>Création </th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($seances as $reponse): ?>  
            <tr>
              <td> <?= $reponse['id_seance'] ?> </td>
              <td> <?= $reponse['type'] ?> </td>
              <td> <?= $reponse['adresse_seance'] .' '.$reponse['ville_seance'].', '.$reponse['code_postal_seance'] ?></td>
              <td> <?= $reponse['date_debut'] ?> </td>
              <td> <?= $reponse['date_fin'] ?> </td>
              <td> <?= $reponse['email_user_moniteur'] ?> </td>
              <td> <?= $reponse['created_at_seance'] ?> </td>
              <td>
                <a class="btn btn-success" href="edit_seance.php?seance=<?php echo $reponse['id_seance'] ?>">
                  <i class="fa fa-edit"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-danger" href="">
                  <i class="fa fa-close"></i>
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include_once('../../composants/dashboard/footer.php'); ?>
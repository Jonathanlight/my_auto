<?php include_once('../../composants/dashboard/admin/header.php'); ?>

<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/admin/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Abonnements</h1>
      </div>

      <?php include_once('../../composants/flashMessage.php'); ?>

      <div class="col-md-12 p-lg-5 mx-auto my-5">

        <h1 class="display-5 font-weight-normal">Nouvel abonnement</h1>
      
        <form method="POST" action="abonnements.php">
          <div class="row mb-4">
            <div class="col-md-6">
              <label for="user" class="mr-sm-2">Id</label>
              <select name="user" class="form-control" id="user">
                <?php foreach ($users as $reponse): ?> 
                  <option value="<?= $reponse['id'] ?>"> <?= $reponse['email'] ?> - <?= $reponse['nom'] ?> <?= $reponse['prenom'] ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="forfait" class="mr-sm-2">Forfait:</label>
              <select name="forfait" class="form-control" id="forfait">
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
                <a class="btn btn-success" href="">
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
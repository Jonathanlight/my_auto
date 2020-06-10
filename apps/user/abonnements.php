<?php include_once('../../composants/dashboard/header.php'); ?>
<?php include_once('../../functions/user/listAbonnement.php'); ?>
<?php include_once('../../functions/admin/listForfait.php'); ?>
<?php include_once('../../functions/user/abonnement.php'); ?>

<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <?php include_once('../../composants/flashMessage.php'); ?>


      <div class="col-md-12 p-lg-5 mx-auto my-5">

        <h1 class="display-5 font-weight-normal">Prendre un abonnement</h1>
      
        <form method="POST" action="abonnements.php">
          <div class="form-group">
            <input type="name" required class="form-control" placeholder="Numéro de carte" name="card">
          </div>
          <div class="form-group">
            <label for="forfait" class="mr-sm-2">Forfaits:</label>
              <select name="forfait" class="form-control" id="forfait">
                <?php foreach ($reponses as $forfait): ?> 
                  <option value="<?= $forfait['id'] ?>"> <?= $forfait['nom_forfait'] ?> - <?= $forfait['prix_forfait'] . '€' ?> <?= $forfait['number_heure'] ?> Heures </option>
                <?php endforeach; ?>
              </select>
          </div>
          <button type="submit" name="abonnement" class="btn btn-primary btn-block">Enregistrer</button>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom Prenom</th>
              <th>Forfait</th>
              <th>Nombre d'heures forfait</th>
              <th>Prix</th>
              <th>Cartes de credit</th>
              <th>Date de l'abonnement </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($abonnements as $abonnement): ?>  
            <tr>
              <td> <?= $abonnement['id_abonnement']?></td>
              <td> <?= $abonnement['nom'].' '.$abonnement['prenom']?> </td>
              <td> <?= $abonnement['nom_forfait'] ?> </td>
              <td> <?= $abonnement['number_heure'] ?></td>
              <td> <?= $abonnement['prix_forfait'] ?></td>
              <td> <?= $abonnement['credit_card'] ?> </td>
              <td> <?= $abonnement['date_abonnement'] ?> </td>
            </tr>
            <?php endforeach; ?>
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php include_once('../../composants/dashboard/footer.php'); ?>
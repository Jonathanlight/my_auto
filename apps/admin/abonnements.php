<?php include_once('../../composants/dashboard/admin/header.php'); ?>
<?php include_once('../../functions/admin/listAbonnement.php'); ?>
<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/admin/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Abonnements</h1>
      </div>

      <?php include_once('../../composants/flashMessage.php'); ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom Prenom</th>
              <th>Forfait</th>
              <th>Nombre d'Forfait</th>
              <th>Prix</th>
              <th>Card Credit</th>
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
<?php include_once('../../composants/dashboard/admin/header.php'); ?>
<?php include_once('../../functions/admin/listForfait.php'); ?>
<?php include_once('../../functions/admin/forfait.php'); ?>

<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/admin/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Forfait</h1>
      </div>

      <?php include_once('../../composants/flashMessage.php'); ?>


      <div class="col-md-12 p-lg-5 mx-auto my-5">

        <h1 class="display-5 font-weight-normal">Nouveau forfait</h1>
      
        <form method="POST" action="forfait.php">
          <div class="form-group">
            <input type="name" required class="form-control" placeholder="Nom" id="nom" name="nom">
          </div>
          <div class="form-group">
            <input type="number" required class="form-control" placeholder="prix" id="prix" name="prix">
          </div>
          <div class="form-group">
            <input type="number" required class="form-control" placeholder="Nombre d'heure" id="number_time" name="number_time">
          </div>
          <button type="submit" name="forfait" class="btn btn-primary btn-block">Enregistrer</button>
        </form>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Prix</th>
              <th>Nombre d'heure</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($reponses as $reponse): ?>  
            <tr>
              <td> <?= $reponse['id'] ?> </td>
              <td> <?= $reponse['nom_forfait'] ?> </td>
              <td> <?= $reponse['prix_forfait'] ?> € </td>
              <td> <?= $reponse['number_heure'] ?> </td>
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
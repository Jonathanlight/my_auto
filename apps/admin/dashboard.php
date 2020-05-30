<?php include_once('../../composants/dashboard/admin/header.php'); ?>
<?php include_once('../../functions/admin/listUser.php'); ?>

<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/admin/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard Admin</h1>
      </div>

      <?php include_once('../../composants/flashMessage.php'); ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom - Prénom</th>
              <th>Email</th>
              <th>Rôle</th>
              <th>Numbre d'heure</th>
              <th>Numbre disponible</th>
              <th>Date d'inscription</th>
              <th colspan="3">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($reponses as $reponse): ?>    
              <tr>
                <td> <?= $reponse['id'] ?> </td>
                <td> <?= $reponse['nom'].' '.$reponse['prenom'] ?> </td>
                <td> <?= $reponse['email'] ?> </td>
                <td> <?= $reponse['role'] ?> </td>
                <td> <?= $reponse['number_heure'] ?> </td>
                <td> <?= $reponse['number_disponible'] ?> </td>
                <td> <?= $reponse['created_at'] ?> </td>

                <td>
                  <a class="btn btn-primary" href="">
                    <i class="fa fa-eye"></i>
                  </a>
                </td>
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
<?php include_once('../../composants/dashboard/header.php'); ?>
<?php include_once('../../functions/user/listSeance.php'); ?>

<div class="container-fluid">
  <div class="row">

    <?php include_once('../../composants/dashboard/bar_menu.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="row border-bottom">
        <div class="col-8">
          <h1 class="h2">Séance</h1>
        </div>
        <div class="col-4">
          <?= 'Heure total : ' . $_SESSION['number_heure'] . 'H - ' . ' Heure disponible : ' . $_SESSION['number_disponible'] . 'H' ?>
        </div>
      </div>

      <div class="row">

        <?php foreach ($seances as $seance): ?> 
          <?php if ($seance['type'] == 'CONDUITE' ) { ?>
            <div class="col-4">
              <div class="card" style="width: 18rem;">
                <img src="https://www.freestylediabete.fr/sites/default/files/articles/2018-12/images/shutterstock_704365318-min%20%281%29%20-%20Copie.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Reserver</a>
                </div>
              </div>
            </div>

          <?php }else{ ?>

            <div class="col-4">
              <div class="card" style="width: 18rem;">
                <img src="https://www.moncoyote.com/blog/wp-content/uploads/2018/04/avoir-code-de-la-route-du-premier-coup.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Reserver</a>
                </div>
              </div>
            </div>
          
          <?php } ?>
        <?php endforeach; ?>
        </div>
    </main>
  </div>
</div>

<?php include_once('../../composants/dashboard/footer.php'); ?>
<?php include_once('functions/parameters.php'); ?>
<?php include_once('functions/register.php'); ?>

<?php include_once('composants/public/header.php'); ?>
<?php include_once('composants/public/bar_menu.php'); ?>


<div class="overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">

	<?php include_once 'composants/flashMessage.php'; ?>

    <div class="col-md-5 p-lg-5 mx-auto my-5">

    	<h1 class="display-5 font-weight-normal">Inscription</h1>
    
	    <form method="POST" action="register.php">
		  <div class="form-group">
		    <input type="name" required class="form-control" placeholder="Nom" id="nom" name="nom">
		  </div>
		  <div class="form-group">
		    <input type="name" required class="form-control" placeholder="Prénom" id="prenom" name="prenom">
		  </div>	
		  <div class="form-group">
		    <input type="date" required class="form-control" placeholder="Date de naissance" id="birthday" name="birthday">
		  </div>
		  <div class="form-group">
		    <input type="email" required class="form-control" placeholder="Email" id="email" name="email">
		  </div>
		  <div class="form-group">
		    <input type="password" required class="form-control" placeholder="Password" id="password" name="password">
		  </div>
		  <div class="form-group">
		    <input type="password" required class="form-control" placeholder="Password de confirmation" id="password_confirm" name="password_confirm">
		  </div>
		  <button type="submit" name="register" class="btn btn-primary btn-block">Enregistrer</button>
		</form>
    </div>
</div>

<?php include_once('composants/public/footer.php'); ?>

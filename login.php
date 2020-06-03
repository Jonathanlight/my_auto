<?php include_once('functions/parameters.php'); ?>
<?php include_once('functions/login.php'); ?>

<?php include_once('composants/public/header.php'); ?>
<?php include_once('composants/public/bar_menu.php'); ?>

<div class="overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">

	<?php include_once 'composants/flashMessage.php'; ?>

	<div class="col-md-5 p-lg-5 mx-auto my-5">
	    <h1 class="display-5 font-weight-normal">Connexion</h1>
	    
	    <form method="POST" action="login.php">
		  <div class="form-group">
		    <input type="email" class="form-control" placeholder="Email" id="email" name="email">
		  </div>
		  <div class="form-group">
		    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
		  </div>
		  <button type="submit" name="login" class="btn btn-primary btn-block">Se connecte</button>
		</form>
	</div>
</div>

<?php include_once('composants/public/footer.php'); ?>
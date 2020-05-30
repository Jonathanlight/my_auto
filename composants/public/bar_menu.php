<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">My-Auto</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <img src="assets/images/apps/logo.jpg" width="24" height="24">
            </a>
          </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <?php if($_SESSION['user_id'] !== null) { ?>
            <a class="btn btn-secondary mr-2" href="apps/user/dashboard.php">
              <i class="fa fa-user"></i>
              <?php echo $_SESSION['nom']; ?>
            </a>
          <?php } else { ?>
          <a class="btn btn-secondary mr-2" href="login.php">
            <i class="fa fa-user"></i>
            Connexion
          </a>
          <a class="btn btn-secondary mr-2" href="register.php">
            <i class="fa fa-users"></i>
            Inscription
          </a>
        <?php } ?>
        </div>
      </div>
    </nav>
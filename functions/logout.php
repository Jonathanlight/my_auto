<?php 
		session_start();

		$_SESSION['user_id'] = null;
		$_SESSION['email'] = null;
		$_SESSION['role'] = null;
		$_SESSION['active'] = null;
		$_SESSION['nom'] = null;
		$_SESSION['prenom'] = null;

		header('Location: ../login.php');
?>
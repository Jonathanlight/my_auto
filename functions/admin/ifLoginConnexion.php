<?php
	
	//si la personne n'est pas connecté
	if ($_SESSION['user_id'] === null) {
	  header('Location: ../../login.php');
	} 

	if ($_SESSION['role'] !== 'ROLE_ADMIN') {
	  header('Location: ../../index.php');
	}
?>
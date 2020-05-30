<?php
	
	//si la personne n'est pas connecté
	if ($_SESSION['user_id'] === null) {
	  header('Location: ../../login.php');
	} 
?>
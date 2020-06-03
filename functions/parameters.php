<?php 
//Demarre la session
	session_start();
	// si dans la superglobale $SESSION le user id existe ca va l'affiche sinon ca sera = à null
	//si la personne est connecté
	if (isset($_SESSION['user_id'])) {
		if ($_SESSION['user_id'] !== null) {
		  // TODO(par exemple limite de connexion)
		} 
		//si la personne est pas connecte
		else {
			$_SESSION['user_id'] = null;
			$_SESSION['email'] = null;
			$_SESSION['role'] = null;
			$_SESSION['active'] = null;
			$_SESSION['nom'] = null;
			$_SESSION['prenom'] = null;
		}
	} else {
		$_SESSION['user_id'] = null;
	}

	$data = [
		'reponse' => null,
		'message' => ''
	];
//parameters est appelé dans les pages principales du site (index,login,register) elle permet d'afficher les messages d'erreur dans le site grace au fichier flashMessage qui permet l'affichage des erreurs
?>

<?php
//si on la pas inclut parameters ici c pcq il est inclut avec ce meme fichier dans login.php le principale
require_once 'database.php';

if (isset($_POST['login'])) {
	//appel de la foction validateForm dans une condition if avec parametre $value a pour valeur $_POST['email']
	if (validateForm($_POST['email']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner votre email !'
		];
		return false;
	}

	if (validateForm($_POST['password']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner votre mot de passe !'
		];
		return false;
	}

	//si c plus false (par rapport a la fonction validate true)
	$sth = $connexion->prepare('SELECT * FROM user WHERE email = :emailParam AND delete_at IS NULL');
	$sth->bindParam(':emailParam', $_POST['email']);
	$sth->execute();

	// retourne une seule ligne : fetch()
	$reponse = $sth->fetch();

	if ($reponse == true) {
		$passwordHash = $reponse['password'];
         //si on rentre dans ce if suivant alors on peut plus continuer donc si le mdp est bon  on ne rentre pas dans cette boucle (pas besoin de else)
		if (!password_verify($_POST['password'], $passwordHash)) {
	    	$data = [
				'reponse' => false,
				'message' => 'Votre mot de passe est incorrect !'
			];
			return false;
		}
		//on remplit la session avec les données de la personne qui s'est connecté SI le mots de passe est bon qd elle se connecte
		$_SESSION['user_id'] = $reponse['id'];
		$_SESSION['email'] = $reponse['email'];
		$_SESSION['role'] = $reponse['role'];
		$_SESSION['active'] = $reponse['active'];
		$_SESSION['nom'] = $reponse['nom'];
		$_SESSION['prenom'] = $reponse['prenom'];
	}

	if ($_SESSION['role'] == 'ROLE_USER') {
		header('Location: apps/user/dashboard.php');
	} 

	if ($_SESSION['role'] == 'ROLE_ADMIN') {
		header('Location: apps/admin/dashboard.php');
	}
}


/**
 *
 *cette fonction sera a chaque fois appelé et verifier juste avant mais ca aurait pu etre après
 **/
function validateForm($value)
{
	// si la value n'existe pas (retourne false)
	if (!isset($value)) {
		return false;
	}

    //si la valeur est vide (retourne false)
	if (empty($value)) {
		return false;
	}

	// si la valeur remplir toute les conditions (retourne true)
	return true;
}

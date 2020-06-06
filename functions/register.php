<?php

require_once 'database.php';

if (isset($_POST['register'])) {

	if (validateForm($_POST['nom']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner votre nom !'
		];
		return false;
	}

	if (validateForm($_POST['prenom']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner votre prenom !'
		];
		return false;
	}

	if (validateForm($_POST['birthday']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner votre date de naissance !'
		];
		return false;
	}

	if (validateForm($_POST['email']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner votre email !'
		];
		return false;
	}

	//traitement = $sth (on le fait une fois que les infos du formulaire pour nom prenom date naiss et email sont acceptées)
	$sth = $connexion->prepare('SELECT * FROM user WHERE email = :emailParam');
	$sth->bindParam(':emailParam', $_POST['email']);
	$sth->execute();

	$reponse = $sth->fetch();// reponse renvoie true si elle récupere qq chose suite à la requête sinon elle renvoie false

	if ($reponse == true) {
		$data = [
			'reponse' => false,
			'message' => 'Cette adresse email existe déjà !'
		];
		return false;
	}

	if (validateForm($_POST['password']) !== true && validateForm($_POST['password_confirm']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner votre mot de passe et le confirmer !'
		];
		return false;
	}

	if (strlen($_POST['password']) < 6 ) {
		$data = [
			'reponse' => false,
			'message' => 'Votre mot de passe doit contenir minimum 6 valeurs'
		];
		return false;
	}

	if ($_POST['password'] !== $_POST['password_confirm']) {
		$data = [
			'reponse' => false,
			'message' => 'Votre mot de passe doit identique à celui de la confirmation !'
		];
		return false;
	}
    //une fois que ttes les infos du formulaire sont acceptées --> je peux insérer
	if ($data['reponse'] !== false) {
		//Insertion en base de donnée
		$sth = $connexion->prepare('INSERT INTO user (nom, prenom, email, role, password, date_naissance, reference) VALUES (:nom, :prenom, :email, :role, :password, :date_naissance, :reference)');

		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$birthday = $_POST['birthday'];
		$reference = strtoupper(uniqid());
		$nom = htmlentities($_POST['nom']);
		$prenom = htmlentities($_POST['prenom']);
		$email = htmlentities($_POST['email']);
		$role = 'ROLE_USER';

		$sth->bindParam(':nom', $nom);
		$sth->bindParam(':prenom', $prenom);
		$sth->bindParam(':email', $email);
		$sth->bindParam(':role', $role);
		$sth->bindParam(':password', $password);
		$sth->bindParam(':date_naissance', $birthday);
		$sth->bindParam(':reference', $reference);
		$reponse = $sth->execute();

		if ($reponse == true) {
			$data = [
				'reponse' => true,
				'message' => 'Félicitation votre compte à bien été créer'
			];
		} else {
			$data = [
				'reponse' => false,
				'message' => 'Une erreur c\'est produite sur le serveur'
			];
		}
	}
	
}


function validateForm($value)
{
	// si la value n'existe pas (retourne false)
	if (!isset($value)) {
		return false;//(si on voulait verifier qu'elle existe on aurait if (isset($value) return true )
	}

    //si la valeur est vide (retourne false)
	if (empty($value)) {
		return false;
	}

	// si la valeur remplir toute les conditions (retourne true)
	return true;
}

?>
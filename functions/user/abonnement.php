<?php

require_once '../../functions/database.php';

if (isset($_POST['abonnement'])) {

	if (validateForm($_POST['card']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner une carte de credit !'
		];
		return false;
	}

	if (validateForm($_POST['forfait']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez choisir un forfait !'
		];
		return false;
	}

	$sth = $connexion->prepare('SELECT * FROM card WHERE number_card = :card');
	$card = htmlentities($_POST['card']);
	$sth->bindParam(':card', $card);
	$sth->execute();

	$repCard =  $sth->fetch();

	if ($repCard !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez entrer une card valide !'
		];
		return false;
	}

	$repCard['solde'];

	$sth = $connexion->prepare('SELECT * FROM forfait WHERE id = :id_forfait');
	$id_forfait = htmlentities($_SESSION['forfait']);
	$sth->bindParam(':id_forfait', $id_forfait);
	$repForfait = $sth->execute();

	$sth = $connexion->prepare('UPDATE user SET number_heure = :number_heure, number_disponible = :number_disponible WHERE id = :id_user');

	$id_user = $_SESSION['user_id'];

	$sth->bindParam(':number_heure', $number_heure);
	$sth->bindParam(':number_disponible', $number_disponible);
	$sth->bindParam(':id_user', $id_user);
	$repForfait = $sth->execute();

	$sth = $connexion->prepare('UPDATE card SET solde = :solde WHERE number_card = :card');

	$id_user = $_SESSION['user_id'];
	$sth->bindParam(':number_card', $number_card);
	$sth->bindParam(':card', $card);
	$repForfait = $sth->execute();


	if ($data['reponse'] !== false) {
		//Insertion en base de donnée
		$sth = $connexion->prepare('INSERT INTO seance (user_id, forfait_id, credit_card) VALUES (:user_id, :forfait_id, :credit_card)');

		$user = $_SESSION['user_id'];
		$card = $_POST['card'];
		$forfait = $_POST['forfait'];

		$sth->bindParam(':user_id', $user);
		$sth->bindParam(':forfait_id', $forfait);
		$sth->bindParam(':credit_card', $card);
		$rep = $sth->execute();

		if ($rep == true) {
			$data = [
				'reponse' => true,
				'message' => 'Votre abonnement à bien été créer'
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
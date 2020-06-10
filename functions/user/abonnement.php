<?php

require_once '../../functions/database.php';

if (isset($_POST['abonnement'])) {

	if (validateForm($_POST['card']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner une carte de credit !'
		];
		return false;
	}

	if (validateForm($_POST['forfait']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez choisir un forfait !'
		];
		return false;
	}

	$sth1 = $connexion->prepare('SELECT * FROM card WHERE number_card = :card');
	$card = htmlentities($_POST['card']);
	$sth1->bindParam(':card', $card);
	$req = $sth1->execute();

	$repCard =  $sth1->fetch();
	$sth1->closeCursor();

	// Ont verifie si $repCard est vide
	if (!$repCard) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez entrer une carte valide !'
		];
		return false;
	}

	$sth2 = $connexion->prepare('SELECT * FROM forfait WHERE id = :id_forfait');
	$id_forfait = $_POST['forfait'];
	$sth2->bindParam(':id_forfait', $id_forfait);
	$sth2->execute(); // retourne true
	$repForfait = $sth2->fetch(); // retourne la valeur qui est type array (tableau)
	$sth2->closeCursor();

	if ($repCard['solde'] < $repForfait['prix_forfait']) {
		$data = [
			'reponse' => false,
			'message' => 'Le montant de votre carte est insufissant !'
		];
		return false;
	}

	// Pour modifier le nombre d'heure total et le nombre heure disponible de l'utilisateur
	$sth3 = $connexion->prepare('UPDATE user SET number_heure = :number_heure, number_disponible = :number_disponible WHERE id = :id_user');

	$id_user = $_SESSION['user_id'];
	$number_heure = $_SESSION['number_heure'] + $repForfait['number_heure'];
	$number_disponible = $_SESSION['number_disponible'] + $repForfait['number_heure'];

	$sth3->bindParam(':number_heure', $number_heure);
	$sth3->bindParam(':number_disponible', $number_disponible);
	$sth3->bindParam(':id_user', $id_user);
	$req = $sth3->execute();
	$sth3->closeCursor();

	if ($req == false) {
		$data = [
			'reponse' => false,
			'message' => 'Erreur de traitement 1'
		];
		return false;
	}

	// Retire le prix du forfait dans le compte bancaire utilise
	$new_solde = $repCard['solde'] - $repForfait['prix_forfait'];
	$sth4 = $connexion->prepare('UPDATE card SET solde = :solde WHERE id = :card');

	$card = $repCard['id'];
	$sth4->bindParam(':solde', $new_solde);
	$sth4->bindParam(':card', $card);

	$req = $sth4->execute();

	//$req = $sth4->rowCount();

	$sth4->closeCursor();

	if ($req == false) {
		$data = [
			'reponse' => false,
			'message' => 'Erreur de traitement 2'
		];
		return false;
	}


	if ($data['reponse'] !== false) {
		//Insertion en base de donnée
		$sth = $connexion->prepare('INSERT INTO abonnement (user_id, forfait_id, credit_card) VALUES (:user_id, :forfait_id, :credit_card)');

		$user = $_SESSION['user_id'];
		$card = $_POST['card'];
		$forfait = $_POST['forfait'];

		$sth->bindParam(':user_id', $user);
		$sth->bindParam(':forfait_id', $forfait);
		$sth->bindParam(':credit_card', $card);
		$rep = $sth->execute();

		$_SESSION['number_heure'] = $number_heure;
		$_SESSION['number_disponible'] = $number_disponible;

		if ($rep == true) {
			$data = [
				'reponse' => true,
				'message' => 'Votre abonnement à bien été créer'
			];
			//header('Location: ' . $_SERVER['PHP_SELF']);
			//die;
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
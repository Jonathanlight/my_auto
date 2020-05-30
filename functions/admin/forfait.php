<?php

require_once '../../functions/database.php';

if (isset($_POST['forfait'])) {

	if (validateForm($_POST['nom']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner un nom !'
		];
		return false;
	}

	if (validateForm($_POST['prix']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner un prix !'
		];
		return false;
	}

	if (validateForm($_POST['number_time']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veillez renseigner un nombre d\'heures !'
		];
		return false;
	}

	if ($data['reponse'] !== false) {
		//Insertion en base de donnée
		$sth = $connexion->prepare('INSERT INTO forfait (nom_forfait, prix_forfait, number_heure
) VALUES (:nom, :prix, :number_heure)');

		$nom = $_POST['nom'];
		$prix = $_POST['prix'];
		$number_heure = $_POST['number_time'];

		$sth->bindParam(':nom', $nom);
		$sth->bindParam(':prix', $prix);
		$sth->bindParam(':number_heure', $number_heure);
		$rep = $sth->execute();

		if ($rep == true) {
			$data = [
				'reponse' => true,
				'message' => 'Votre forfait à bien été créer'
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
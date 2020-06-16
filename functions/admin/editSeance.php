<?php

require_once '../../functions/database.php';

if (isset($_GET['seance'])) {

	$id_seance = $_GET['seance'];

	$sth = $connexion->prepare('SELECT * FROM seance WHERE id = :id_seance');
	$sth->bindParam(':id_seance', $id_seance);
	$sth->execute();
	$seance = $sth->fetch(); // retourne la valeur qui est type array (tableau)
	$sth->closeCursor();
}

if (isset($_POST['seance'])) {

	if (validateForm($_POST['date_start']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner une date de debut !'
		];
		return false;
	}

	if (validateForm($_POST['date_end']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner une date de fin !'
		];
		return false;
	}

	if (validateForm($_POST['address']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner une adresse !'
		];
		return false;
	}

	if (validateForm($_POST['city']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner une ville !'
		];
		return false;
	}

	if (validateForm($_POST['code_postal']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner un code postal !'
		];
		return false;
	}

	if (validateForm($_POST['type']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner un type de seance !'
		];
		return false;
	}

	if (validateForm($_POST['user']) !== true) {
		$data = [
			'reponse' => false,
			'message' => 'Veuillez renseigner un utilisateur !'
		];
		return false;
	}

	if ($data['reponse'] !== false) {
		//Insertion en base de donnée
		$sth = $connexion->prepare('UPDATE seance SET date_debut = :date_debut, date_fin = :date_fin, adresse = :adresse, ville = :ville, code_postal = :code_postal, type = :type, monitor_id = :monitor_id WHERE id = :id_seance ');

		$date_start = $_POST['date_start'];
		$date_end = $_POST['date_end'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$code_postal = $_POST['code_postal'];
		$type = $_POST['type'];
		$user = $_POST['user'];
		$id_seance = $_GET['seance'];

		$sth->bindParam(':date_debut', $date_start);
		$sth->bindParam(':date_fin', $date_end);
		$sth->bindParam(':adresse', $address);
		$sth->bindParam(':ville', $city);
		$sth->bindParam(':code_postal', $code_postal);
		$sth->bindParam(':type', $type);
		$sth->bindParam(':monitor_id', $user);
		$sth->bindParam(':id_seance', $id_seance);
		$rep = $sth->execute();

		if ($rep == true) {
			$data = [
				'reponse' => true,
				'message' => 'Votre seance à bien été modifier'
			];
			header('Location: seances.php');
			die;
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
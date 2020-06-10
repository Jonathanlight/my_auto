<?php

require_once '../../functions/database.php';

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
		$sth = $connexion->prepare('INSERT INTO seance (date_debut, date_fin, adresse, ville, code_postal, type, monitor_id, created_at
) VALUES (:date_debut, :date_fin, :adresse, :ville, :code_postal, :type, :monitor_id, :created_at)');

		$date_start = $_POST['date_start'];
		$date_end = $_POST['date_end'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$code_postal = $_POST['code_postal'];
		$type = $_POST['type'];
		$user = $_POST['user'];
		$date = date('Y-m-d H:i:s');

		$sth->bindParam(':date_debut', $date_start);
		$sth->bindParam(':date_fin', $date_end);
		$sth->bindParam(':adresse', $address);
		$sth->bindParam(':ville', $city);
		$sth->bindParam(':code_postal', $code_postal);
		$sth->bindParam(':type', $type);
		$sth->bindParam(':monitor_id', $user);
		$sth->bindParam(':created_at', $date);
		$rep = $sth->execute();

		if ($rep == true) {
			$data = [
				'reponse' => true,
				'message' => 'Votre seance à bien été créer'
			];
			header('Location: ' . $_SERVER['PHP_SELF']);
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
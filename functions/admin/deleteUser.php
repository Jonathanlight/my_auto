<?php

require_once '../../functions/database.php';

	// var_dump($_GET);

	if (isset($_GET['id_user'])) {

		$id_user = $_GET['id_user'];
		$date = date('Y-m-d H:i:s');

		$sth = $connexion->prepare('UPDATE user SET delete_at = :dateDelete WHERE id = :id_user');
		$sth->bindParam(':dateDelete', $date);
		$sth->bindParam(':id_user', $id_user);
		$rep = $sth->execute();

		if ($rep == true) {
			$data = [
				'reponse' => true,
				'message' => 'L\'utilisateur a bien été supprimer'
			];
		} else {
			$data = [
				'reponse' => false,
				'message' => 'Une erreur c\'est produite sur le serveur'
			];
		}
	}

?>
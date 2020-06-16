<?php

require_once '../../functions/database.php';

	$id_user = $_SESSION['user_id'];

	$sth = $connexion->prepare('SELECT seance.id as id_seance, seance.type as type, seance.adresse as adresse_seance, seance.ville as ville_seance, seance.code_postal as code_postal_seance, seance.date_debut, seance.date_fin, seance.created_at as created_at_seance FROM seance LEFT JOIN reservation ON seance.id = reservation.seance_id WHERE seance.date_debut >= :date_now OR reservation.status != :status ');

	$date = date('Y-m-d H:i:s');
	$status = 'validated'; //watting - validated - finished

	$sth->bindParam(':date_now', $date);
	$sth->bindParam(':status', $status);
	$sth->execute();
	$seances = $sth->fetchAll();
?>
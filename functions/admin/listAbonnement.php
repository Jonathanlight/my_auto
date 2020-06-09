<?php

require_once '../../functions/database.php';

	$sth = $connexion->prepare('SELECT abonnement.id as id_abonnement ,user.nom, user.prenom,forfait.nom_forfait, forfait.number_heure, forfait.prix_forfait , abonnement.credit_card, abonnement.created_at as date_abonnement FROM abonnement LEFT JOIN forfait ON abonnement.forfait_id=forfait.id LEFT JOIN user ON  abonnement.user_id=user.id ');
	$sth->execute();

	// fetchAll pour recuperer plusieurs ligne depuis la base de donnée
	// fetch qui recupere une seule ligne 
	$abonnements = $sth->fetchAll();

	//var_dump($abonnements);
	//die;
?>
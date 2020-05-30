<?php

require_once '../../functions/database.php';

	$sth = $connexion->prepare('SELECT * FROM forfait');
	$sth->execute();

	// fetchAll pour recupere plusieurs ligne depuis la base de donnée
	// fetch qui recupere une seule ligne 
	$reponses = $sth->fetchAll();
?>
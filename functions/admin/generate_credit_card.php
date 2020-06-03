<?php
//si on la pas inclut parameters ici c pcq il est inclut avec ce meme fichier dans login.php le principale
require_once '../../functions/database.php';

for ($i=0; $i < 10; $i++) { 

	$sth = $connexion->prepare('INSERT INTO card (number_card, solde) VALUES (:number_card, :solde)');

	$number_card = rand(100000, 900000);
	$solde = rand(500, 5000);

	$sth->bindParam(':number_card', $number_card);
	$sth->bindParam(':solde', $solde);
	$reponse = $sth->execute();

}

header('Location: ../../apps/admin/forfait.php');

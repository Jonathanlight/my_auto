<?php

require_once '../../functions/database.php';
	//le code jusqu a ligne 8 c pour pas qu'on rajoute un admin dans la liste User
	$role = 'ROLE_USER';
	$sth = $connexion->prepare('SELECT * FROM user WHERE role = :role');
	$sth->bindParam(':role', $role);
	$sth->execute();

	// fetchAll pour recupere plusieurs ligne depuis la base de donnée
	// fetch qui recupere une seule ligne 
	$reponses = $sth->fetchAll();
?>
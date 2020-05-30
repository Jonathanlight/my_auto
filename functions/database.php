<?php

	// Connexion a PDO
	$user = "root";
	$password = "";
	$dbname = "my_auto_db";
	$host = "localhost";

	try {
	  $connexion = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
	} catch (Exception $e) {
	  echo "Failed: " . $e->getMessage();
	  die;
	}
?>
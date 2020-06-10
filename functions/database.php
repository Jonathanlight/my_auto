<?php

	// Connexion a PDO
	$user = "root";
	$password = "";
	$dbname = "my_auto_db";
	$host = "localhost";

	try {
	  $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8",$user,$password, 
	  [
	  	PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
	  ]);
	} catch (Exception $e) {
	  echo "Failed: " . $e->getMessage();
	  die;
	}
?>
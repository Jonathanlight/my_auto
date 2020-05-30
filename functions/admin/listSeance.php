<?php

require_once '../../functions/database.php';
/*
<td> <?= $reponse['id'] ?> </td>
              <td> <?= $reponse['type'] ?> </td>
              <td> <?php echo $reponse['adresse'] .' '.$reponse['ville'].', '.$reponse['code_postal'] ?></td>
              <td> <?= $reponse['date_debut'] ?> </td>
              <td> <?= $reponse['date_fin'] ?> </td>
              <td> <?= $reponse['moniteur'] ?> </td>
              <td> <?= $reponse['created_at'] ?> </td>
              */

	$sth = $connexion->prepare('SELECT seance.id as id_seance, seance.type as type, seance.adresse as adresse_seance, seance.ville as ville_seance, seance.code_postal as code_postal_seance, seance.date_debut, seance.date_fin, seance.created_at as created_at_seance, user.email as email_user_moniteur FROM seance LEFT JOIN user ON seance.monitor_id = user.id');
	$sth->execute();

	// fetchAll pour recupere plusieurs ligne depuis la base de donnée
	// fetch qui recupere une seule ligne 
	$seances = $sth->fetchAll();
?>
<div class="row">
	<div class="col-12">
		<?php
		//par defaut la reponse de data est null(parameters.php) et la on verifie si y'a eu un traitement = tentative de connexion ou inscription ...ttes actions /pbs qui arrivera 
			if ($data['reponse'] !== null) {

				if ($data['reponse'] == false) {
					echo '<div class="alert alert-danger">' . $data['message'] . '</div>';
				}

				if ($data['reponse'] == true) {
					echo '<div class="alert alert-success">' . $data['message'] . '</div>';
				}
			}
		?>
	</div>
</div>
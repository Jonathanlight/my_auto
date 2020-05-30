<?php

$eleves = [
	"Francais" => [
		"devoir_1" => [
			"nom" => "Tom Ardi",
			"note" => 11
		],
		"devoir_2" => [
			"nom" => "Tom Ardi",
			"note" => 14
		],
		"devoir_3" => [
			"nom" => "Tom Ardi",
			"note" => 9.50
		],
		"devoir_4" => [
			"nom" => "Tom Ardi",
			"note" => 17.50
		]
	],
	"Math" => [
		"devoir_1" => [
			"nom" => "Tom Ardi",
			"note" => 5.33
		],
		"devoir_2" => [
			"nom" => "Tom Ardi",
			"note" => 11.25
		]
	],	
];



function calculeMoyenne($notes) {
	
	$somme = 0;
	
	foreach($notes as $note) {
		$somme = $somme + $note['note'];
	}

	$coef = count($notes);
	
	$reponse =  $somme / $coef;

	return round($reponse, 2);
}


function moyenneParMatiere($listesMatieres){

	$sommeMoyenne = 0;

	foreach ($listesMatieres as $listesMatiere) {
		var_dump(calculeMoyenne($listesMatiere));
		$sommeMoyenne = $sommeMoyenne + calculeMoyenne($listesMatiere);
	}

	$coef = count($listesMatieres);

	$reponse =  $sommeMoyenne / $coef;

	return round($reponse, 2);
}


//echo calculeMoyenne($eleves);
//echo moyenneParMatiere($eleves);

$test = [
	"response_1" => "",
	"response_2" => null,
];

var_dump(isset($test['response_1']), empty($test['response_1']));   // true - 
var_dump(isset($test['response_2']), empty($test['response_2']));   // false - si la valeur est null 
var_dump(isset($test['response_3']), empty($test['response_3']));   // false - si la valeur n'existe pas
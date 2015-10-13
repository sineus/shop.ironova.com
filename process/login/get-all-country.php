<?php
	// CONNECT BDD
	include('../bdd.php');

	$req = $bdd->prepare('SELECT * FROM country');
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);


	if($result){

		$json = json_encode($result);
		echo $json;

	}else{

		echo "No country available";

	}
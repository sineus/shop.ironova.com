<?php

	// CONNECT BDD
	include('bdd.php');

	$userID = $_GET['userID'];


	$req = $bdd->prepare("SELECT * FROM commandes WHERE rid_client= ? AND paiement = 4");

	$req->execute(array($userID));

	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	if($result){

		$json = json_encode($result);
		echo $json;

	}
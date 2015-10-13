<?php
	//PROCESS / DISCOUNT
	// CONNECT BDD
	include('bdd.php');

	// RETRIEVE CODE DATA
	$code =  $_GET['discount_code'];

	// VERIFY CODE WITH DATE START AND END
	$req = $bdd->prepare("SELECT * FROM avoir WHERE code = ? AND date_fin >= CURDATE() AND date_debut <= CURDATE()");
	$req->execute(array($code));
	$result = $req->fetch();

	// BOOL RESULT (OUTPUT ANGULAR)
	if($result){

		$json = json_encode($result);
		echo $json;

	}else{

		echo 'Discount code is not available or do not exist';

	}
<?php

	// CONNECT BDD
	include('bdd.php');

	$item = $_GET['link_page'];

	$req = $bdd->prepare('SELECT * FROM product WHERE url = ?');
	$req->execute(array($item));
	$result = $req->fetch();


	if($result){

		$json = json_encode($result);
		echo $json;

	}else{

		echo "No items available";

	}
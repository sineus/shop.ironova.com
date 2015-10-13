<?php
	// CONNECT BDD
	include('bdd.php');

	$item = $_GET['id'];

	$req = $bdd->prepare('SELECT path_img FROM product_img WHERE id_prod = ?');
	$req->execute(array($item));
	$result = $req->fetchAll(PDO::FETCH_ASSOC);


	if($result){

		$json = json_encode($result);
		echo $json;

	}else{

		echo "No items available";

	}
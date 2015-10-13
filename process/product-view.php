<?php
	// CONNECT BDD
	include('bdd.php');

	// $req = "SELECT * FROM product WHERE display=2";
	$req = $bdd->prepare('SELECT * FROM product as A INNER JOIN product_img as B ON A.id_cover = B.id AND display=2 GROUP BY B.id');
	$req->execute();
	$result = $req->fetchAll(PDO::FETCH_ASSOC);

	if($result){

		$json = json_encode($result);
		echo $json;

	}else{

		echo "No items available";

	}
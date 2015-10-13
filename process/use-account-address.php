<?php

	// CONNECT BDD
	//PRODUCTION
	// $host = 'ironovacmo2015.mysql.db';
	// $name = 'ironovacmo2015';
	// $user = 'ironovacmo2015';
	// $psw = 'RPzaYCjhEFUR';

	//TEST
	$host = 'localhost';
	$name = 'ironovacmo2015';
	$user = 'root';
	$psw = 'david';

	try{
	   	$bdd = new PDO('mysql:host='.$host.';dbname='.$name, $user, $psw);
	    $bdd->exec("SET CHARACTER SET utf8");
	}
	catch(Exception $e){
	    die('Erreur : '.$e->getMessage());
	}
	date_default_timezone_set('UTC');

	// RETRIEVE DATA
   	$userID = $_GET['userID'];

	// SELECT USER ADDRESS
	$req = $bdd->prepare("SELECT * FROM clients_adresses WHERE rid_client = ?");
	$req->execute(array($userID));

	while($data = $req->fetch()){
		
		$gender = $data['civilite'];
		$first_name = $data['nom'];
		$last_name = $data['prenom'];
		$address = $data['adresse1'];
		$zip = $data['cp'];
		$phone = $data['tel'];
		$city = $data['ville'];
		$country = $data['rid_pays'];
	}

	$userAddress = array(
		'gender'      => $gender,
		'first_name'  => $first_name,
		'last_name'   => $last_name,
		'address'     => $address,
		'zip'         => $zip,
		'phone'       => $phone,
		'city'        => $city,
		'country'     => $country 
	);

	// BOOL RESULT (OUTPUT ANGULAR)
	if($userID){
		echo json_encode($userAddress);
	}else{
		echo 'Error';
	}
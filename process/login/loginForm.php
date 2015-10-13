<?php

	// CONNECT BDD
	include('../bdd.php');

	// RETRIEVE DATA
   	$postData = file_get_contents("php://input");
	$request = json_decode($postData, true);
	$login = $request['login_mail'];
	$psw = sha1($request['login_password']);

	// VERIFY LOGIN AND PSW
	$req = $bdd->prepare("SELECT count(*) FROM clients WHERE email = ? AND pass = ?");
	$req->execute(array($login, $psw));
	$result = $req->fetch();

	$reqName = $bdd->prepare("SELECT * FROM clients WHERE email = ? AND pass = ?");
	$reqName->execute(array($login, $psw));
	$resultName = $req->fetch();

	while($data = $reqName->fetch()){
		$name = $data['prenom'];
		$id = $data['id_client'];
		$country = $data['country'];
	}

	$user = array(
		'login'   => $login,
		'id'      => $id,
		'name'    => $name,
		'country' => $country,
		'auth'    => true 
	);

	// BOOL RESULT (OUTPUT ANGULAR)
	if($login != '' && $psw != ''){
		if($result[0] == 1){

			echo json_encode($user);

		}else if($result[0] == 0){

			echo 'You are not connected';

		}else{

			echo 'Problem with database';

		}
	}else{

		echo 'Field required';

	}
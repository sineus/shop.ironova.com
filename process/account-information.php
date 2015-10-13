<?php

	// CONNECT BDD
	include('bdd.php');

	if($_GET['userID'] != ''){

		$userID = $_GET['userID'];

		$req = $bdd->prepare("SELECT * FROM clients C INNER JOIN clients_adresses A ON A.rid_client = C.id_client WHERE C.id_client = ? AND A.rid_client = ?");
		$req->execute(array($userID, $userID));


		while($data = $req->fetch()){
			$title = $data['civilite'];
			$last_name = $data['nom'];
			$first_name = $data['prenom'];
			$birthdate = $data['date_naiss'];
			$weight = $data['poids'];
			$height = $data['taille'];
			$mail = $data['email'];
			$psw = $data['pass'];
			$enterprise = $data['societe'];
			$address = $data['adresse1'];
			$city = $data['ville'];
			$zip = $data['cp'];
			$country = $data['rid_pays'];
			$phone = $data['tel'];
			$mobile = $data['portable'];
		}

		$userInfo = array(
			'title'      => $title,
			'last_name'  => $last_name,
			'first_name' => $first_name,
			'birthdate'  => $birthdate,
			'weight'     => $weight,
			'height'     => $height,
			'mail'       => $mail,
			'psw'        => $psw,
			'enterprise' => $enterprise,
			'address'    => $address,
			'city'       => $city,
			'zip'        => $zip,
			'country'    => $country,
			'phone'      => $phone,
			'mobile'     => $mobile
		);

		echo json_encode($userInfo);

	}else{
		echo 'You are not user';
	}
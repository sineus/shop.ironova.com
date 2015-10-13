<?php
	// ACCOUNT MODIFY USER INFORMATIONS
	// CONNECT BDD
	include('bdd.php');

	//VERIFY NAME, VALUE, USERID
	if($_GET['name'] != '' && $_GET['value'] != '' && $_GET['userID']){

		//INITIALIZE
		$name = $_GET['name'];
		$value = $_GET['value'];
		$userID = $_GET['userID'];

		//VERIFY IF COLUMN CORRESPOND WITH TABLE
		if($name != 'societe' || $name != 'adresse1' || $name != 'cp' || $name != 'ville' || $name != 'tel' || $name != 'portable' || $name != 'rid_pays'){

			$req = $bdd->prepare("UPDATE clients SET $name = ? WHERE id_client = ?");
			$req->execute(array(($name == 'pass') ? sha1($value) : $value, $userID));

			$req = $bdd->prepare("UPDATE clients_adresses SET $name = ? WHERE rid_client = ?");
			$req->execute(array($value, $userID));

		}else{
			$req = $bdd->prepare("UPDATE clients_adresses SET $name = ? WHERE rid_client = ?");
			$req->execute(array($value, $userID));
		}
		//OUTPUT
		echo 'Modify success';

	}else{

		//OUTPUT
		echo 'Modify error';

	}
<?php

	// CONNECT BDD
	include('bdd.php');

	// RECOVERED DATA
   	$postData = file_get_contents("php://input");
	$request = json_decode($postData, true);
	$mail = $request['mail'];

	// // DATA OUTPUT
	if(isset($mail)){
		echo 'Thanks, registration successful see you soon';
		// SQL ACTION
		$sql = "INSERT INTO mailing (mail) VALUES(:mail)";
		$sth = $bdd->prepare($sql);
		$sth->bindValue(':mail', $mail);
		$sth->execute();
		$sth->closeCursor();
	}else{
		echo 'Sorry, your email is invalid (ex: john.smith@mail.com)';
	}
?>
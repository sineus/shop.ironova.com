<?php
	//FORGOT PASSWORD PROCESS
	// CONNECT BDD
	include('../bdd.php');

	// RETRIEVE MAIL DATA
   	$postData = file_get_contents("php://input");
	$data = json_decode($postData, true);
	
	$mail = $data['mail'];

	//IF EXIST USER
	$req = $bdd->prepare('SELECT email FROM clients WHERE email = ?');
	$req->execute(array($mail));
	$result = $req->fetch();

	if($result && $mail){

		//GENERATE PSW
		function generate_psw($length){
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXY1234567890";
			return substr(str_shuffle($chars), 0, $length);
		}	
		$psw = generate_psw(13);

		//UPDATE NEW PSW
		$req = $bdd->prepare('UPDATE clients SET pass = ? WHERE email = ?');
		$req->execute(array(
			sha1($psw),
			$mail
		));

		//SEND MAIL TO A NEW USER
		$to = $mail;
		$subject = "Ironova | Forgot password";
		$body = "
		<html>
		<head>
		<title></title>
		<style>
			body{
				text-align:center;
			}
			h1{
				color:#1E1E1E!important;
				text-transform:uppercase!important;
				font-size:25px!important;
			}
			p{
				color:#706F6F;
			}
			img{
				width:250px;
				margin-bottom:10px;
			}
			span{
				color:#86BC27;
			}
			.little{
				color:#706F6F;
				font-size:10px;
			}
			a{
				color:#86BC27;
			}
		</style>
		</head>
		<body>
			<img src='http://ironova.com/img/logo-black.svg' alt='logo-ironova'/>
			<h1>Forgot password</h1>
			<p>Hey,<p>
			<p>For the safety of your account, we generated a new password for you</p>
			<p>Password: ".$psw."</p>
			<a href='http://shop.ironova.com/'>Go to ironova</a>
		</body>
		</html>
		";
		$headers = "MIME-Version: 1.0"."\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\n";
		$headers .= 'From: <support@ironova.com>'."\n";

		mail($to,$subject,$body,$headers);

		//OUTPUT SUCCESS FORGOT
		echo 1;

	}else{

		//OUTPUT ERROR FORGOT
		echo 2;

	}
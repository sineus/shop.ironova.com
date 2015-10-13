<?php
	//REGISTER PROCESS
	// CONNECT BDD
	include('../bdd.php');

	// RETRIEVE SIGN UP DATA
   	$postData = file_get_contents("php://input");
	$data = json_decode($postData, true);
	
	$gender     = $data['gender'];
	$last_name  = $data['last_name'];
	$first_name = $data['first_name'];
	$birthday   = $data['birthday'];
	$weight     = $data['weight'];
	$height     = $data['height'];
	$address    = $data['address'];
	$city       = $data['city'];
	$zip        = $data['zip'];
	$country    = $data['country'];
	$phone      = $data['phone'];
	$mobile     = $data['mobile'];
	$mail       = $data['mail'];
	$password   = sha1($data['password']);
	$password2  = sha1($data['password_b']);

	//IF EXIST USER
	$req = $bdd->prepare('SELECT email FROM clients WHERE email = ?');
	$req->execute(array($mail));
	$result = $req->fetch();

	if(!$result){

		//VERIFY DATA
		if($gender != '' || $last_name != '' || $first_name != '' || $birthday != '' || $weight != '' || $height != '' || $address != '' || $city != '' || $zip != '' || $country != '' || $phone != '' || $mobile != '' || $mail != '' || $password != '' || $password2 != ''){

			//VERIFY PASS AND CONFIRM PASS
			if($password == $password2){

				//INSERT DATA FOR NEW USER
				$req = $bdd->prepare('INSERT INTO clients (
					nom, 
					prenom, 
					civilite, 
					email, 
					pass, 
					date_naiss, 
					country, 
					poids, 
					taille, 
					date_inscription,
					new
				) VALUES(
					:last_name,
					:first_name,
					:gender,
					:mail,
					:password,
					:birthday,
					:country,
					:poids,
					:taille,
					NOW(),
					:new
				)');

				$req->execute(array(
					'last_name'  => $last_name,
					'first_name' => $first_name,
					'gender'     => $gender,
					'mail'       => $mail,
					'password'   => $password,
					'birthday'   => $birthday,
					'country'    => $country,
					'poids'      => $weight,
					'taille'     => $height,
					'new'        => 1
				));

				//CURRENT USER ID
				$id = $bdd->lastInsertId();

				//INSERT DATA FOR NEW USER ADDRESS
				$req = $bdd->prepare('INSERT INTO clients_adresses (
					civilite,
					nom,
					prenom,
					adresse1,
					cp,
					ville,
					rid_pays,
					tel,
					portable,
					rid_client
				) VALUES (
					:civilite,
					:nom,
					:prenom,
					:adresse1,
					:cp,
					:ville,
					:rid_pays,
					:tel,
					:portable,
					:rid_client
				)');

				$req->execute(array(
					'civilite'   => $gender,
					'nom'        => $last_name,
					'prenom'     => $first_name,
					'adresse1'   => $address,
					'cp'         => $zip,
					'ville'      => $city,
					'rid_pays'   => $country,
					'tel'        => $phone,
					'portable'   => $mobile,
					'rid_client' => $id
				));

				//SEND MAIL TO A NEW USER
				$to = $mail;
				$subject = "Ironova | Registration success";
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
					<h1>Welcome to Ironova</h1>
					<p>Hey, we welcome you among us <span>".$first_name."</span><p>
					<p class='little'>Pour être sur de recevoir nos prochaines news, ajoutez l'email <a href='mailto:support@ironova.com'>support@ironova.com</a> dans votre liste d'expéditeurs autorisés. Si cet email ne s'affiche pas correctement, consultez la version en ligne.
					</p>
				</body>
				</html>
				";
				$headers = "MIME-Version: 1.0"."\n";
				$headers .= "Content-type:text/html;charset=UTF-8"."\n";
				$headers .= 'From: <support@ironova.com>'."\n";

				mail($to,$subject,$body,$headers);

				//OUTPUT SUCCESS REGISTER
				echo 1;

			}else{

				//OUTPUT ERROR REGISTER
				echo 2;

			}

		}else{

			//OUTPUT ERROR REGISTER
			echo 3;

		}

	}else{

		//OUTPUT ERROR REGISTER
		echo 4;

	}
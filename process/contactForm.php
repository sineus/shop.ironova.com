<?php
	//CONTACT PROCESS
	// CONNECT BDD
	include('bdd.php');

	// RECOVERED DATA
   	$postData = file_get_contents("php://input");
	$request = json_decode($postData, true);
	$first_name = $request['first_name'];
	$last_name = $request['last_name'];
	$company = $request['company'];
	$address = $request['address'];
	$state = $request['state'];
	$zip_code = $request['zip_code'];
	$city = $request['city'];
	$mail = $request['mail'];
	$phone = $request['phone'];
	$message = $request['message'];

	// // DATA OUTPUT
	if(isset($first_name) && isset($last_name) && isset($mail) && isset($message)){
		echo 'Thank you, your request has been sent';

		// MAIL SUPPORT
		$to = "support@ironova.com";
		// $to = "kubler.david.esdac@gmail.com";
		$subject = "Support Ironova";
		$body = '
		<html>
		<head>
		<title></title>
		<style>
			h1{
				color:#1E1E1E!important;
				text-transform:uppercase!important;
				font-size:25px!important;
			}
			h5{
				color:#1E1E1E!important;
				text-transform:uppercase!important;
				font-size:16px!important;
			}
			.label-text{
				
			}
		</style>
		</head>
		<body>
		<h1>HI, IRO USER NEED HELP</h1>
		<h5>USER INFORMATION</h5>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">First name</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$first_name.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Last name</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$last_name.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Company</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$company.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Address</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$address.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">State</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$state.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Zip code</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$zip_code.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">City</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$city.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Email</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$mail.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Phone</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$phone.'</p>
		<br>
		<h5>USER QUESTION</h5>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$message.'</p>
		</body>
		</html>
		';
		$headers = "MIME-Version: 1.0"."\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\n";
		$headers .= 'From: <support@ironova.com>'."\n";

		mail($to,$subject,$body,$headers);

		// MAIL USER
		$to = $mail;
		$subject = "Support Ironova // Question";
		$body = '
		<html>
		<head>
		<title></title>
		<style>
			h1{
				color:#1E1E1E!important;
				text-transform:uppercase!important;
				font-size:25px!important;
			}
			h5{
				color:#1E1E1E!important;
				text-transform:uppercase!important;
				font-size:16px!important;
			}
			.label-text{
				
			}
		</style>
		</head>
		<body>
		<p style="color:#989898!important;padding-bottom:20px!important">Hi '.$last_name.', Your message was well received and will be processed shortly</p>
		<h5>YOUR INFORMATION</h5>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">First name</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$first_name.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Last name</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$last_name.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Company</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$company.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Address</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$address.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">State</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$state.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Zip code</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$city.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">City</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$city.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Email</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$mail.'</p>
		<p style="color:#1E1E1E!important;text-transform:uppercase!important;font-size:14px!important;">Phone</p>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$phone.'</p>
		<br>
		<h5>YOUR QUESTION</h5>
		<p style="color:#989898!important;padding-bottom:20px!important">'.$message.'</p>
		</body>
		</html>
		';
		$headers = "MIME-Version: 1.0"."\n";
		$headers .= "Content-type:text/html;charset=UTF-8"."\n";
		$headers .= 'From: <support@ironova.com>'."\n";

		mail($to,$subject,$body,$headers);
	}else{
		echo 'Oh sorry, verify your form';
	}
?>
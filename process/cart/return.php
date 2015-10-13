<?php
	include('bdd.php');

	$req = $bdd->prepare("INSERT INTO salt (pass) VALUES('123ABC')");
	$req->execute();
	// //CREATE LOG FILE
	// //PRODUCTION
	// // $logfile = "/home/users/ironova/log_banque/log_".$_POST['vads_order_id'].'_'.date('Y-m-d_H-i-s').".txt";
	// //TEST
	// $logfile = " /Applications/MAMP/shop.ironova.com/log_bank/log_".$_POST['vads_order_id'].'_'.date('Y-m-d_H-i-s').".txt";
	// //OPEN THIS
	// $flog    = fopen($logfile, "a");
	// //KEY
	// $key     = "5375460506629784"; //3856325456523786
	// //SIGNATURE
	// $contenu_signature = "";
	// //METHOD
	// $params  = $_POST;
	// //SORT PARAMS BY ALPHABET
	// ksort($params);
	// //WRITE PARAMS IN LOG FILE
	// foreach ($params as $nom => $valeur){

	// 	fwrite($flog, $nom." : ".$valeur."\n");

	// 	if(substr($nom,0,5) == 'vads_'){

	// 		$contenu_signature .= $valeur."+";

	// 	}

	// }
	// //ADD CERTIFICATE AT END
	// $contenu_signature .= $key;

	// //CRYPT SIGNATURE
	// $signature_calculee = sha1($contenu_signature);

	// //WRITE CALCULATE SIGNATURE
	// fwrite($flog, "signature_calculee : ".$signature_calculee."\n");

	// if(isset($_POST['signature']) && $signature_calculee == $_POST['signature']){

	// 	//WRITE IF SIGNATURE IS OK
	// 	fwrite($flog, "signature ok : ".date("Y-m-d H:i:s")."\n");
	// 	$id_commande = $_POST['vads_order_id'];

	// 	//SELECT CLIENT DATABASE WITH ORDER ID
	// 	$req = $bdd->prepare("SELECT co.*, cl.email, cl.civilite, cl.nom, cl.prenom FROM commandes co LEFT OUTER JOIN clients cl ON cl.id_client = co.rid_client WHERE co.id_commande = ?");
	// 	$req->execute(array(addslashes($id_commande)));

	// 	while($data = $req->fetch()){

	// 		//MAIL BILLING
	// 		$mail = $data["email_fact"];

	// 		//DATA SHIPPING
	// 		$s_gender = $data["civilite_livr"];
	// 		$s_nom      = $data["nom_livr"];
	// 		$s_prenom   = $data["prenom_livr"];
	// 		$s_address  = $data["adresse1_livr"];
	// 		$s_city     = $data["ville_livr"];
	// 		$s_zip      = $data['cp_livr'];
	// 		$s_country  = $data["pays_livr"];

	// 		//DATA BILLING
	// 		$b_gender = $data["civilite_fact"];
	// 		$b_nom      = $data["nom_fact"];
	// 		$b_prenom   = $data["prenom_fact"];
	// 		$b_address  = $data["adresse1_fact"];
	// 		$b_city     = $data["ville_fact"];
	// 		$b_zip      = $data['cp_fact'];
	// 		$b_country  = $data["pays_fact"];

	// 	}
		
	// 	//VERIFY IF SITE ID AND CTX MODE
	// 	if($_POST['vads_site_id'] == "73221602" && $_POST['vads_ctx_mode'] == "TEST"){ //PRODUCTION

	// 		//VERIFY RESULT SUCCESS = 00
	// 		if($_POST['vads_result'] == "00"){

	// 			//WRITE ON LOG FILE 
	// 			fwrite($flog, "paiement validé : ".date("Y-m-d H:i:s")."\n");

	// 			//UPDATE DATABASE ORDER
	// 			$req = $bdd->prepare("UPDATE commandes SET paiement=1, date_paie=NOW() WHERE id_commande = ?");
	// 			$req->execute(array(addslashes($id_commande)));
				
	// 			//SEND MAIL TO CUSTOMER
	// 		    $to .= $mail;
	// 		    //SUBJECT
	// 		    $subject = 'Ironova | Votre commande n°'.$id_commande;
	// 		    //MESSAGE
	// 		    $message = '
	// 		    <html>
	// 		      	<head>
	// 		       		<title>Ironova</title>
	// 		      	</head>
	// 		      	<body>
	// 		       		<b>Hi '.$prenom.',</b>
	// 		       		<p>Thanks for your order! If you want to track the status of your order looks on <a href="http://shop.ironova.com/account" target="_blank">shop.ironova.com/account</a></p>
	// 		       		<br>
	// 		       		<table>
	// 		       	  		<tbody>
	// 		       	  			<tr>
	// 		       	  		   		<td>
	//  								 	<b>We\'re shipping to:</b>
	//  								 	<br>
	//  								 	<p>'.$s_gender.' '.$s_prenom.' '.$s_nom.'</p>
	//  								 	<p>'.$s_address.' '.$s_zip.'</p>
	//  								 	<p>'.$s_city.', '.$s_country.'</p>
	// 		       	  		   		</td>
	// 		       	  		   		<td>
	//  								 	<b>And billing:</b>
	//  								 	<br>
	//  								 	<p>'.$b_gender.' '.$b_prenom.' '.$b_nom.'</p>
	//  								 	<p>'.$b_address.' '.$b_zip.'</p>
	//  								 	<p>'.$b_city.', '.$b_country.'</p>
	// 		       	  		   		</td>
	// 	       	  				</tr>
	// 		       	  			<tr>
	// 		       	  				<b>Here are the products you ordered</b>
	// 		       	  			</tr>
	// 		       	  			<tr>
	// 		       	  				...
	// 		       	  			</tr>
	// 		       	  		</tbody>
	// 		  			</table>
	// 		      	</body>
	// 		    </html>
	// 		    ';

	// 		    //IMPORTANT HEADER FOR HTML MAIL
	// 		    $headers  = 'MIME-Version: 1.0' . "\r\n";
	// 		    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// 		    //HEADER FACULTATIF
	// 		    $headers .= 'To: '.$nom.' <'.$mail.'>' . "\r\n";
	// 		    $headers .= 'From: Ironova <support@ironova.com>' . "\r\n";

	// 		     //SEND MAIL FUNCTION
	// 		     mail($to, $subject, $message, $headers);
			
	// 		}else{
	// 			//WRITE CANCEL PAYMENT
	// 			fwrite($flog, "paiement annulé : ".date("Y-m-d H:i:s")."\n");
	// 			//UPDATE PAYMENT STATUS // 1 = SUCCESS, 2 = ERROR
	// 			$req = $bdd->prepare("UPDATE commandes SET paiement=2 WHERE id_commande = ?");
	// 			$req->execute(array(addslashes($id_commande)));
				
	// 			//WITH ORDER ID RETRIEVE PRODUCT ORDERED (ID + QUANTITY);
	// 			$req = $bdd->prepare("SELECT qte, id_produit FROM commandes_line WHERE rid_commande = ?");
	// 			$req->execute(array(addslashes($id_commande)));

	// 			//RETRIEVE 
	// 			while($data = $req->fetch()){

	// 				$req = $bdd->prepare("SELECT stock FROM produits WHERE id_prod = ?");
	// 				$req->execute(array($data['id_produit']));

	// 				$data2 = $req->fetchAll();

	// 				$req = $bdd->prepare("UPDATE produits SET stock=".($data2['stock']+$data['qte'])." WHERE id_prod = '".$data['id_produit']."'");
	// 				$req->execute();

	// 				// fwrite($flog, "requete stock : ".$sql."\n");

	// 			}
	// 		}
	// 	}else{
	// 		fwrite($flog, "mauvais vads_site_id ou vads_ctx_mode: ".date("Y-m-d H:i:s")."\n");
	// 	}
	// }else{
	// 	fwrite($flog, "signature nok : ".date("Y-m-d H:i:s")."\n");
	// }
	// fclose($flog);
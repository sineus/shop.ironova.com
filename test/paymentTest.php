<?php
	//** CONNECT BDD
	$host = 'ironovacmo2015.mysql.db';
	$name = 'ironovacmo2015';
	$user = 'ironovacmo2015';
	$psw = 'RPzaYCjhEFUR';

	try{
	   	$bdd = new PDO('mysql:host='.$host.';dbname='.$name, $user, $psw);
	    $bdd->exec("SET CHARACTER SET utf8");
	}
	catch(Exception $e){
	    die('Erreur : '.$e->getMessage());
	}
	date_default_timezone_set('UTC');

	// RETRIEVE DATA OF PAYMENT STEPS
   	$postData = file_get_contents("php://input");
	$request = json_decode($postData, true);

	$rid_client    = ; 
	$total         = ;
	$date_com      = ;
	$date_paie     = ;
	$email_fact    = ;
	$civilite_fact = ;
	$nom_fact      = ;
	$prenom_fact   = ;
	$societe_fact  = ;
	$adresse1_fact = ;
	$cp_fact       = ;
	$ville_fact    = ;
	$pays_fact     = ;
	$tel_fact      = ;
	$portable_fact = ;
	$civilite_livr = ;
	$nom_livr      = ;
	$prenom_livr   = ;
	$societe_livr  = ;
	$adresse1_livr = ;
	$cp_livr       = ;
	$ville_livr    = ;
	$pays_livr     = ; 
	$tel_livr      = ; 
	$portable_livr = ;
	

	//**INSERT ORDER INFO
	$req = $bdd->prepare('INSERT INTO commandes (
		rid_client, 
		total, 
		date_com, 
		date_paie, 
		email_fact,
		civilite_fact,
		nom_fact,
		prenom_fact,
		societe_fact,
		adresse1_fact,
		cp_fact,
		ville_fact,
		pays_fact,
		tel_fact,
		portable_fact,
		civilite_livr,
		nom_livr,
		prenom_livr,
		societe_livr,
		adresse1_livr,
		cp_livr,
		ville_livr,
		pays_livr,
		tel_livr,
		portable_livr
	) VALUES(
		:rid_client, 
		:total, 
		:date_com, 
		:date_paie, 
		:email_fact,
		:civilite_fact,
		:nom_fact,
		:prenom_fact,
		:societe_fact,
		:adresse1_fact,
		:cp_fact,
		:ville_fact,
		:pays_fact,
		:tel_fact,
		:portable_fact,
		:civilite_livr,
		:nom_livr,
		:prenom_livr,
		:societe_livr,
		:adresse1_livr,
		:cp_livr,
		:ville_livr,
		:pays_livr,
		:tel_livr,
		:portable_livr
		)
	');

	$req->execute();

	//**RETRIEVE ID AND LANG OF ORDER
	$id = $bdd->lastInsertId();
	$langue = 'fr';

	//**SELECT ALL DATA OF ORDER WITH ID
	$req = $bdd->prepare('SELECT * FROM commandes WHERE id_commande = ?');
	$req->execute(array($id));

	//**RETRIEVE DATA OF RODER
	while($data = $req->fetch()){
		$id_commande = $data["id_commande"];
		$total2 = $data["total"];
		$email = $data['email_fact'];
	}

	//**KEY FOR API
	$key = "3856325456523786"; //TEST: 3856325456523786 //PRODUCTION: 5375460506629784
	//**INITIALIZE PARAMS ARRAY FOR FORM
	$params = array();
	//**ID OF WEBSITE
	$params['vads_site_id'] = "73221602";
	//**AMOUNT OF ORDER
	$params['vads_amount'] = 100*(round($total2, 2)); // IN CENTS EX: 10€ = 1000
	//**CURRENCY OF ORDER IN ISO 4217
	$params['vads_currency'] = (($langue == "us") ? "840" : "978");
	//**LANGUAGE OF ORDER
	$params['vads_language'] = (($langue == "us") ? "en" : "fr");
	//**AVAILABLE LANGUAGE FOR THE ORDER
	$params['vads_available_languages'] = "fr;en";
	//**API MODE
	$params['vads_ctx_mode'] = "TEST"; //TEST //PRODUCTION
	//**ACTION FOR ACHIEVE
	$params['vads_page_action'] = "PAYMENT";
	//**ACQUISITION MODE FOR DATA CART
	$params['vads_action_mode'] = "INTERACTIVE"; // saisie de carte réalisée par la plateforme
	//**TYPE OF PAYMENT
	$params['vads_payment_config']= "SINGLE"; //SINGLE OR MULTI
	//**VERSION OF PROTOCOL EXCHANGE
	$params['vads_version'] = "V2";
	//**URL OF WEBSITE
	$params['vads_shop_url'] = $url_site;
	//**DIFFERENT CALLBACK PAGE
	$params['vads_url_cancel'] = $url_site."/ko.php";
	$params['vads_url_error'] = $url_site."/ko.php";
	$params['vads_url_referral'] = $url_site."/ko.php";
	$params['vads_url_refused'] = $url_site."/ko.php";
	$params['vads_url_success'] = $url_site."/ok.php";
	//**GENERATE CURRENT TIME
	$ts = time();
	//**DATE AND HOUR OF TRANSACTION
	$params['vads_trans_date'] = gmdate("YmdHis", $ts);
	//**TRANSACTION ID
	$trans_id = sprintf("%06d",$id_commande);
	$params['vads_trans_id'] = $trans_id;
	//**ORDER ID
	$params['vads_order_id'] = $id_commande;
	//**MAIL FOR CUSTOMER
	$params['vads_cust_email'] = $email;
	//SORT GLOBAL PARAMS BY ALPHABET
	ksort($params);
	//**INITIALIZE SINATURE VAR
	$contenu_signature = "";
	//**BUILD SIGNATURE WITH PARAMS
	foreach ($params as $nom => $valeur){
		$contenu_signature .= $valeur."+";
	}
	//**ADD KEY API AT ENDING
	$contenu_signature .= $key;
	//**MAKE SHA1 ON GLOBAL SIGNATURE AND ADD TO PARAMS
	$params['signature'] = sha1($contenu_signature);

	//**GENERATE PAYMENT FORM FOR GO TO SYSTEMPAY URL
	?>
	<form name="paiement_banque" method="POST" action="https://systempay.cyberpluspaiement.com/vads-payment/">
	<?php
		foreach($params as $nom => $valeur){
		//GENERATE ALL INPUT WITH PARAMS ARRAY
			echo '<input type="hidden" name="' . $nom . '" value="' . $valeur . '" />';
		}
	?>
			<!--<p class="sous_t" style="text-align:center;"><strong><?=$PAIEMENT_PAR_CB?></strong></p>-->
		<input type="submit" name="payer" value="Payer" class="btn_bleu_form" style="margin-left:420px;"/>
  	</form>
	<script type="text/javascript">
	//SUBMIT ALL PARAMS INPUT TO SYSTEMPAY API
	document.paiement_banque.submit();
	</script>
<?php
	//CONNECT BDD
	include('bdd.php');

	//ALL JSON ANGULAR DATA
	$postData = file_get_contents("php://input");
	$data = json_decode($postData, true);

	//USER ID AND MAIL
	$userID = $data['user']['id'];
	$userLogin = $data['user']['login'];
	$userLang = strtolower($data['user']['country']);

	if($userLang != 'fr'){
		$userLang = 'en';
	}

	//BILLING ADDRESS
	$b_gender     = $data['billing']['gender'];
	$b_first_name = $data['billing']['first_name'];
	$b_last_name  = $data['billing']['last_name'];
	$b_address    = $data['billing']['address'];
	$b_zip        = $data['billing']['zip'];
	$b_phone      = $data['billing']['phone'];
	$b_city       = $data['billing']['city'];
	$b_country    = $data['billing']['country'];

	//SHIPPING ADDRESS
	$s_gender     = $data['shipping']['gender'];
	$s_first_name = $data['shipping']['first_name'];
	$s_last_name  = $data['shipping']['last_name'];
	$s_address    = $data['shipping']['address'];
	$s_zip        = $data['shipping']['zip'];
	$s_phone      = $data['shipping']['phone'];
	$s_city       = $data['shipping']['city'];
	$s_country    = $data['shipping']['country'];

	//CONTENT CART
	$contentCart = $data['contentCart'];

	//TOTAL ORDER
	$total = $data['total'];

	//PAYMENT TYPE
	$type_payment = $data['type_payment'];

	//CURRENT DATE
	$today = date("Y-m-d H:i:s"); 

	//INSERT DATA ORDER
	$req = $bdd->prepare('INSERT INTO commandes (
		rid_client, 
		total, 
		date_com, 
		type_paiement,
		email_fact,
		civilite_fact,
		nom_fact,
		prenom_fact,
		adresse1_fact,
		cp_fact,
		ville_fact,
		pays_fact,
		tel_fact,
		portable_fact,
		civilite_livr,
		nom_livr,
		prenom_livr,
		adresse1_livr,
		cp_livr,
		ville_livr,
		pays_livr,
		tel_livr,
		portable_livr,
		new
	) VALUES(
		:rid_client, 
		:total, 
		:date_com, 
		:type_payment,
		:email_fact,
		:civilite_fact,
		:nom_fact,
		:prenom_fact,
		:adresse1_fact,
		:cp_fact,
		:ville_fact,
		:pays_fact,
		:tel_fact,
		:portable_fact,
		:civilite_livr,
		:nom_livr,
		:prenom_livr,
		:adresse1_livr,
		:cp_livr,
		:ville_livr,
		:pays_livr,
		:tel_livr,
		:portable_livr,
		:new
	)');

	$req->execute(array(
		'rid_client'    => $userID, 
		'total'         => $total, 
		'date_com'      => $today,
		'type_payment'  => $type_payment, 
		'email_fact'    => $userLogin,
		'civilite_fact' => $b_gender,
		'nom_fact'      => $b_last_name,
		'prenom_fact'   => $b_first_name,
		'adresse1_fact' => $b_address,
		'cp_fact'       => $b_zip,
		'ville_fact'    => $b_city,
		'pays_fact'     => $b_country,
		'tel_fact'      => $b_phone,
		'portable_fact' => $b_phone,
		'civilite_livr' => $s_gender,
		'nom_livr'      => $s_last_name,
		'prenom_livr'   => $s_first_name,
		'adresse1_livr' => $s_address,
		'cp_livr'       => $s_zip,
		'ville_livr'    => $s_city,
		'pays_livr'     => $s_country,
		'tel_livr'      => $s_phone,
		'portable_livr' => $s_phone,
		'new'           => 1
	));

	//RETRIEVE ID AND LANG OF ORDER
	$id = $bdd->lastInsertId();

	//SELECT ALL DATA OF ORDER WITH ID
	$req = $bdd->prepare('SELECT * FROM commandes WHERE id_commande = ?');
	$req->execute(array($id));

	//RETRIEVE DATA OF RODER
	while($data = $req->fetch()){

		$id_commande = $data["id_commande"];
		$total2      = $data["total"];
		$email       = $data['email_fact'];

	}

	//INSERT ITEMS CART
	foreach($contentCart as $value => $data){
		$req = $bdd->prepare('INSERT INTO commandes_line (
			rid_commande,
			prix,
			prix_ex,
			qte,
			id_produit,
			nom_produit,
			tva,
			path_img,
			edition
		) VALUES(
			:rid_commande,
			:prix,
			:prix_ex,
			:qte,
			:id_produit,
			:nom_produit,
			:tva,
			:path_img,
			:edition
		)');

		$req->execute(array(
			'rid_commande' => $id,
			'prix'         => $data['total'],
			'prix_ex'      => $data['price'],
			'qte'          => $data['quantity'],
			'id_produit'   => $data['id'],
			'nom_produit'  => $data['name'],
			'tva'          => (($b_country != 'FR') ? '0' : '0.2'),
			'path_img'     => $data['img'],
			'edition'      => $data['edition']
		));
	}

	$url_site = 'http://shop.ironova.com';

	//KEY FOR API
	$key = "3856325456523786"; //TEST: 3856325456523786 //PRODUCTION: 5375460506629784
	//INITIALIZE PARAMS ARRAY FOR FORM
	$params = array();
	//ID OF WEBSITE
	$params['vads_site_id'] = "73221602";
	//AMOUNT OF ORDER
	$params['vads_amount'] = 100*(round($total2, 2)); // IN CENTS EX: 10€ = 1000
	//CURRENCY OF ORDER IN ISO 4217
	$params['vads_currency'] = ($userLang != 'fr') ? '840' : '978';
	//LANGUAGE OF ORDER
	$params['vads_language'] = $userLang;
	//AVAILABLE LANGUAGE FOR THE ORDER
	$params['vads_available_languages'] = "fr;en;es;de;zh;it;ja;nl;pl;pt;ru;sv;tr";
	//API MODE
	$params['vads_ctx_mode'] = "TEST"; //TEST //PRODUCTION
	//ACTION FOR ACHIEVE
	$params['vads_page_action'] = "PAYMENT";
	//ACQUISITION MODE FOR DATA CART ON BANK PLATEFORM
	$params['vads_action_mode'] = "INTERACTIVE";
	//TYPE OF PAYMENT
	$params['vads_payment_config'] = "SINGLE"; //SINGLE OR MULTI
	//TYPE OF CARD
	$params['vads_payment_cards'] = $type_payment;
	//VERSION OF PROTOCOL EXCHANGE
	$params['vads_version'] = "V2";
	//URL OF WEBSITE
	$params['vads_shop_url'] = $url_site;
	//DIFFERENT CALLBACK PAGE
	//URL FOR REDIRECT CUSTOMER AFTER PUSH ON CANCEL AND RETURN SHOP BEFORE PAYMENT
	$params['vads_url_cancel']   = $url_site."/error-cart";
	//URL FOR REDIRECT CUSTOMER IF PLATEFORM BANK ERROR
	$params['vads_url_error']    = $url_site."/error-cart";
	// $params['vads_url_referral'] = $url_site."/error-cart";
	//URL FOR REDIRECT CUSTOMER IF PAYMENT REFUSED AFTER PUSH ON CANCEL AND RETURN SHOP
	$params['vads_url_refused']  = $url_site."/error-cart";
	//URL FOR REDIRECT CUSTOMER IF PAYMENT IS SUCCESS AFTER PUSH ON CANCEL AND RETURN SHOP
	$params['vads_url_success']  = $url_site."/success-cart";
	//CUSTOM URL FOR REDIRECT CUSTOMER AFTER PAYMENT
	$params['vads_url_return']   = $url_site."/return-cart";
	//RETURN DATA MODE
	$params['vads_return_mode']  = 'GET';
	//GENERATE CURRENT TIME
	$ts = time();
	//DATE AND HOUR OF TRANSACTION
	$params['vads_trans_date'] = gmdate("YmdHis", $ts);
	//TRANSACTION ID
	$trans_id = sprintf("%06d",$id_commande);
	$params['vads_trans_id'] = $trans_id;
	//ORDER ID
	$params['vads_order_id'] = $id_commande;
	//MAIL FOR CUSTOMER
	$params['vads_cust_email'] = $email;
	//SORT GLOBAL PARAMS BY ALPHABET
	ksort($params);
	//INITIALIZE SINATURE VAR
	$contenu_signature = "";
	//BUILD SIGNATURE WITH PARAMS
	foreach ($params as $nom => $valeur){

		$contenu_signature .= $valeur."+";

	}
	//ADD KEY API AT ENDING
	$contenu_signature .= $key;
	//MAKE SHA1 ON GLOBAL SIGNATURE AND ADD TO PARAMS
	$params['signature'] = sha1($contenu_signature);

	//GENERATE PAYMENT FORM FOR GO TO SYSTEMPAY URL
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






	
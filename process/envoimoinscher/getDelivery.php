<?php
	include('../bdd.php');
	include_once('config.api.php');

	//RETRIEVE ADDRESS DATA
	$address = json_decode($_GET['billing']);

	//RETRIEVE PRODUCTS DATA
	$product = json_decode($_GET['product']);

	//DEBUG PRODUCTS
	// var_dump($product);

	//FIND PRODUCTS ID
	foreach($product as $key){

		//STORE ALL ID
		$id = $key->id;

		//SELECT ALL PRODUCT DATA WITH ID
		$req = $bdd->prepare('SELECT * FROM product WHERE id_product = ?');
		$req->execute(array($id));

		//FIND ALL PRODUCTS PARAMETERS
		while($product = $req->fetch()){

			//STORE ALL PARAMETERS
			$weight   = $product['weight'];
			$depth    = $product['depth'];
			$width    = $product['width'];
			$height   = $product['height'];
			$category =	$product['id_category'];

		}

		//MAKE TOTAL OF ALL PRODUCTS PARAMETERS
		$t_weight += $weight;
		$t_depth  += $depth;
		$t_width  += $width;
		$t_height += $height;

		//CATEGORY: SIMPLE FOR SAME OBJECTS
		$productCategory = $category;

		//CATEOGRY: ADVANCED FOR MULTIPLE OBJECTS
		// $productCategory[] = $category;

		//TOTAL ALL PRODUCTS
		$t_product += $key->total;

	}

	//TEST TOTAL ALL PRODUCTS
	// echo json_encode($t_weight).'<br>';
	// echo json_encode($t_depth).'<br>';
	// echo json_encode($t_width).'<br>';
	// echo json_encode($t_height).'<br>';

	//FROM //IRONOVA ADDRESS
	// $cp_from = $data['cp_from'];
	// $city_from = $data['city_from'];
	// $country_from = $data['country_from'];

	//TO
	$zip_to = $address->zip;
	$city_to = $address->city;
	$country_to = $address->country;

	//**CALL API
	//FROM //IRONOVA ADDRESS
	$from = array(
		"pays"        => "FR", 
		"code_postal" => "13382", 
		"type"        => "particulier",
		"ville"       => "Marseille"
	);

	// //TO
	$to = array(
		"pays"        => $country_to, 
		"code_postal" => $zip_to, 
		"type"        => "particulier", //ALL CLIENTS IS PARTICULAR
		"ville"       => $city_to
	);

	//TO: DEBUG
	// $to = array(
	// 	"pays"        => "AU", 
	// 	"code_postal" => "2000", 
	// 	"type"        => "particulier",
	// 	"ville"       => "Sydney"
	// );

	//DELIVERY INFORMATION
	$quotInfo = array(
		"collecte" => date("Y-m-d"), 
		"delai" => "aucun",  
		"code_contenu" => $productCategory,
		"colis.valeur" => $t_product,
		"colis.description" => "Bracelets Iro (wearable)"
	);


	//INITIALIZE CLASS
	$cotCl = new Env_Quotation(array("user" => $userData["login"], "pass" => $userData["password"], "key" => $userData["api_key"]));
	
	//INITIALIZE FROM AND TO
	$cotCl->setPerson("expediteur", $from);
	$cotCl->setPerson("destinataire", $to);

	//INITIALIZE WORKSPACE ENVIRONMENT
	$cotCl->setEnv("test");

	//INITIALIZE TYPE OF CONTENT
	$cotCl->setType("colis", array(
			1 => array(
				"poids" => $t_weight, 
				"longueur" => $t_depth, 
				"largeur" => $t_width, 
				"hauteur" => $t_height
			)
		)
	);

	//GET QUOTATION
	$orderPassed = $cotCl->getQuotation($quotInfo); 
	
	//IF NOT CURL ERROR
	if(!$cotCl->curlError){ 
		
		print_r($pointCl->respErrorsList);
  		
  		//IF NOT REQUEST ERROR DISPLAY RESULT
  		if(!$cotCl->respError) {

    		$cotCl->getOffers(true);
    		echo json_encode($cotCl);

    	}else{

    		echo 'requete non valide';

    	}

    }else{

    	echo 'Erreur';

    }

<?php

    //Utilisation de la bibliothèque PHP HybridAuth pour l'authentification OAuth
    // Récupération des clés LinkedIn disponible dans le réseau développeurs LinkedIn

	require_once 'vendor/autoload.php';
	 
	$config = [
	    'callback' => 'http://10.0.10.139/wp-admin',// redirect_uri
	    'keys'     => [
	                    'id' => '786y6cmy0v69rl', //Client_id 
	                    'secret' => 'dQBCgKRk1LfNR7kq' // Client_Secret
	                ],
	    'scope'    => 'r_liteprofile r_emailaddress',
	];
	 
	$adapter = new HybridauthProviderLinkedIn( $config );
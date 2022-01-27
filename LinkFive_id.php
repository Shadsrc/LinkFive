<?php

	// Vérifie si le protocole HTTP ou HTTPS est activé par le serveur 

	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
	{
		$url = "https://";
	}
	else
	{
		$url = "http://"; 
	} 

	$callback = $url.$_SERVER['SERVER_NAME'].'/wp-content/plugins/PluginLinkedIn/src/callback.php';  // redirect_uri
	$Client_id ='786y6cmy0v69rl';															  	    // Client_id
	$Client_secret = 'dQBCgKRk1LfNR7kq'; 													       // Client_secret
	$scope = 'r_liteprofile%20r_emailaddress%20w_member_social';						          // Demande de Permission



?>
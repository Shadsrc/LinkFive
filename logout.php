<?php
	// Déconnecte l'utilisateur de LinkedIn et le ramène à la page initial
	require_once 'config.php';
	 
	try {

	    if ($adapter->isConnected()) {
	        $adapter->disconnect();
	        echo 'Logged out the user';
	        echo '<p><a href="includes/wplf-first-page.php">Login</a></p>';

	    }
        
	}catch( Exception $e ){

	    echo $e->getMessage() ;

	}
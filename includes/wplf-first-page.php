<?php

    if(file_exists( __DIR__.'/../src/body.json')){
        
        require 'if_Connect.php'; 
        

    }else{

        require 'if_NotConnect.php';
    }
    
?>





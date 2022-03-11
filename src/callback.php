<?php
require __DIR__.'/function_api_Linkedin.php';

    $code_linkedin = $_GET ['code'];

    try{

    $jsonBodyToken = getToken($code_linkedin);
    file_put_contents('body.json',$jsonBodyToken);

    /*$jsonBodyId = getId();
    file_puts_content('bodyId.json',$jsonBodyId);
        var_dump($jsonBodyId);
    $jsonBodyEmail = getEmail();
    file_puts_content('bodyEmail.json',$jsonBodyEmail);
    */

    }

    catch(Exception $e){
        echo "Erreur : " . (string) $e->getMessage();
    }

  
        
    header('Location: '.$url.$_SERVER['SERVER_NAME'].'/wp-admin/admin.php?page=PluginLinkedIn%2Fincludes%2Fwplf-first-page.php');
    exit();
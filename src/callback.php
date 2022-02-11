<?php 
require __DIR__.'/function_api_Linkedin.php';

    $code_linkedin = $_GET ['code'];

    try{

        var_dump(getToken($code_linkedin));

    }catch(Exception $e){

        echo "Erreur : " . $e->getMessage();

    }
    
        var_dump(getToken($code_linkedin));

        getId();
        getEmail();

    
    /*header('Location: '.$url.$_SERVER['SERVER_NAME'].'/wp-admin/admin.php?page=PluginLinkedIn%2Fincludes%2Fwplf-first-page.php');
    exit();
    */

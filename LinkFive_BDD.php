<?php require __DIR__.'/../LinkFive_id.php';
      require __DIR__.'/../callback.php';
      require __DIR__.'/../wplf-first-page.php';

        // Connexion à MySQL

    try{
        $connection=mysqli_connect("localhost", "root", "Userstagetec6", "db_wp");

        } catch (Exception $e){
            echo 'connection impossible : '.$e->getMessage();
        }

        //Ajout des valeurs du type identifiant et code de l'application LinkedIn puis de l'utilisateur
        
    $AjouteTableApp="INSERT INTO linkfive_app_bdd (client_id, client_secret) VALUES ('$Client_id','$Client_secret')" ;
    $AjouteTableUser="INSERT INTO linkfive_user_bdd (unique_state, code_linkedin, final_token_acces) VALUES ('$unique_state','$code_linkedin','$Token_LinkedIn')";



?> 
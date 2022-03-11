<?php require __DIR__.'/../LinkFive_id.php';
      require __DIR__.'/../callback.php';
      require __DIR__.'/../if_NotConnect.php';

      try{
          
          //Connexion à la base de données

          $conn = new PDO("mysql:host=$servername", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          

          //Création de la table côté Application

            $reqAPP = "CREATE TABLE linkfive_app_bdd(

                client_id VARCHAR(255) PRIMARY KEY,
                client_secret VARCHAR(255)
            
            )";

            $conn->exec($reqAPP);

          //Création de la table côté utilisateur

            $reqUSER = "CREATE TABLE linkfive_user_bdd(
    
                unique_state VARCHAR(255) PRIMARY KEY,
                code_LinkedIn VARCHAR(255),
                Token_LinkedIn VARCHAR(255)
                
            )";

            $conn->exec($reqUSER);
          
      }
      
      catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
      }

        //Ajout des valeurs du type identifiant et code de l'application LinkedIn puis de l'utilisateur
        
    $AjouteTableApp="INSERT INTO linkfive_app_bdd (client_id, client_secret) VALUES ('$Client_id','$Client_secret')" ;
    $AjouteTableUser="INSERT INTO linkfive_user_bdd (unique_state, code_linkedin, final_token_acces) VALUES ('$unique_state','$code_linkedin','$Token_LinkedIn')";



?> 
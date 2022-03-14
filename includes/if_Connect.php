<?php
    
    require __DIR__.'/../src/function_api_Linkedin.php';

    //récupération des Identifiants et de la photo de profil
    $jsonId = json_decode(getId(), true);
    
    $firstN = $jsonId['firstName']['localized']['fr_FR'];
    $LastN = $jsonId['lastName']['localized']['fr_FR'];
    $picture = $jsonId['profilePicture']['displayImage~']['elements'][0]['identifiers'][0]['identifier'];

    //Récupération de l'adresse mail
    $jsonEmail = json_decode(getEmail(),true);
    $email = $jsonEmail['elements'][0]['handle~']['emailAddress'];

    //récuperation des postes
    $jsonPosts = json_decode(getPosts(),true);
    $url = $jsonPosts['content']['contentEntities'][0]['entity']['entityLocation'];
    $text = $jsonPosts['content']['description'];
    

?>
 
 <!DOCTYPE html>
<html lang="fr">

<html>
    <head>
        <!-- feuille de style CSS -->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="wp-content/plugins/PluginLinkedIn/assets/css/styleLinkFiveLogin.css"/>

        <!-- Police d'écriture -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700&display=swap" rel="stylesheet">
        
        <?php wp_head(); ?>

    </head>

    <body>

     <?php include(__DIR__."/../LinkFive_id.php"); ?>

        <div class="wrap">
            
            <h1 class="title_LF">L__kFive</h1>
            <img class ="img_Profile" src = <?php echo $picture; ?>>
            <p class="txt_Welcome">Bienvenue <?php echo $LastN." ".$firstN;?> </p>
            
            <p class="txt_Email"><?php echo $email; ?> </p>
           
            <!-- Permet de générer un code unique pour identifier l'utilisateur -->
            <?php $unique_state = bin2hex(random_bytes(16)); ?>
            
            <!-- Bouton login pour la connection à linkedIn -->
            <a class = "buttonLogin" href="">
                <input type="button" value="Se déconnecter">
            </a>

            <p class ="txt_ShortC"><?php echo $url; ?></p>
           
               
        </div>
    </body>
</html>


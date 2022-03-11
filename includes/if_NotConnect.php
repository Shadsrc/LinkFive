<!DOCTYPE html>
<html lang="fr">

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="wp-content/plugins/PluginLinkedIn/assets/css/styleLinkFive.css"/>

        <!--Police d'écriture -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700&display=swap" rel="stylesheet">
        
        <?php wp_head(); ?>

    </head>

    <body>

     <?php include(__DIR__."/../LinkFive_id.php"); ?>

        <div class="wrap">
            
            <h1 class="title_LF">L__kFive</h1>
            <p class="txt_Welcome">Bienvenue sur LinkFive ! Cliquez sur le bouton Login pour vous connecter a LinkedIn</p>
           
            <!--Permet de générer un code unique pour identifier l'utilisateur-->
            <?php $unique_state = bin2hex(random_bytes(16)); ?>
            
            <!--Bouton login pour la connection à linkedIn-->
            <a class = "buttonLogin" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=<?php echo $Client_id; ?>&redirect_uri=<?php echo $callback; ?>&state=<?php echo $unique_state; ?>&scope=<?php echo $scope; ?> " target = "_blank">
                <input type="button" value="Se connecter">
            </a>

               
        </div>
    </body>
</html>
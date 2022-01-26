<!DOCTYPE html>
<html lang="fr">

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="wp-content/plugins/PluginLinkedIn/assets/css/styleLinkFive.css"/>

        <!--Police d'écriture -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500;700&display=swap" rel="stylesheet">

        <!--Script js -->
        <script src="/PluginLinkedIn/assets/js/JS-LinkFive.js" type = "text/javascript"></script>

        <?php wp_head(); ?>
        <?php include("LinkFive_id.php"); ?>
    </head>

    <body>

        <div class="wrap">
            
            <h1 class="title_LF">L__kFive</h1>
            <p class="txt_Welcome">Bienvenue sur LinkFive ! Cliquez sur le bouton Login pour vous connecter a LinkedIn</p>
           
            <!--Bouton login pour la connection à linkedIn-->
            <a class = "buttonLogin" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=".$Client_id."&redirect_uri=".$callback."&state=foobar&scope=".$scope  target = "_blank">
                <input type="button" value="Login">
            </a>
               
        </div>
    </body>
</html>



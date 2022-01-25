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
    </head>

    <body>

        <div class="wrap">
            
            <h1 class="title_LF">L__kFive</h1>
            <p class="txt_Welcome">Bienvenue sur LinkFive ! Cliquez sur le bouton Login pour vous connecter a LinkedIn.</p>
           
            <!--Bouton login pour linkedIn-->
            <a class = "buttonLogin" href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=786y6cmy0v69rl&redirect_uri=http://10.0.10.139/wp-admin&state=foobar&scope=r_liteprofile%20r_emailaddress%20w_member_social"  target = "_blank">
                <input type="button" value="Login">
            </a>
               

        </div>

        <!--<div class = "link">

            <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:6874282166465912832" 
                allowfullscreen="" 
                title="Post intégré" 
                width="504" 
                height="390" 
                frameborder="0">
            </iframe>
            
        </div>-->

    </body>
</html>

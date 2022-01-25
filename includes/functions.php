<?php
  /*
 * Ajout du menu et du sous menu
 */

  function wplf_Add_My_Admin_Link()
  {
    add_menu_page(
      'LinkFive', // Titre de la page
      'LinkFive', // Texte sur le menu lien
      'manage_options', // requis pour voir le lien
      'PluginLinkedIn/includes/wplf-first-page.php' // Le 'slug' - Fichier utilisé lorsque que l'on clique sur le l'onglet 'LinkFive'
    );
    
  }
  function wplf_Add_My_Submenu_Link(){
    add_submenu_page(
       'PluginLinkedIn/includes/wplf-first-page.php',
       'Login','login',
       'manage_option',
       'PluginLinkedIn/includes/wplf-second-page.php'
    );
  }
  function style_LinkFive()
  {
    wp_enqueue_style ('mystyle_LinkFive', plugins_url('/PluginLinkedIn/assets/css/styleLinkFive.css')); 
  }

  function JS_scp_LinkFive()
  {
    wp_enqueue_script ('myscript_LinkFive', get_template_directory_uri (). '/js/JS-LinkFive.js', array());
  }

  // Appel du hook "action" sur admin menu, lance la fonction "wplf_Add_My_Admin_Link()"
  add_action( 'admin_menu', 'wplf_Add_My_Admin_Link' );
  add_action( 'admin_menu', 'wplf_Add_My_Submenu_Link' );
  add_action('wp_enqueue_scripts', 'style_LinkFive');
  add_action('wp_enqueue_scripts','JS_scp_LinkFive');

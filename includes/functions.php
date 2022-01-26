<?php
  /*
 * Ajout du menu et des dependances
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
  function style_LinkFive()
  {
    wp_enqueue_style ('mystyle_LinkFive', plugins_url('/PluginLinkedIn/assets/css/styleLinkFive.css')); 
  }

  function JS_scp_LinkFive()
  {
    wp_enqueue_script ('myscript_LinkFive', get_template_directory_uri (). '/js/JS-LinkFive.js', array());
  }

  // Appel du hook "add_action" pour entrer les scripts et les styles dans les dépendances Wordpress
  add_action( 'admin_menu', 'wplf_Add_My_Admin_Link' );
  add_action( 'admin_menu', 'wplf_Add_My_Submenu_Link' );
  add_action('wp_enqueue_scripts', 'style_LinkFive');
  add_action('wp_enqueue_scripts','JS_scp_LinkFive');

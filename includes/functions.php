<?php
  /*
 * Ajout du menu
 */

  function wplf_Add_My_Admin_Link()
  {
  add_menu_page(
    'LinkFive', // Titre de ma page
    'LinkFive', // Texte sur le menu lien
    'manage_options', // requis pour voir le lien
    'PluginLinkedIn/includes/wplf-first-acp-page.php' // The 'slug' - file to display when clicking the link
  );
  }

  function style_LinkFive()
  {
    wp_enqueue_style ('mystyle_LinkFive', plugins_url('/PluginLinkedIn/assets/css/style.css')); 
  }

  // Appel du hook "action" sur admin menu, lance la fonction "wplf_Add_My_Admin_Link()"
  add_action( 'admin_menu', 'wplf_Add_My_Admin_Link' );
  add_action('wp_enqueue_scripts', 'style_LinkFive');
  
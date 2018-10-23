<?php

/*

Plugin Name: Newsletter
Description: Un plugin pour le compte a rebour d un lancement de produit
Version: 0.1
Author: Tlacolley

*/
 ?>
<?php
class Newsletter_plugin{

    public function __construct(){

        register_activation_hook(__FILE__, array('Newsletter_plugin', 'install'));

    }

  public static function install()
  {
          global $wpdb;

         $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL);");


  }




}

new Newsletter_plugin();





 ?>

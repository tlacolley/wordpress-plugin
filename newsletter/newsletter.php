<?php

/*

Plugin Name: Newsletter
Description: Un plugin cree une Db newsletter et sauvegarder les emails
Version: 0.1
Author: Tlacolley

*/

class Newsletter_plugin{

    public function __construct(){

        register_activation_hook(__FILE__, array('Newsletter_plugin', 'install'));

    }

  public static function install()
  {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)");


  }




}

new Newsletter_plugin();

if(isset($_POST['inputMail']) AND isset($_POST['inputMail'])){
    $name = $_POST['inputName'];
    $mail = $_POST['inputMail'];

    $sql = "INSERT INTO newsletter_email (name, email) VALUES( '$name' , '$mail')";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}




 ?>

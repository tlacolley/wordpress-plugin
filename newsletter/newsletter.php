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
        add_action('admin_menu', array($this, "add_admin_menu"));
    }

  public static function install()
  {
        global $wpdb;

        $wpdb->query("CREATE TABLE IF NOT EXISTS newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)");


  }

  public function add_admin_menu()

  {
      add_menu_page('Newsletter_plugin', 'Newsletter', 'manage_options', 'newsletter', array($this, 'menu_html'));

  }
  public function menu_html(){

      global $wpdb;
      echo "<h1> ". get_admin_page_title() ."</h1>";
      echo "<p> Liste des inscrit a la Newsletter </p>";
      $result = $wpdb->get_results('SELECT * FROM newsletter_email');

      
      if (!empty($result)) {
                echo "<ul>Subscriber list :";
                foreach ($result as $row) {

                    echo "<li>".$row->email."</li>";
                }
                echo "</ul>";

        }
  }



}



if(isset($_POST['inputMail']) AND isset($_POST['inputMail'])){
    $name = $_POST['inputName'];
    $mail = $_POST['inputMail'];

    $sql = "INSERT INTO newsletter_email (name, email) VALUES( '$name' , '$mail')";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}



new Newsletter_plugin();

 ?>

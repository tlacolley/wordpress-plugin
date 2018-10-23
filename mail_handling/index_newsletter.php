<?php

class Index_newsletter{

  public static function install()
  {
          global $wpdb;

         $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");


  }
}
 ?>

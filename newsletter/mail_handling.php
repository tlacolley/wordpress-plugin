


<?php

function install()

{

    global $wpdb;


    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}tlacolley_newsletter_email (id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");

}



class Newsletter
{

    public function add_admin_menu()

    {
        add_menu_page('home_lauching', 'countDown Plugin', 'manage_options', 'countdown', array($this, 'menu_html'));

        add_submenu_page('zero', 'Newsletter', 'Newsletter', 'manage_options', 'zero_newsletter', array($this, 'menu_html'));

    }

}

 ?>

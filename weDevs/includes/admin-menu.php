<?php 

class weDevs_Academy_WP_Plugin_Admin_Menu{
    
    public function __construct() {
        add_action('admin_menu', array( $this,'admin_menu_function') );
    }

    public function admin_menu_function() {
        add_menu_page('Academy WP Plugin','Academy Plugin',"manage_options","wp-academy", array( $this,"academy_wp_plugin_function") );
    }

    public function academy_wp_plugin_function() {


        include_once __DIR__ ."/templates/academy-wp-plugin-menu.php";

        // echo "Academy WordPress Admin";
    }
}
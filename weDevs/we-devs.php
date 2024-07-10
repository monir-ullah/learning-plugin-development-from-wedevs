<?php

/*
* Plugin Name: weDevs
* Description: This is for learning wordpress development.
*
*/

class weDevs_Academy_WP_Plugin {

    private static $instance;

    public static function get_instance() {
        if ( ! isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    private function __construct() {
        $this->require_classes();
    }

    private function require_classes() {
        require_once __DIR__ ."/includes/admin-menu.php";

        new weDevs_Academy_WP_Plugin_Admin_Menu();
    }
}

// new weDevs_Academy_WP_Plugin();

weDevs_Academy_WP_Plugin::get_instance();
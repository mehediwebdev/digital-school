<?php
/**
 * Plugin Name: Digital School
 * Version: 1.0.0
 * Plugin URI: http://www.mehediwebdev.com/
 * Description: This is my first plugin.
 * Author: Mehedi Hasan
 * Author URI: http://www.mehediwebdev.com/
 * Requires at least: 4.0
 * Tested up to: 6.3
 * Text Domain: digital-school
 * Domain Path: /languages
 *
 */


 if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'DIGITAL_SCHOOL_VERSION', '1.0.0');
define( 'DIGITAL_SCHOOL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'DIGITAL_SCHOOL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DIGITAL_SCHOOL_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'DIGITAL_SCHOOL_PLUGIN_FILE', BASENAME( __FILE__ ) ); 

include_once DIGITAL_SCHOOL_PLUGIN_DIR . 'inc/digital-school-functions.php';

register_activation_hook(__FILE__, 'digital_school_activate');


add_action( 'admin_menu', 'digital_school_admin_menu' );
add_action( 'admin_enqueue_scripts', 'digital_school_enqueue_scripts' );
<?php
/*
Plugin Name: Pro Addons For Elementor
Plugin URI:  https://wordpress.org/plugins/pro-addons-for-elementor
Description: Pro Addons For Elementor is an essential addon for Elementor that provides the Elementor Pro features and functionality for free.
Version:     1.6.0
Author:      Wasim
Author URI:  https://wasimhere.github.io/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: pro-addons-for-elementor
Domain Path: /languages

Elementor tested up to: 3.25.3
Elementor Pro tested up to: 3.25.0
*/

if ( ! defined( 'ABSPATH' ) ) {

	exit; // Exit if accessed directly.

}


//constants
define( 'PAFE_PATH', plugin_basename( __FILE__ ) );


function pafe_init() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\PAFE_Plugin\Plugin::instance();

}

add_action( 'plugins_loaded', 'pafe_init' );


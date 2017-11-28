<?php
/**
 * Bootstrap the WordPress Version Control plugin.
 *
 * @package wordpress_version_control
 *
 * @wordpress-plugin
 * Plugin Name: WordPress Version Control
 * Plugin URI: https://github.com/dancras/wordpress-version-control
 * Description: TBD
 * Version: 0.0.1
 * Author: Daniel Howlett
 * Author URI: http://dancras.co.uk/
 * License: MIT
 */

namespace wordpress_version_control;

add_action( 'admin_notices', 'wordpress_version_control\hello_world' );

/**
 * Output a hello world notice
 */
function hello_world() {
	echo '<div class="notice notice-info"><p>Hello world</p></div>';
}

add_action( 'admin_menu', 'wordpress_version_control\add_to_settings_menu' );

/**
 * Add a link to the plugin settings.
 */
function add_to_settings_menu() {
	add_submenu_page(
		'options-general.php',
		__( 'Version Control', 'version-control-title' ),
		__( 'Version Control', 'version-control-title' ),
		'manage_options',
		'version-control',
		'wordpress_version_control\front_controller'
	);
}

/**
 * Handle all actions available to the plugin.
 */
function front_controller() {
}

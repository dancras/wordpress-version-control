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

/**
 * Temporary fixed versions list
 */
function get_versions() {
	return [
		'master',
		'feature',
	];
}

add_action( 'admin_bar_menu', 'wordpress_version_control\add_version_selector' );

add_action( 'admin_notices', 'wordpress_version_control\hello_world' );

/**
 * Output a hello world notice
 */
function hello_world() {
	echo '<div class="notice notice-info"><p>Hello world</p></div>';
}

add_action( 'admin_menu', 'wordpress_version_control\add_to_settings_menu' );

add_action( 'wp_loaded', 'wordpress_version_control\action_controller' );

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
function action_controller() {
	$version = filter_input( INPUT_GET, 'version-control', FILTER_SANITIZE_STRING );

	if ( ! empty( $version ) ) {
		update_user_option(
			get_current_user_id(),
			'version-control-selected-version',
			$version
		);
	}
}

/**
 * Handle all actions available to the plugin.
 */
function front_controller() {
}

/**
 * Add version selector to the secondary toolbar.
 *
 * @param WP_Admin_Bar $wp_admin_bar - Use to modify admin toolbar.
 */
function add_version_selector( $wp_admin_bar ) {

	$versions         = get_versions();
	$selected_version = get_selected_version();

	$node = array(
		'id'     => 'version-control-version-selector',
		'parent' => 'top-secondary',
		'title'  => "Version: $selected_version",
	);

	$wp_admin_bar->add_node( $node );

	foreach ( $versions as $version ) {

		if ( $version === $selected_version ) {
			continue;
		}

		$node = array(
			'id'     => "version-control-version-selector-$version",
			'parent' => 'version-control-version-selector',
			'title'  => "Select: $version",
			'href'   => get_select_version_url( $version ),
		);

		$wp_admin_bar->add_node( $node );

	}
}

/**
 * Get the configured option for selected version.
 *
 * @return String
 */
function get_selected_version() {
	return get_user_option( 'version-control-selected-version' ) ?: 'master';
}

/**
 * Get a url for selecting a version.
 *
 * @param String $version - The version to be selected.
 *
 * @return String
 */
function get_select_version_url( $version ) {
	return admin_url( 'index.php' ) . "?version-control=$version";
}

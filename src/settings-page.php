<?php
/**
 * Settings page for the plugin.
 *
 * @package wordpress_version_control\settings_page
 */

namespace wordpress_version_control\settings_page;

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
		'wordpress_version_control\settings_page\front_controller'
	);
}

/**
 * Handle all actions available to the plugin.
 */
function front_controller() {
}

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

require_once __DIR__ . '/notices.php';
require_once __DIR__ . '/settings-page.php';
require_once __DIR__ . '/version-selector.php';

add_action( 'admin_notices', 'wordpress_version_control\notices\hello_world' );

add_action( 'admin_menu', 'wordpress_version_control\settings_page\add_to_settings_menu' );

add_action( 'wp_loaded', 'wordpress_version_control\version_selector\action_controller' );
add_action( 'admin_bar_menu', 'wordpress_version_control\version_selector\add_version_selector' );

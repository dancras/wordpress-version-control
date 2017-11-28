<?php
/**
 * Description: TBD
 *
 * Plugin Name: WordPress Version Control
 * Plugin URI: https://github.com/dancras/wordpress-version-control
 * Version: 0.0.1
 * Author: Daniel Howlett
 * Author URI: http://dancras.co.uk/
 * License: MIT
 *
 * @package wordpress_version_control
 */

namespace wordpress_version_control;

add_action( 'admin_notices', 'wordpress_version_control\hello_world' );

/**
 * Output a hello world notice
 */
function hello_world() {
	echo '<div class="notice notice-info"><p>Hello world</p></div>';
}

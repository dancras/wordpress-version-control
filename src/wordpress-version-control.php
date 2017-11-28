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
 * @package wordpress-version-control
 */

add_action( 'admin_notices', 'wordpress_version_control_hello_world' );

/**
 * Output a hello world notice
 */
function wordpress_version_control_hello_world() {
	echo '<div class="notice notice-info"><p>Hello world</p></div>';
}

<?php
/*
Plugin Name: Wordpress Version Control
Plugin URI: https://github.com/dancras/wordpress-version-control
Description: TBD
Version: 0.0.1
Author: Daniel Howlett
Author URI: http://dancras.co.uk/
License: MIT
*/

add_action('admin_notices', 'wordpress_version_control_hello_world');

function wordpress_version_control_hello_world () {
    echo '<div class="notice notice-info"><p>Hello world</p></div>';
}
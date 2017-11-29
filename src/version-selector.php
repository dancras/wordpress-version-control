<?php
/**
 * Drop down toolbar menu to select current version.
 *
 * @package wordpress_version_control\version_selector
 */

namespace wordpress_version_control\version_selector;

/**
 * Temporary fixed versions list
 */
function get_versions() {
	return [
		'master',
		'feature',
	];
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

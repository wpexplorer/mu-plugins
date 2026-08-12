<?php
/**
 * Plugin Name: Disable WP Events News Dashboard Widget
 * Description: Removes the WordPress Events and News widget from the dashboard.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_dashboard_setup', function() {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
} );
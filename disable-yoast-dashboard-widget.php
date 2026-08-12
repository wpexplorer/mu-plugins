<?php
/**
 * Plugin Name: Disable Yoast Dashboard Widget
 * Description: Removes the Yoast SEO dashboard widget along with its scripts and styles.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove the widget.
 *
 * Runs late so that it fires after Yoast has registered the meta box.
 */
add_action( 'wp_dashboard_setup', function () {
	remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal' );
}, PHP_INT_MAX );

/**
 * Dequeue the widget assets, which are enqueued whether the widget renders
 * or not.
 */
add_action( 'admin_enqueue_scripts', function ( $hook_suffix ) {
	if ( 'index.php' !== $hook_suffix ) {
		return;
	}

	wp_dequeue_script( 'yoast-seo-dashboard-widget' );
	wp_dequeue_style( 'yoast-seo-wp-dashboard' );
	wp_dequeue_style( 'yoast-seo-monorepo' );
}, PHP_INT_MAX );
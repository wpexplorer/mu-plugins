<?php
/**
 * Plugin Name: Disable Avatars
 * Description: Turns off avatars so no requests are made to Gravatar.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Disable avatars regardless of the stored setting.
 */
add_filter( 'option_show_avatars', '__return_false' );

/**
 * Hide the avatar settings from Settings > Discussion.
 */
add_action( 'admin_init', function () {
	global $wp_settings_fields;
	unset( $wp_settings_fields['discussion']['avatars'] );
} );
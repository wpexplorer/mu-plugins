<?php
/**
 * Plugin Name: Disable AI
 * Description: Disables AI features in WordPress and supported plugins.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Disable WordPress AI support.
 */
add_filter( 'wp_supports_ai', '__return_false', 99 );

/**
 * Jetpack.
 */
add_filter( 'jetpack_ai_enabled', '__return_false', 99 );

/**
 * Elementor.
 */
add_filter( 'get_user_option_elementor_enable_ai', '__return_zero' );
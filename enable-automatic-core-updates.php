<?php
/**
 * Plugin Name: Enable Automatic Core Updates
 * Description: Turns on automatic core updates for minor and security releases, overriding hosts that disable them.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Re-enable the background updater.
 *
 * Some hosts define AUTOMATIC_UPDATER_DISABLED as true, which stops every
 * background update before any of the core specific checks run.
 */
add_filter( 'automatic_updater_disabled', '__return_false' );

/**
 * Allow minor and security releases.
 *
 * These filters run after WP_AUTO_UPDATE_CORE is read, so they apply even when
 * a host has already defined the constant in wp-config.php.
 */
add_filter( 'allow_minor_auto_core_updates', '__return_true' );

/**
 * Block major releases.
 *
 * Swap in __return_true if you want major versions installed automatically too.
 */
add_filter( 'allow_major_auto_core_updates', '__return_false' );
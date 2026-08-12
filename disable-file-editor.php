<?php
/**
 * Plugin Name: Disable File Editor
 * Description: Disables the built-in WordPress plugin and theme file editors.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Disable plugin and theme file editors.
if ( ! defined( 'DISALLOW_FILE_EDIT' ) ) {
	define( 'DISALLOW_FILE_EDIT', true );
} else {
	add_filter( 'file_mod_allowed', function( $allowed, $context ) {
		if ( in_array( $context, array( 'capability_edit_themes', 'capability_edit_plugins' ), true ) ) {
			return false;
		}

		return $allowed;
	}, 10, 2 );
}
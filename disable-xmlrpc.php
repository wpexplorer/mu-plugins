<?php
/**
 * Plugin Name: Disable XML-RPC
 * Description: Disables the XML-RPC interface, the pingback methods and the pingback advertising header.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Disable XML-RPC methods that require authentication.
 */
add_filter( 'xmlrpc_enabled', '__return_false' );

/**
 * Remove the pingback methods.
 *
 * These stay available even when xmlrpc_enabled is false because they do not
 * require authentication.
 */
add_filter( 'xmlrpc_methods', function ( $methods ) {
	unset(
		$methods['pingback.ping'],
		$methods['pingback.extensions.getPingbacks']
	);
	return $methods;
} );

/**
 * Remove the X-Pingback header.
 */
add_filter( 'wp_headers', function ( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
} );

/**
 * Remove the pingback URL from bloginfo() output.
 */
add_filter( 'bloginfo_url', function ( $output, $show ) {
	if ( 'pingback_url' === $show ) {
		return '';
	}
	return $output;
}, 10, 2 );
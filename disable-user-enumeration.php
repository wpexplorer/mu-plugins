<?php
/**
 * Plugin Name: Disable User Enumeration
 * Description: Prevents WordPress from exposing usernames via sitemaps, the REST API, author archives and login errors.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove the user sitemap provider.
 */
add_filter( 'wp_sitemaps_add_provider', function ( $provider, $name ) {
	if ( 'users' === $name ) {
		return false;
	}
	return $provider;
}, 10, 2 );

/**
 * Remove the REST API user endpoints for logged out requests.
 */
add_filter( 'rest_endpoints', function ( $endpoints ) {
	if ( is_user_logged_in() ) {
		return $endpoints;
	}

	unset(
		$endpoints['/wp/v2/users'],
		$endpoints['/wp/v2/users/(?P<id>[\d]+)']
	);

	return $endpoints;
} );

/**
 * Return a 404 for author archives.
 *
 * Runs before redirect_canonical() so that ?author=1 requests 404 rather than
 * being redirected to /author/username/, which would leak the name in the
 * Location header.
 */
add_action( 'template_redirect', function () {
	if ( ! is_author() ) {
		return;
	}

	global $wp_query;

	$wp_query->set_404();
	status_header( 404 );
	nocache_headers();
}, 0 );

/**
 * Return a generic login error.
 *
 * Stops the login screen from confirming whether a username exists.
 */
add_filter( 'login_errors', function () {
	return __( 'Login failed. Please check your credentials and try again.' );
} );
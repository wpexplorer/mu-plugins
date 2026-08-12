<?php
/**
 * Plugin Name: Disable Password Reset
 * Description: Disables password reset functionality.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hide the lost password link on the login screen.
 */
add_filter( 'lost_password_html_link', '__return_empty_string' );

/**
 * Disable password reset requests.
 */
add_action( 'login_init', function () {
	if (
		isset( $_GET['action'] )
		&& in_array( $_GET['action'], array( 'lostpassword', 'retrievepassword' ), true )
	) {
		wp_die(
			'Password reset functionality is disabled.',
			'Demo Site',
			array(
				'response' => 403,
			)
		);
	}
} );
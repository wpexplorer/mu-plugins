<?php
/**
 * Plugin Name: Disable Comments
 * Description: Prevents comment submissions.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Prevent comment submissions.
 *
 * Keeps existing comments visible but blocks visitors from creating
 * new ones.
 */
add_filter( 'preprocess_comment', function ( $comment_data ) {
	if ( ! is_user_logged_in() ) {
		wp_die(
			'Comments are closed on this site.',
			'Comments Closed',
			array(
				'response'  => 403,
				'back_link' => true,
			)
		);
	}
	return $comment_data;
} );
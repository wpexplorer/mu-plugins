<?php
/**
 * Plugin Name: Limit Post Revisions
 * Description: Caps the number of revisions stored per post.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Limit stored revisions.
 *
 * Return 0 to disable revisions entirely, or branch on $post->post_type to
 * use different limits per post type.
 */
add_filter( 'wp_revisions_to_keep', function ( $num, $post ) {
	return 5;
}, 10, 2 );
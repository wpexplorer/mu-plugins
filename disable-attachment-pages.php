<?php
/**
 * Plugin Name: Disable Attachment Pages
 * Description: Redirects attachment pages to their parent post or page, or to the homepage when no parent exists.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action(
	'template_redirect',
	function() {
		if ( ! is_attachment() ) {
			return;
		}

		$parent_id = wp_get_post_parent_id( get_queried_object_id() );

		$url = $parent_id
			? get_permalink( $parent_id )
			: home_url( '/' );

		wp_safe_redirect( $url, 301 );
		exit;
	}
);
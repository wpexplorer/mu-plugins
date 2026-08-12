<?php
/**
 * Plugin Name: Disable WP Emoji Support
 * Description: Disables WordPress's custom emoji support.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'init', function() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	add_filter( 'tiny_mce_plugins', function( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, [ 'wpemoji' ] );
		}

		return [];
	} );

	// Strip out any URLs referencing the WordPress.org emoji location
	add_filter( 'wp_resource_hints', function( $urls, $relation_type ) {
		if ( 'dns-prefetch' == $relation_type ) {
			$emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
			foreach ( $urls as $key => $url ) {
				if ( strpos( $url, $emoji_svg_url_bit ) !== false ) {
					unset( $urls[$key] );
				}
			}
		}
		return $urls;
	}, 10, 2 );
} );

add_filter( 'emoji_svg_url', '__return_false' );
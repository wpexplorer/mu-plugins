<?php
/**
 * Plugin Name: Clean Head
 * Description: Removes unnecessary WordPress head output.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Remove RSD link.
remove_action( 'wp_head', 'rsd_link' );

// Remove WordPress generator tag.
remove_action( 'wp_head', 'wp_generator' );

// Remove RSS feed links.
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Remove Windows Live Writer manifest.
remove_action( 'wp_head', 'wlwmanifest_link' );

// Remove adjacent post links.
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

// Remove shortlinks.
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11 );

// Remove emoji assets.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Remove REST API discovery link.
remove_action( 'wp_head', 'rest_output_link_wp_head' );

// Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );

// Remove generator version from feeds.
add_filter( 'the_generator', '__return_empty_string' );
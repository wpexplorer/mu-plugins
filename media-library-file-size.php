<?php
/**
 * Plugin Name: Media Library File Size
 * Description: Adds a file size column to the Media Library using stored attachment metadata.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add the file size column.
 */
add_filter( 'manage_media_columns', function ( $columns ) {
	$columns['file_size'] = __( 'File Size' );
	return $columns;
} );

/**
 * Display the file size.
 */
add_action( 'manage_media_custom_column', function ( $column_name, $post_id ) {
	if ( 'file_size' !== $column_name ) {
		return;
	}
	$metadata = wp_get_attachment_metadata( $post_id );
	if ( empty( $metadata['filesize'] ) ) {
		echo '&mdash;';
		return;
	}
	echo esc_html( size_format( $metadata['filesize'] ) );
}, 10, 2 );
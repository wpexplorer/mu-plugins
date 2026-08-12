<?php
/**
 * Plugin Name: Disable Image Sizes
 * Description: Disables WordPress from generating intermediate image sizes.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Disable the big image size threshold.
 */
add_filter( 'big_image_size_threshold', '__return_false' );

/**
 * Disable generated intermediate image sizes.
 */
add_filter( 'intermediate_image_sizes_advanced', '__return_empty_array' );
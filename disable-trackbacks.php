<?php
/**
 * Plugin Name: Disable Trackbacks
 * Description: Disables trackbacks and pingbacks.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Disable trackbacks and pingbacks.
add_filter( 'pings_open', '__return_false' );
<?php
/**
 * Plugin Name: Disable Emails
 * Description: Disables all outgoing emails.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Prevent all outgoing emails.
 */
add_filter( 'pre_wp_mail', '__return_false' );
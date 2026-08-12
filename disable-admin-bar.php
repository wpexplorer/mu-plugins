<?php
/**
 * Plugin Name: Disable Admin Bar
 * Description: Disables the WordPress admin toolbar on the frontend for logged in users.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'show_admin_bar', '__return_false' );
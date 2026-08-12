<?php
/**
 * Plugin Name: Disable User Registration
 * Description: Disables user registration.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

// Disable user registration.
add_filter( 'option_users_can_register', '__return_false' );
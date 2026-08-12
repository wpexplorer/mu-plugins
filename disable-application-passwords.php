<?php
/**
 * Plugin Name: Disable Application Passwords
 * Description: Disables application passwords and removes the section from user profiles.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_filter( 'wp_is_application_passwords_available', '__return_false' );
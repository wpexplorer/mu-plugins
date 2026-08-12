<?php
/**
 * Plugin Name: Hide Admin Notices
 * Description: Hides admin notices from users who cannot manage options.
 * Author: WPExplorer
 * Version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

add_action( 'admin_head', function () {
	if ( current_user_can( 'manage_options' ) ) {
		return;
	}

	remove_all_actions( 'admin_notices' );
	remove_all_actions( 'all_admin_notices' );
	remove_all_actions( 'network_admin_notices' );
	remove_all_actions( 'user_admin_notices' );
}, 1 );
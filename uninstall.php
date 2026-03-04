<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @package ButtonFlow
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Remove plugin settings.
delete_option( 'buttonflow_options' );

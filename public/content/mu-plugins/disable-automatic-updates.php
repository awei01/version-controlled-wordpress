<?php

function remove_update_menu_item() {
	remove_submenu_page('index.php', 'update-core.php');
}

function disable_automatic_updates() {
	if (!getenv('DISABLE_AUTOMATIC_UPDATES')) {
		return;
	}
	// leverage plugin and activate it
	require(ROOT_DIR . 'wp-plugins/disable-wordpress-updates/disable-updates.php');
	// remove the Update menu item in admin interface
	add_action('admin_menu', 'remove_update_menu_item');
}

add_action('plugins_loaded', 'disable_automatic_updates');

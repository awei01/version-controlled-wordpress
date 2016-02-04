<?php
// function to remove the "update" menu item in admin
function remove_update_menu_item() {
	remove_submenu_page('index.php', 'update-core.php');
}

// function to disable automatic updates
function disable_automatic_updates() {
	// leverage plugin and activate it
	require(ROOT_DIR . 'wp-plugins/disable-wordpress-updates/disable-updates.php');
}

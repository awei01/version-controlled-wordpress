<?php
/*
 | -------------------
 | Initialize
 | -------------------

 We'll put all our hooks here in one place so
 we can limit the number of hooks that we're
 introducing to the system

 */


function on_plugins_loaded() {
	// check disabling of automitic updates
	if (getenv('DISABLE_AUTOMATIC_UPDATES')) {
		disable_automatic_updates();
		// remove the Update menu item in admin interface
		add_action('admin_menu', 'remove_update_menu_item');
	}
	// change the upload folder
	if (getenv('OVERRIDE_UPLOAD_FOLDER')) {
		add_filter('upload_dir', 'override_upload_dir');
	}
}

function on_admin_init() {
	// remove the plugins menu item
	if (getenv('REMOVE_PLUGINS_MENU')) {
		add_action('admin_menu', 'remove_plugins_menu');
	}
}

// now actually add the hooks
add_action('plugins_loaded', 'on_plugins_loaded');
add_action('admin_init', 'on_admin_init');


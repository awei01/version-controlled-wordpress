<?php
/*
 | -------------------
 | Initialize
 | -------------------

 We'll put all our hooks here in one place so
 we can limit the number of hooks that we're
 introducing to the system

 */

// first, load developer hooks
require ROOT_DIR . '/configure/hooks.php';

function on_plugins_loaded() {
	// check disabling of automitic updates
	disable_automatic_updates();
	// change the upload folder
	override_upload_folder();
	// automate plugins
	automate_plugins_management();
  // automate themes
  automate_themes_management();
}

add_action('plugins_loaded', 'on_plugins_loaded');


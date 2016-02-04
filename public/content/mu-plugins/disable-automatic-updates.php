<?php

function disable_automatic_updates() {
	if (!getenv('DISABLE_AUTOMATIC_UPDATES')) {
		return;
	}
	require(ROOT_DIR . 'wp-plugins/disable-wordpress-updates/disable-updates.php');
}

add_action('plugins_loaded', 'disable_automatic_updates');

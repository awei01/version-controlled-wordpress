<?php
// Let's define a ROOT_DIR constant to our top level folder
// This way we can find folders more easily
// instead of trying to do __DIR__ . '/../../../' bullshit

define('ROOT_DIR', __DIR__ . '/');

require ROOT_DIR . 'bootstrap/autoload.php';
require ROOT_DIR . 'bootstrap/load-environment.php';
require ROOT_DIR . 'bootstrap/configure-database.php';
require ROOT_DIR . 'bootstrap/configure-security.php';
require ROOT_DIR . 'bootstrap/configure-paths.php';
require ROOT_DIR . 'bootstrap/configure-environment.php';

// Now, include a developer configured environment file to load additional env settings
require ROOT_DIR . 'configure/environment.php';


/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

<?php
// Let's define a ROOT_DIR constant to our top level folder
// This way we can find folders more easily
// instead of trying to do __DIR__ . '/../../../' bullshit

define('ROOT_DIR', __DIR__ . '/');

require ROOT_DIR . 'bootstrap/autoload.php';
require ROOT_DIR . 'bootstrap/load-environment.php';
require ROOT_DIR . 'bootstrap/configure-database.php';
require ROOT_DIR . 'bootstrap/set-security-keys.php';
require ROOT_DIR . 'bootstrap/define-paths.php';

/**
 * For developers: WordPress debugging mode.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', getenv('WP_DEBUG'));

/*
 |----------------------------------
 | Check to see if we're hitting the check.php
 | to do a simple view of our defined constants
 | if so, then just stop doing WP scripts
 |----------------------------------
 */
if ($_SERVER['SCRIPT_FILENAME'] === ROOT_DIR . 'public/check.php') {
	return;
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

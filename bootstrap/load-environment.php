<?php
/*
 |----------------------------------
 | use Dotenv plugin to get credentials from environment
 |----------------------------------
 */
$environment = new Dotenv\Dotenv(ROOT_DIR);

// Load the variables
$environment->load();

// Ensure keys to be set and not empty
$environment->required(array(
	// Database stuff
	'DB_FILE',

	// Salts/Keys
	'AUTH_KEY',
	'SECURE_AUTH_KEY',
	'LOGGED_IN_KEY',
	'NONCE_KEY',
	'AUTH_SALT',
	'SECURE_AUTH_SALT',
	'LOGGED_IN_SALT',
	'NONCE_SALT',
))->notEmpty();

// Ensure keys but empty are allowed
$environment->required(array(
	// SQLite
	'USE_MYSQL',
	'DB_DIR',

	// upload folder configuration
	'UPLOAD_STORAGE_FOLDER',
	'UPLOAD_URL_PATH',

	/*
		|--------------------------
		| core wordpress variables
		|--------------------------
	*/
	// disabling web-based file editing
	'DISALLOW_FILE_EDIT',
	'DISALLOW_FILE_MODS',
	// show debug
	'WP_DEBUG',
	// number of post revisions
	'WP_POST_REVISIONS',
	// disable cron
	'DISABLE_WP_CRON',

));

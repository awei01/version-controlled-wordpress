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
$environment->required([
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
])->notEmpty();

// Ensure keys but empty are allowed
$environment->required([
	// SQLite
	'USE_MYSQL',
	'DB_DIR',

	// upload folder configuration
	'UPLOAD_STORAGE_FOLDER',
	'UPLOAD_URL_PATH',

	// disabling web-based file editing
	'DISALLOW_FILE_EDIT',
	'DISALLOW_FILE_MODS',

]);

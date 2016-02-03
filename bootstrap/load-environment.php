<?php
/*
 |----------------------------------
 | use Dotenv plugin to get credentials from environment
 |----------------------------------
 */
$environment = new Dotenv\Dotenv(__DIR__ . '/..');

// Load the variables
$environment->load();


// Ensure keys to be set and not empty
$environment->required([
	// Database stuff
	'DB_NAME',
	'DB_USER',
	'DB_PASSWORD',
	'DB_HOST',
	'DB_CHARSET',

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
	'DB_COLLATE',
	'WP_DEBUG',
]);

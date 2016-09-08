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


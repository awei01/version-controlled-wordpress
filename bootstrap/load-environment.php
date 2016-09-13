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

function getenv_array($namespace, $separator = '__') {
  if (!empty($GLOBALS['__env_cache__'])) {
    $cache = $GLOBALS['__env_cache__'];
  } else {
    $cache = array();
  }
  if (!empty($cache[$namespace])) {
    return $cache[$namespace];
  }
  $result = array();
  foreach ($_ENV as $key => $value) {
    if (preg_match('/^' . $namespace . $separator . '([\w\-]+)$/', $key, $matches)) {
      $result[$matches[1]] = $value;
    }
  }
  if ($result) {
    // there are some results, cache it and return it
    $GLOBALS['__env_cache__'][$namespace] = $result;
    return $result;
  }
}

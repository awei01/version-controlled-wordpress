<?php
require __DIR__ . '/../wp/wp-load.php';

if ($_GET['check'] !== DB_PASSWORD) {
	// some basic security checking
	return;
}
?>

<h1>Settings</h1>
<pre>
<?php
	$constants = get_defined_constants(true);
	$constants = $constants['user'];
	$private = array(
		'DB_PASSWORD',
		'AUTH_KEY',
		'SECURE_AUTH_KEY',
		'LOGGED_IN_KEY',
		'NONCE_KEY',
		'AUTH_SALT',
		'SECURE_AUTH_SALT',
		'LOGGED_IN_SALT',
		'NONCE_SALT',
	);
	$hidden = array_fill_keys($private, '****');
	$constants = array_merge($constants, $hidden);

	ksort($constants);
	print_r($constants);
?>
</pre>

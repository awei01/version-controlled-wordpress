<?php
/*
 |----------------------------------
 | Set the url to the current server
 |----------------------------------
 */
$server = 'http://' . $_SERVER['SERVER_NAME'];
// shim the URL
define('WP_SITEURL', $server . '/wp');
define('WP_HOME', $server);

/*
 |----------------------------------
 | Map urls to our symbolic links
 |----------------------------------
 */
$cwd = dirname(__FILE__);

// set the content directory
if (!defined('WP_CONTENT_DIR')) {
	define( 'WP_CONTENT_DIR', realpath($cwd . '/../public/content' ));
}
define( 'WP_CONTENT_URL', $server . '/content' );

// set the plugins directory
if (!defined('WP_PLUGIN_DIR')) {
	define( 'WP_PLUGIN_DIR', realpath($cwd . '/../public/content/plugins' ));
}
define( 'WP_PLUGIN_URL', $server . '/content/plugins' );

define('WP_POST_REVISIONS', 2);

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
// set the content directory
define( 'WP_CONTENT_DIR', realpath(ROOT_DIR . 'public/content' ));
define( 'WP_CONTENT_URL', WP_HOME . '/content' );

// set the plugins directory
define( 'WP_PLUGIN_DIR', realpath(ROOT_DIR . 'public/content/plugins' ));
define( 'WP_PLUGIN_URL', WP_HOME . '/content/plugins' );


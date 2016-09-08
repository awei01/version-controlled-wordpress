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

/*
 |----------------------------------
 | Define our paths
 |----------------------------------
 */
// set the cache directory
define('FILE_CACHE_STORAGE_FOLDER', getenv('FILE_CACHE_STORAGE_FOLDER') ?: ROOT_DIR . 'storage/cache');
// set the upload folder directory and url path
define('UPLOAD_STORAGE_FOLDER', getenv('UPLOAD_STORAGE_FOLDER') ?: ROOT_DIR . 'storage/uploads');
define('UPLOAD_URL_PATH', getenv('UPLOAD_URL_PATH') ?: 'uploads');

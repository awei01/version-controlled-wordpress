<?php
// this file should be symlinked into /public/content/object-cache.php
// it will run checks to see if the .env variable is set to use the cache

if (!getenv('FILE_CACHE__enabled')) {
  return;
} else {
  // we can safely define our function here
  function wp_cache_init() {
    $path = getenv('FILE_CACHE__storage_path') ?: ROOT_DIR . 'storage/cache';
    $path = realpath($path);
    $GLOBALS['wp_object_cache'] = new WP_Object_Cache($path);
  }
}

require __DIR__ . '/wp-cache-functions.php';
require __DIR__ . '/wp-object-cache.php';


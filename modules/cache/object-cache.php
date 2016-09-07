<?php
// this file should be symlinked into /public/content/object-cache.php
// it will run checks to see if the .env variable is set to use the cache

if (!getenv('USE_FILE_CACHE')) {
  return;
}

require __DIR__ . '/wp-cache-functions.php';
require __DIR__ . '/wp-object-cache.php';

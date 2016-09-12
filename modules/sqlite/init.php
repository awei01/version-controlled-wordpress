<?php
if (!getenv('SQLITE__enabled')) {
  define('USE_MYSQL', true);
  return;
}

$filename = getenv('SQLITE__filename') ?: 'database.sqlite';
$path = getenv('SQLITE__storage_path') ?: ROOT_DIR . 'storage/database';
if (!realpath($path)) {
  throw new Exception('Invalid storage path for sqlite');
}

add_action('admin_init', function() {
  // suppress from admin menu
  remove_submenu_page('options-general.php', 'sqlite-integration');
});

define('USE_MYSQL', false);
define('DB_DIR', $path);
define('DB_FILE', $filename);

require WP_PLUGIN_DIR . '/sqlite-integration/db.php';

<?php
require __DIR__ . '/automate-plugins-management.php';
require __DIR__ . '/override-upload-folder.php';
require __DIR__ . '/suppress-admin-menu.php';
require __DIR__ . '/suppress-admin-widget.php';

add_action('muplugins_loaded', function() {
  // we'll load the plugins after muplugins
  // otherwise, they won't get loaded till second refresh
  automate_plugins_management();
});

add_action('plugins_loaded', function() {
  override_upload_folder();
  suppress_admin_menu();
  suppress_admin_widget();
});

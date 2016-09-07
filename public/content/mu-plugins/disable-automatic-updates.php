<?php
// function to disable automatic updates
function disable_automatic_updates() {
  if (!getenv('DISABLE_AUTOMATIC_UPDATES')) {
    return;
  }
  // remove the Update menu item in admin interface
  add_action('admin_menu', function() {
    remove_submenu_page('index.php', 'update-core.php');
  });



}

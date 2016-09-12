<?php

function suppress_admin_menu() {
  $config = getenv_array('SUPPRESS_ADMIN_MENU');

  if (!empty($config['plugins'])) {
    add_action('admin_menu', function() {
      remove_menu_page('plugins.php');
    });
  }
  if (!empty($config['themes_themes'])) {
    add_action('admin_menu', function() {
      remove_submenu_page('themes.php', 'themes.php');
    });
  }
}

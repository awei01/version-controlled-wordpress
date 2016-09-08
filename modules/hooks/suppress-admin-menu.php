<?php

function suppress_admin_menu() {
  // fixme: loop through all env vars and grab SUPPRESS_ADMIN_MENU* ?
  if (getenv('SUPPRESS_ADMIN_MENU__PLUGINS')) {
    add_action('admin_menu', function() {
      remove_menu_page('plugins.php');
    });
  }
  if (getenv('SUPPRESS_ADMIN_MENU__THEMES_THEMES')) {
    add_action('admin_menu', function() {
      remove_submenu_page('themes.php', 'themes.php');
    });
  }
}

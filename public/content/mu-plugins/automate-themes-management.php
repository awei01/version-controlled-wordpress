<?php

function automate_themes_management() {
  if (!getenv('AUTOMATE_THEMES_MANAGEMENT')) {
    return;
  }
  // remove the appearance/themes menu from admin nav
	add_action('admin_menu', function() {
    remove_submenu_page('themes.php', 'themes.php');
  });
}

<?php

function automate_plugins_management() {
  if (!getenv('AUTOMATE_PLUGINS_MANAGEMENT')) {
    return;
  }
  // remove the plugins menu from admin nav
	add_action('admin_menu', function() {
    remove_menu_page('plugins.php');
  });

  // auto enable all the plugins
  $plugins = array_keys(get_plugins());
  $active = get_option('active_plugins');
  foreach ($plugins as $plugin) {
    $plugin = plugin_basename($plugin);
    if (!in_array($plugin, $active)) {
      $active[] = $plugin;
      sort($active);
      do_action('activate_plugin', $plugin);
      update_option('active_plugins', $active );
      do_action('activate_' . $plugin);
      do_action('activated_plugin', $plugin);
    }
  }
}

<?php

function automate_plugins_management() {
  if (!getenv('AUTOMATE_PLUGINS_MANAGEMENT')) {
    return;
  }
  if (!function_exists('get_plugins')) {
    require_once ABSPATH . '/wp-admin/includes/plugin.php';
  }

  $active = get_option('active_plugins');
  if (!is_array($active)) {
    // plugins not loaded yet or DB not ready
    return;
  }

  $plugins = array_keys(get_plugins());

  if (!array_diff($plugins, $active)) {
    // all of the plugins are already activated
    return;
  }

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

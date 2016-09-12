<?php

function suppress_admin_menu() {
  $config = getenv_array('SUPPRESS_ADMIN_MENU');
  if (!$config) {
    return;
  }
  foreach ($config as $key => $value) {
    if (!$value) {
      continue;
    }
    $parts = explode('_', $key);
    $args = array_map(function($value) {
      return $value . '.php';
    }, $parts);
    $method = sizeof($args) === 1 ? 'remove_menu_page' : 'remove_submenu_page';
    add_action('admin_menu', function() use ($method, $args) {
      call_user_func_array($method, $args);
    });

  }
}

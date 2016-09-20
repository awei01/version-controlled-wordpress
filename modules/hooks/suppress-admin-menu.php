<?php

function suppress_admin_menu() {
  $config = getenv('SUPPRESS_ADMIN_MENU') ?: '';
  $items = explode('|', $config);
  $items = array_filter($items);
  if (!$items) {
    return;
  }
  add_action('admin_menu', function() use ($items) {
    foreach ($items as $value) {
      $parts = explode('>', $value);
      $args = array_map(function($value) {
        if (strpos($value, '.php') === false) {
          $value .= '.php';
        }
        return $value;
      }, $parts);
      $method = sizeof($args) === 1 ? 'remove_menu_page' : 'remove_submenu_page';
      call_user_func_array($method, $args);
    }
  });
}

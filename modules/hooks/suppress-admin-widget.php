<?php

function suppress_admin_widget() {
  $config = getenv_array('SUPPRESS_ADMIN_WIDGET');
  if (!$config) {
    return;
  }
  add_action('wp_dashboard_setup', function() use ($config) {
    global $wp_meta_boxes;
    if (!empty($config['dashboard_right_now'])) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    }
    if (!empty($config['dashboard_activity'])) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    }
    if (!empty($config['dashboard_quick_press'])) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    }
    if (!empty($config['dashboard_primary'])) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    }
  });
}

<?php

function suppress_admin_widget() {
  add_action('wp_dashboard_setup', function() {
    global $wp_meta_boxes;
    if (getenv('SUPPRESS_ADMIN_WIDGET__DASHBOARD_RIGHT_NOW')) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    }
    if (getenv('SUPPRESS_ADMIN_WIDGET__DASHBOARD_ACTIVITY')) {
      unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    }
    if (getenv('SUPPRESS_ADMIN_WIDGET__DASHBOARD_QUICK_PRESS')) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    }
    if (getenv('SUPPRESS_ADMIN_WIDGET__DASHBOARD_PRIMARY')) {
      unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    }
  });
}

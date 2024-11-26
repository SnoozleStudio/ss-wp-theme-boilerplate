<?php

/**
 * Check for any theme dependencies
 *
 * @return array
 */
function sswp_check_theme_dependencies()
{
  $missing = array();
  $plugins = array(
    'classic-editor/classic-editor.php' => 'Classic Editor',
    'classic-widgets/classic-widgets.php' => 'Classic Widgets',
    'theme-check/theme-check.php' => 'Theme Check',
    'query-monitor/query-monitor.php' => 'Query Monitor',
    'advanced-custom-fields/acf.php' => 'Secure Custom Fields', // Added Secure Custom Fields plugin
  );

  foreach ($plugins as $plugin => $name) {
    if (!is_plugin_active($plugin)) {
      // Check if the plugin is installed
      if (!file_exists(WP_PLUGIN_DIR . '/' . $plugin)) {
        $missing[$plugin] = $name;
      }
    }
  }
  return $missing;
}

/**
 * Install and activate missing theme dependencies
 *
 */
function sswp_install_and_activate_dependencies()
{
  $plugins = sswp_check_theme_dependencies();
  foreach ($plugins as $plugin => $name) {
    // Try to install and activate the missing plugin
    if (!is_plugin_active($plugin)) {
      $plugin_file = WP_PLUGIN_DIR . '/' . $plugin;
      if (!file_exists($plugin_file)) {
        // Download and install the plugin
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

        // Build the correct plugin zip URL from the WordPress plugin repository
        $plugin_slug = basename(dirname($plugin));  // Get the plugin's directory slug (e.g., 'classic-editor')
        $plugin_zip_url = 'https://downloads.wordpress.org/plugin/' . $plugin_slug . '.zip';

        $upgrader = new Plugin_Upgrader();
        $upgrader->install($plugin_zip_url);
        // After installation, activate the plugin
        activate_plugin($plugin);
      } else {
        activate_plugin($plugin);
      }
    }
  }
}

/**
 * Check and display theme dependencies in admin notices
 *
 */
function sswp_theme_dependencies()
{
  // Check if the plugins are missing
  $plugins = sswp_check_theme_dependencies();

  // If plugins are missing, show the warning message
  if (!empty($plugins)) {
    foreach ($plugins as $plugin => $name) {
      echo '<div class="error"><p>' . sprintf(__('Warning: The sswp theme requires the plugin %s.', 'sswp'), $name) . ' <a href="' . admin_url() . 'plugins.php">' . sprintf(__('View Plugins', 'sswp'), $name) . '</a></p></div>';
    }

    // Install and activate missing plugins
    sswp_install_and_activate_dependencies();
  }
}

add_action('admin_notices', 'sswp_theme_dependencies');

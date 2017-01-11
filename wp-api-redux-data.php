<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://alephsf.com
 * @since             1.0.0
 * @package           Wp_Api_Redux_Data
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress API Redux Data
 * Plugin URI:        http://alephsf.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Aleph
 * Author URI:        http://alephsf.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-api-redux-data
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-api-redux-data-activator.php
 */
function activate_Wp_Api_Redux_Data() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-api-redux-data-activator.php';
	Wp_Api_Redux_Data_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-api-redux-data-deactivator.php
 */
function deactivate_Wp_Api_Redux_Data() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-api-redux-data-deactivator.php';
	Wp_Api_Redux_Data_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_Wp_Api_Redux_Data' );
register_deactivation_hook( __FILE__, 'deactivate_Wp_Api_Redux_Data' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-api-redux-data.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 * Wrapped in a plugins_loaded hook because we need to make sure
 * the REST API is active and the classes are active to be extended.
 *
 * @since    1.0.0
 */

add_action('plugins_loaded', 'run_Wp_Api_Redux_Data');

function run_Wp_Api_Redux_Data() {
  if ( class_exists('WP_REST_Controller') ) {
		$plugin = new Wp_Api_Redux_Data();
		$plugin->run();
	} else {
    add_action('admin_notices', 'Wp_Api_Redux_Data_not_loaded');
  }
}

function Wp_Api_Redux_Data_not_loaded() {
    printf(
      '<div class="error"><p>%s</p></div>',
      __('WordPress API Redux cannot load because the REST API is not currently active.')
    );
}

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
 * @package           Wp_Api_Redux
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress API Redux
 * Plugin URI:        http://alephsf.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Aleph
 * Author URI:        http://alephsf.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-api-redux
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-api-redux-activator.php
 */
function activate_wp_api_redux() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-api-redux-activator.php';
	Wp_Api_Redux_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-api-redux-deactivator.php
 */
function deactivate_wp_api_redux() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-api-redux-deactivator.php';
	Wp_Api_Redux_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_api_redux' );
register_deactivation_hook( __FILE__, 'deactivate_wp_api_redux' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-api-redux.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_api_redux() {

	$plugin = new Wp_Api_Redux();
	$plugin->run();

}
run_wp_api_redux();

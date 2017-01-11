<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://alephsf.com
 * @since      1.0.0
 *
 * @package    Wp_Api_Redux_Data
 * @subpackage Wp_Api_Redux_Data/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Api_Redux_Data
 * @subpackage Wp_Api_Redux_Data/includes
 * @author     Aleph <ping@alephsf.com>
 */
class Wp_Api_Redux_Data_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-api-redux-data',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

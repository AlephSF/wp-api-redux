<?php

/**
 * Create a custom endpoint for site-wide data
 *
 * @link       http://alephsf.com
 * @since      1.0.0
 *
 * @package    Wp_Api_Redux_Data
 * @subpackage Wp_Api_Redux_Data/includes/endpoints
 */

/**
 * Register the custom endpoint for site-wide data
 *
 *
 * @package    Wp_Api_Redux_Data
 * @subpackage Wp_Api_Redux_Data/includes/endpoints
 * @author     Aleph <ping@alephsf.com>
 */
class Wp_Api_Redux_Data_Site extends WP_REST_Controller {

	public function __construct() {

	}

	/**
	 * This function registers the actual route via the WordPress REST API
	 *
	 * @since    1.0.0
	 *
	 */
	 public function register_route() {
		 register_rest_route( 'redux-data/v2', '/site/', array(
			 'methods' => WP_REST_Server::READABLE,
			 'callback' => array($this, 'get_site_data')
		 ) );
	 }

	 public function get_site_data() {
		 $output = array(
			 'foo' => 'bar'
		 );
		 return new WP_REST_Response( $output, 200 );
	 }

}

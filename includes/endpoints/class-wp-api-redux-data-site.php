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
			 'name' => get_bloginfo('name'),
			 'tagline' => get_bloginfo('description'),
			 'siteUrl' => get_home_url(),
			 'menus' => $this->get_all_menus()
		 );
		 return new WP_REST_Response( $output, 200 );
	 }

	 public function get_all_menus(){
		 $locations =  get_registered_nav_menus();
		 $menus = array();
		 $loc_index = get_nav_menu_locations();
		 foreach ($locations as $slug => $location) {
		 		$menus[$slug] = array(
					'menu_name' => $location
				);
        $menu_items_raw = wp_get_nav_menu_items($loc_index[$slug]);
				$menu_items = array();
				foreach ($menu_items_raw as $key => $item) {
					$menu_items[$key] = array(
						'id' => $item->ID,
						'menu_item_parent' => $item->menu_item_parent,
						'type' => $item->object,
						'url' => $item->url,
						'title' => $item->title,
						'target' => $item->target,
						'attr_title' => $item->attr_title,
						'description' => $item->description,
						'classes' => $item->classes
					);
				}
				$menus[$slug]['menu_items'] = $menu_items;
		 }

		 return $menus;
	 }

}

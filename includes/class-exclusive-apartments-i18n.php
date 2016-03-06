<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://samir.kahvedzic.deviantart.com
 * @since      1.0.0
 *
 * @package    Exclusive_Apartments
 * @subpackage Exclusive_Apartments/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Exclusive_Apartments
 * @subpackage Exclusive_Apartments/includes
 * @author     Samir Kahvedzic <akirapowered@gmail.com>
 */
class Exclusive_Apartments_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'exclusive-apartments',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

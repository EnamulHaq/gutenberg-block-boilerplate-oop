<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://boomdevs.com/
 * @since      1.0.0
 *
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/includes
 * @author     BoomDevs <admin@boomdevs.com>
 */
class Multipurpose_Compression_Table_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'multipurpose-compression-table ',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

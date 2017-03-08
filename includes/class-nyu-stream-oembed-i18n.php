<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wp.nyu.edu
 * @since      0.1
 *
 * @package    NYU_Stream_oEmbed
 * @subpackage NYU_Stream_oEmbed/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1
 * @package    NYU_Stream_oEmbed
 * @subpackage NYU_Stream_oEmbed/includes
 * @author     Neel Shah for NYU
 */
class NYU_Stream_oEmbed_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'nyu-stream-oembed',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

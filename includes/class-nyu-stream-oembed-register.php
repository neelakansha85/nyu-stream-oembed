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
class NYU_Stream_oEmbed_register {


	/**
	 * Register NYU Stream oEmbed URL with wordpress oembed function.
	 *
	 * @since    0.1
	 */
	public function register_nyu_stream_oembed_url() {

		wp_oembed_add_provider(
			'https://https://stream.nyu.edu/id/*',
			'https://stream.nyu.edu/id/oembed'
		);

	}



}

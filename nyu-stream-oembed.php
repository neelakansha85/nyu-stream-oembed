<?php

/**
 *
 * @link              https://wp.nyu.edu
 * @since             0.1
 * @package           NYU Stream oEmbed
 *
 * @wordpress-plugin
 * Plugin Name:       NYU Stream oEmbed
 * Plugin URI:        https://wp.nyu.edu
 * Description:       This plugin enables support for NYU Stream oEmbed
 * Version:           0.1
 * Author:            Neel Shah for NYU
 * Author URI:        http://neelshah.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nyu-stream-oembed
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nyu-stream-oembed-activator.php
 */
function activate_nyu_stream_oembed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nyu-stream-oembed-activator.php';
	NYU_Stream_oEmbed_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nyu-stream-oembed-deactivator.php
 */
function deactivate_nyu_stream_oembed() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nyu-stream-oembed-deactivator.php';
	NYU_Stream_oEmbed_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nyu_stream_oembed' );
register_deactivation_hook( __FILE__, 'deactivate_nyu_stream_oembed' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nyu-stream-oembed.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1
 */
function run_nyu_stream_oembed() {
	$plugin = new NYU_Stream_oEmbed();
	$plugin->run();
}
run_nyu_stream_oembed();


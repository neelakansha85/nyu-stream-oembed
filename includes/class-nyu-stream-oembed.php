<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://wp.nyu.edu
 * @since      0.1
 *
 * @package    NYU_Stream_oEmbed
 * @subpackage NYU_Stream_oEmbed/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1
 * @package    NYU_Stream_oEmbed
 * @subpackage NYU_Stream_oEmbed/includes
 * @author     Neel Shah for NYU
 */
class NYU_Stream_oEmbed {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      NYU_Stream_oEmbed_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      string    $NYU_Stream_oEmbed    The string used to uniquely identify this plugin.
	 */
	protected $NYU_Stream_oEmbed;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.1
	 */
	public function __construct() {

		$this->NYU_Stream_oEmbed = 'nyu-stream-oembed';
		$this->version = '0.1';

		$this->load_dependencies();
		$this->set_locale();
		$this->register_oembed();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - NYU_Stream_oEmbed_Loader. Orchestrates the hooks of the plugin.
	 * - NYU_Stream_oEmbed_i18n. Defines internationalization functionality.
	 * - NYU_Stream_oEmbed_register. Registers NYU Stream URL for oEmbed functionality.
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-nyu-stream-oembed-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-nyu-stream-oembed-i18n.php';

		/**
		 * The class responsible for registering NYU Stream oEmbed functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-nyu-stream-oembed-register.php';


		$this->loader = new NYU_Stream_oEmbed_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the NYU_Stream_oEmbed_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new NYU_Stream_oEmbed_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Registers NYU Stream URL for oEmbed functionality
	 *
	 * Uses the NYU_Stream_oEmbed_register class in order to register NYU Stream URL with wordpress
	 *
	 * @since    0.1
	 * @access   private
	 */
	private function register_oembed() {

		$plugin_register = new NYU_Stream_oEmbed_register();

		$this->loader->add_action( 'plugins_loaded', $plugin_register, 'register_nyu_stream_oembed_url' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.1
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.1
	 * @return    string    The name of the plugin.
	 */
	public function get_nyu_stream_oembed() {
		return $this->NYU_Stream_oEmbed;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.1
	 * @return    NYU_Stream_oEmbed_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.1
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}

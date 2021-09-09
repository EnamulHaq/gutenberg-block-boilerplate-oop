<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://boomdevs.com/
 * @since      1.0.0
 *
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/includes
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
 * @since      1.0.0
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/includes
 * @author     BoomDevs <admin@boomdevs.com>
 */
class Multipurpose_Compression_Table {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Multipurpose_Compression_Table_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * This array perform as gutenberg block support
	 *
	 * @var array
	 */
	public $dependencies = array(
		'dependencies' => 
			array(
				'react', 
				'wp-block-editor', 
				'wp-blocks', 
				'wp-components', 
				'wp-compose', 
				'wp-data', 
				'wp-element', 
				'wp-hooks', 
				'wp-i18n', 
				'wp-polyfill'
			),
		'version' => 'ff6151a87d2be0157974803666973f62'
	);

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'MULTIPURPOSE_COMPRESSION_TABLE_VERSION' ) ) {
			$this->version = MULTIPURPOSE_COMPRESSION_TABLE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'multipurpose-compression-table ';

		$this->load_dependencies();
		$this->set_locale();
		$this->initialize_gutenberg_plugin();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Multipurpose_Compression_Table_Loader. Orchestrates the hooks of the plugin.
	 * - Multipurpose_Compression_Table_i18n. Defines internationalization functionality.
	 * - Multipurpose_Compression_Table_Admin. Defines all hooks for the admin area.
	 * - Multipurpose_Compression_Table_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-multipurpose-compression-table-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-multipurpose-compression-table-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-multipurpose-compression-table-admin.php';

		/**
		 * The class responsible for defining all actions that occur in gutenberg block.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-multipurpose-compression-table-blocks.php';
		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-multipurpose-compression-table-public.php';

		$this->loader = new Multipurpose_Compression_Table_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Multipurpose_Compression_Table_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$plugin_i18n = new Multipurpose_Compression_Table_i18n();
		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin = new Multipurpose_Compression_Table_Admin( $this->get_plugin_name(), $this->get_version(), $this->dependencies );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}
	private function initialize_gutenberg_plugin(){
		$gutenberg_block = new BD_Mctb();
		$this->loader->add_filter( 'block_categories_all', $gutenberg_block, 'register_gutenberg_block_category', 10, 2 );
		$this->loader->add_action( 'init', $gutenberg_block, 'gutenberg_block_register' );
	}
	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new Multipurpose_Compression_Table_Public( $this->get_plugin_name(), $this->get_version(),  $this->dependencies );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Multipurpose_Compression_Table_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
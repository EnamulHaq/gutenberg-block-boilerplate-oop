<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://boomdevs.com/
 * @since      1.0.0
 *
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/public
 * @author     BoomDevs <admin@boomdevs.com>
 */
class Multipurpose_Compression_Table_Public {
	public $frontend_style  = 'build/style-index.css';
	public $frontend_script = 'build/frontend.js';
	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	private $block_dependencies;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $dependencies ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->version = $version;
		$this->block_dependencies = $dependencies;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// Register frontend style.
		if ( file_exists( plugin_dir_path( dirname( __FILE__ ) ) . $this->frontend_style ) ) {
			wp_register_style(
				'wdsblocks-style',
				plugin_dir_url( __DIR__ ) .$this->frontend_style,
				[],
				'1.0.0'
			);
		}
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/multipurpose-compression-table-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		// Register frontend script.
		if ( file_exists( plugin_dir_path( dirname( __FILE__ ) ) . $this->frontend_script ) ) {
			wp_enqueue_script(
				'wdsblocks-frontend-script',
				// plugins_url( $this->frontend_script, __FILE__ ),
				plugin_dir_url( __DIR__ ) .$this->frontend_script,
				$this->block_dependencies['dependencies'],
				$this->block_dependencies['version'],
				true
			);
		}
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/multipurpose-compression-table -public.js', array( 'jquery' ), $this->version, false );
	}
}

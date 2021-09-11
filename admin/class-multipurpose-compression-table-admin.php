<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://boomdevs.com/
 * @since      1.0.0
 *
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Multipurpose_Compression_Table
 * @subpackage Multipurpose_Compression_Table/admin
 * @author     BoomDevs <admin@boomdevs.com>
 */
class Multipurpose_Compression_Table_Admin {

	// Define our assets.
	public $editor_script   = 'build/index.js';
	public $editor_style    = 'build/index.css';

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	private $block_dependencies;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version, $dependencies ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->block_dependencies = $dependencies;
		// Verify we have an editor script.
		if ( ! file_exists( plugin_dir_path( dirname( __FILE__ ) ) . $this->editor_script ) ) {
			wp_die( esc_html__( 'Whoops! You need to run `npm run build` for the MCTB Block first.', 'mctb' ) );
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// Register editor style.
		if ( file_exists( plugin_dir_path( dirname( __FILE__ ) ) . $this->editor_style ) ) {
			wp_enqueue_style(
				'mctb-editor-style',
				plugin_dir_url( __DIR__ ) .$this->editor_style,
				[ 'wp-edit-blocks' ],
				'1.0.0'
			);
		}
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/multipurpose-compression-table-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			'mctb-editor-script',
			plugin_dir_url( __DIR__ ) . $this->editor_script,
			$this->block_dependencies['dependencies'],
			$this->block_dependencies['version'],
			true
		);
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/multipurpose-compression-table-admin.js', array( 'jquery' ), $this->version, false );
	}
}

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://boomdevs.com/
 * @since             1.0.0
 * @package           Multipurpose_Compression_Table
 *
 * @wordpress-plugin
 * Plugin Name:       Multipurpose Compression Table
 * Plugin URI:        https://boomdevs.com/multipurpose-compression-table
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            BoomDevs
 * Author URI:        https://boomdevs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       multipurpose-compression-table
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MULTIPURPOSE_COMPRESSION_TABLE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-multipurpose-compression-table-activator.php
 */
function activate_multipurpose_compression_table () {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-multipurpose-compression-table-activator.php';
	Multipurpose_Compression_Table_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-multipurpose-compression-table-deactivator.php
 */
function deactivate_multipurpose_compression_table () {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-multipurpose-compression-table-deactivator.php';
	Multipurpose_Compression_Table_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_multipurpose_compression_table ' );
register_deactivation_hook( __FILE__, 'deactivate_multipurpose_compression_table ' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-multipurpose-compression-table.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_multipurpose_compression_table () {
	$plugin = new Multipurpose_Compression_Table();
	$plugin->run();
}
run_multipurpose_compression_table ();

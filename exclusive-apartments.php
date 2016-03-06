<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://samir.kahvedzic.deviantart.com
 * @since             1.0.0
 * @package           Exclusive_Apartments
 *
 * @wordpress-plugin
 * Plugin Name:       Exclusive Apartments
 * Plugin URI:        http://samirkahvedzic.deviantart.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Samir Kahvedzic
 * Author URI:        http://samir.kahvedzic.deviantart.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       exclusive-apartments
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-exclusive-apartments-activator.php
 */
function activate_exclusive_apartments() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-exclusive-apartments-activator.php';
	Exclusive_Apartments_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-exclusive-apartments-deactivator.php
 */
function deactivate_exclusive_apartments() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-exclusive-apartments-deactivator.php';
	Exclusive_Apartments_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_exclusive_apartments' );
register_deactivation_hook( __FILE__, 'deactivate_exclusive_apartments' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-exclusive-apartments.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_exclusive_apartments() {

	$plugin = new Exclusive_Apartments();
	$plugin->run();

}
run_exclusive_apartments();

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://jayoheff.com
 * @since             1.0.0
 * @package           JayOhEff
 *
 * @wordpress-plugin
 * Plugin Name:       SJS Web Design Listowel Presentation Integration 
 * Plugin URI:        
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            John O'Flaherty SJS Web Design
 * Author URI:        
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jayoheff
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
define( 'sjs_jof_unique_app_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sjs-jof-unique-app-activator.php
 */
function activate_sjs_jof_unique_app() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sjs-jof-unique-app-activator.php';
	sjs_jof_unique_app_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sjs-jof-unique-app-deactivator.php
 */
function deactivate_sjs_jof_unique_app() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sjs-jof-unique-app-deactivator.php';
	sjs_jof_unique_app_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sjs_jof_unique_app' );
register_deactivation_hook( __FILE__, 'deactivate_sjs_jof_unique_app' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sjs-jof-unique-app.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */


add_shortcode("sjs_jof_gallery","sjs_jof_unique_app_gallery_shortcode");
add_shortcode("sjs_jof_calendar","sjs_jof_unique_app_calendar_shortcode");

function run_sjs_jof_unique_app() {

	$plugin = new sjs_jof_unique_app();
	$plugin->run();

}
run_sjs_jof_unique_app();


function sjs_jof_unique_app_gallery_shortcode(){
	ob_start();
	
	sjs_jof_unique_app_display('http://api.uniqueschoolapp.ie/feeds/gallary?idschool=230','sjs-jof-unique-app-public-display_gallery');
    return ob_get_clean();
}

function sjs_jof_unique_app_calendar_shortcode(){
	ob_start();
	
    sjs_jof_unique_app_display('https://api.uniqueschoolapp.ie/feeds/calendar?idschool=230', 'sjs-jof-unique-app-public-display_calendar');
    return ob_get_clean();
}

function sjs_jof_unique_app_display($api, $filename)
{
	$result = wp_remote_get($api);
	
	//echo "<pre>".print_r($result)."</pre>";
	require_once plugin_dir_path( __FILE__ ) .  'public/partials/'.$filename.'.php';
    
}
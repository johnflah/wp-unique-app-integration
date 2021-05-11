<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    sjs_jof_unique_app
 * @subpackage sjs_jof_unique_app/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    sjs_jof_unique_app
 * @subpackage sjs_jof_unique_app/public
 * @author     Your Name <email@example.com>
 */
class sjs_jof_unique_app_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $sjs_jof_unique_app    The ID of this plugin.
	 */
	private $sjs_jof_unique_app;

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
	 * @param      string    $sjs_jof_unique_app       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $sjs_jof_unique_app, $version ) {

		$this->sjs_jof_unique_app = $sjs_jof_unique_app;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in sjs_jof_unique_app_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The sjs_jof_unique_app_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->sjs_jof_unique_app, plugin_dir_url( __FILE__ ) . 'css/sjs-jof-unique-app-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in sjs_jof_unique_app_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The sjs_jof_unique_app_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->sjs_jof_unique_app, plugin_dir_url( __FILE__ ) . 'js/sjs-jof-unique-app-public.js', array( 'jquery' ), $this->version, false );

	}

}

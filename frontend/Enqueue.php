<?php
/**
 * Tasmota_Device_Manager
 *
 * @package   Tasmota_Device_Manager
 * @author    Marius Bezuidenhout <marius.bezuidenhout@gmail.com>
 * @copyright 2021
 * @license   GPL 2.0+
 * @link      https://profiles.wordpress.org/mbezuidenhout/
 */

namespace Tasmota_Device_Manager\Frontend;

use Tasmota_Device_Manager\Engine\Base;

/**
 * Enqueue stuff on the frontend
 */
class Enqueue extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		// Load public-facing style sheet and JavaScript.
		\add_action( 'wp_enqueue_scripts', array( self::class, 'enqueue_styles' ) );
		\add_action( 'wp_enqueue_scripts', array( self::class, 'enqueue_scripts' ) );
		\add_action( 'wp_enqueue_scripts', array( self::class, 'enqueue_js_vars' ) );
	}


	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function enqueue_styles() {
		\wp_enqueue_style( TDM_TEXTDOMAIN . '-plugin-styles', \plugins_url( 'assets/css/public.css', TDM_PLUGIN_ABSOLUTE ), array(), TDM_VERSION );
	}


	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function enqueue_scripts() {
		\wp_enqueue_script( TDM_TEXTDOMAIN . '-plugin-script', \plugins_url( 'assets/js/public.js', TDM_PLUGIN_ABSOLUTE ), array( 'jquery' ), TDM_VERSION, false );
	}


	/**
	 * Print the PHP var in the HTML of the frontend for access by JavaScript.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function enqueue_js_vars() {
		\wp_localize_script(
			TDM_TEXTDOMAIN . '-plugin-script',
			'tdm_js_vars',
			array(
				'alert' => \__( 'Hey! You have clicked the button!', TDM_TEXTDOMAIN ),
			)
		);
	}


}

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

namespace Tasmota_Device_Manager\Backend;

use Tasmota_Device_Manager\Engine\Base;

/**
 * This class contain the Enqueue stuff for the backend
 */
class Enqueue extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
			return;
		}

		// Load admin style sheet and JavaScript.
		\add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		\add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}


	/**
	 * Register and enqueue admin-specific style sheet.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin_styles() {
		$admin_page = \get_current_screen();

		if ( !\is_null( $admin_page ) && 'toplevel_page_tasmota-device-manager' === $admin_page->id ) {
			\wp_enqueue_style( TDM_TEXTDOMAIN . '-settings-styles', \plugins_url( 'assets/css/settings.css', TDM_PLUGIN_ABSOLUTE ), array( 'dashicons' ), TDM_VERSION );
		}

		\wp_enqueue_style( TDM_TEXTDOMAIN . '-admin-styles', \plugins_url( 'assets/css/admin.css', TDM_PLUGIN_ABSOLUTE ), array( 'dashicons' ), TDM_VERSION );
	}

	/**
	 * Register and enqueue admin-specific JavaScript.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_admin_scripts() {
		$admin_page = \get_current_screen();

		if ( !\is_null( $admin_page ) && 'toplevel_page_tasmota-device-manager' === $admin_page->id ) {
			\wp_enqueue_script( TDM_TEXTDOMAIN . '-settings-script', \plugins_url( 'assets/js/settings.js', TDM_PLUGIN_ABSOLUTE ), array( 'jquery', 'jquery-ui-tabs' ), TDM_VERSION, false );
		}

		\wp_enqueue_script( TDM_TEXTDOMAIN . '-admin-script', \plugins_url( 'assets/js/admin.js', TDM_PLUGIN_ABSOLUTE ), array( 'jquery' ), TDM_VERSION, false );
	}


}

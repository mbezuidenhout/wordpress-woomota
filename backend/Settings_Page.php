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
 * Create the settings page in the backend
 */
class Settings_Page extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
			return;
		}

		// Add the options page and menu item.
		\add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) );

		add_action( 'cmb2_save_field', array( $this, 'save_field' ), 10, 4 );

		$realpath        = (string) \realpath( \dirname( __FILE__ ) );
		$plugin_basename = \plugin_basename( \plugin_dir_path( $realpath ) . TDM_TEXTDOMAIN . '.php' );
		\add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );
	}

	/**
	 * @param string $field_id update/removed
	 * @param array|bool $updated
	 * @param string $action
	 * @param \CMB2_Field $field
	 *
	 * @return void
	 */
	function save_field( $field_id, $updated, $action, $field ) {
		if ( 'updated' === $action ) {
			// Remove apikey if any settings has been updated.
			$options = \CMB2_Options::get( TDM_TEXTDOMAIN . '-settings' );
			$options->remove( 'apikey' );
		}
	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function add_plugin_admin_menu() {
		/*
		 * Add a settings page for this plugin to the Settings menu
		 *
		 * @TODO:
		 *
		 * - Change 'manage_options' to the capability you see fit
		 *   For reference: http://codex.wordpress.org/Roles_and_Capabilities

		add_options_page( __( 'Page Title', TDM_TEXTDOMAIN ), TDM_NAME, 'manage_options', TDM_TEXTDOMAIN, array( $this, 'display_plugin_admin_page' ) );
		 *
		 */
		/*
		 * Add a settings page for this plugin to the main menu
		 *
		 */
		\add_menu_page( \__( 'Tasmota Device Manager Settings', TDM_TEXTDOMAIN ), TDM_NAME, 'manage_options', TDM_TEXTDOMAIN, array( $this, 'display_plugin_admin_page' ), 'dashicons-hammer', 90 );
	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function display_plugin_admin_page() {
		include_once TDM_PLUGIN_ROOT . 'backend/views/admin.php';
	}

	/**
	 * Add settings action link to the plugins page.
	 *
	 * @since 1.0.0
	 * @param array $links Array of links.
	 * @return array
	 */
	public function add_action_links( array $links ) {
		return \array_merge(
			array(
				'settings' => '<a href="' . \admin_url( 'options-general.php?page=' . TDM_TEXTDOMAIN ) . '">' . \__( 'Settings', TDM_TEXTDOMAIN ) . '</a>',
				'donate'   => '<a href="https://www.paypal.com/donate/?hosted_button_id=K6PC6XULY5LLE">' . \__( 'Donate', TDM_TEXTDOMAIN ) . '</a>',
			),
			$links
		);
	}

}

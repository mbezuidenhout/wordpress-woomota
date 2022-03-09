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

namespace Tasmota_Device_Manager\Integrations;

use Tasmota_Device_Manager\Engine\Base;

/**
 * All the CMB related code.
 */
class CMB extends Base {

	/**
	 * Initialize class.
	 *
	 * @since 1.0.0
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		require_once TDM_PLUGIN_ROOT . 'vendor/cmb2/init.php';
		require_once TDM_PLUGIN_ROOT . 'vendor/cmb2-grid/Cmb2GridPluginLoad.php';
		\add_action( 'cmb2_init', array( $this, 'cmb_demo_metaboxes' ) );
		if ( \key_exists( '_peruser', $this->settings ) && $this->settings['_peruser'] == 'on') {
			\add_action( 'cmb2_admin_init', array( $this, 'tdm_register_user_profile_metabox' ) );
		}
	}

	public function tdm_register_user_profile_metabox() {
		$prefix = 'tdm_user_';

		/**
		 * Metabox for the user profile screen
		 */
		$cmb_user = new_cmb2_box( array(
			'id'               => $prefix . 'edit',
			'title'            => esc_html__( 'User Profile Metabox', 'cmb2' ), // Doesn't output for user boxes
			'object_types'     => array( 'user' ), // Tells CMB2 to use user_meta vs post_meta
			'show_names'       => true,
			'new_user_section' => 'add-new-user', // where form will show on new user page. 'add-existing-user' is only other valid option.
		) );

		$cmb_user->add_field( array(
			'name'     => esc_html__( 'WooMota', TDM_TEXTDOMAIN ),
			'desc'     => esc_html__( 'MQTT server settings for WooMota', TDM_TEXTDOMAIN ),
			'id'       => $prefix . 'woomota',
			'type'     => 'title',
			'on_front' => false,
		) );

		$cmb_user->add_field( array(
			'name'    => esc_html__( 'Host', TDM_TEXTDOMAIN ),
			'desc'    => esc_html__( 'Host name for MQTT server', TDM_TEXTDOMAIN ),
			'id'      => $prefix . 'host',
			'type'    => 'text',
			'default' => 'tcp://mqtt.example.com:1883/',
		) );

		$cmb_user->add_field( array(
			'name' => esc_html__( 'Username', TDM_TEXTDOMAIN ),
			'desc' => esc_html__( 'MQTT server username', TDM_TEXTDOMAIN ),
			'id'   => $prefix . 'username',
			'type' => 'text',
		) );

		$cmb_user->add_field( array(
			'name' => esc_html__( 'Password', TDM_TEXTDOMAIN ),
			'desc' => esc_html__( 'MQTT server password', TDM_TEXTDOMAIN ),
			'id'   => $prefix . 'password',
			'type' => 'text',
		) );

		$cmb_user->add_field( array(
			'name' => esc_html__( 'Full topic', TDM_TEXTDOMAIN ),
			'desc' => esc_html__( 'Custom MQTT fulltopic', TDM_TEXTDOMAIN ),
			'id'   => $prefix . 'fulltopic',
			'type' => 'text',
			'default' => '%prefix%/%topic%',
		) );

	}

	/**
	 * Your metabox on Demo CPT
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function cmb_demo_metaboxes() {
		// Start with an underscore to hide fields from custom fields list
		$prefix   = '_demo_';
		$cmb_demo = \new_cmb2_box(
			array(
				'id'           => $prefix . 'metabox',
				'title'        => \__( 'Demo Metabox', TDM_TEXTDOMAIN ),
				'object_types' => array( 'demo' ),
				'context'      => 'normal',
				'priority'     => 'high',
				'show_names'   => true, // Show field names on the left
		)
			);
		$cmb2Grid = new \Cmb2Grid\Grid\Cmb2Grid( $cmb_demo ); //phpcs:ignore WordPress.NamingConventions
		$row      = $cmb2Grid->addRow(); //phpcs:ignore WordPress.NamingConventions
		$field1 = $cmb_demo->add_field(
			array(
				'name' => \__( 'Text', TDM_TEXTDOMAIN ),
				'desc' => \__( 'field description (optional)', TDM_TEXTDOMAIN ),
				'id'   => $prefix . TDM_TEXTDOMAIN . '_text',
				'type' => 'text',
				)
			);
		$field2 = $cmb_demo->add_field(
			array(
				'name' => \__( 'Text 2', TDM_TEXTDOMAIN ),
				'desc' => \__( 'field description (optional)', TDM_TEXTDOMAIN ),
				'id'   => $prefix . TDM_TEXTDOMAIN . '_text2',
				'type' => 'text',
				)
			);

		$field3 = $cmb_demo->add_field(
			array(
				'name' => \__( 'Text Small', TDM_TEXTDOMAIN ),
				'desc' => \__( 'field description (optional)', TDM_TEXTDOMAIN ),
				'id'   => $prefix . TDM_TEXTDOMAIN . '_textsmall',
				'type' => 'text_small',
				)
			);
		$field4 = $cmb_demo->add_field(
			array(
				'name' => \__( 'Text Small 2', TDM_TEXTDOMAIN ),
				'desc' => \__( 'field description (optional)', TDM_TEXTDOMAIN ),
				'id'   => $prefix . TDM_TEXTDOMAIN . '_textsmall2',
				'type' => 'text_small',
		)
			);
		$row->addColumns( array( $field1, $field2 ) );
		$row = $cmb2Grid->addRow(); //phpcs:ignore WordPress.NamingConventions
		$row->addColumns( array( $field3, $field4 ) );
	}

}

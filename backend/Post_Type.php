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
class Post_Type extends Base {
	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		if ( ! parent::initialize() ) {
			return;
		}
		// Add a post display state for special WC pages.
		add_filter( 'display_post_states', array( $this, 'add_display_post_states' ), 10, 2 );
	}

	/**
	 * Add a post display state for special pages in the page list table.
	 *
	 * @param array $post_states An array of post display states.
	 * @param WP_Post $post The current post object.
	 */
	public function add_display_post_states( $post_states, $post ) {
		if ( (int)$this->settings['devices_page_id'] === $post->ID ) {
			$post_states['page_for_devices'] = __( 'Devices Page', \TDM_TEXTDOMAIN );
		}

		return $post_states;
	}
}

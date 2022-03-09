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
use Tasmota_Device_Manager\Integrations\Swagger;

/**
 * Enqueue stuff on the frontend
 */
class Template extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		\add_filter('template_include', array( $this, 'maybe_set_template' ) );
	}

	/**
	 * Filters the path of the current template before including it.
	 * If file is not found then it might be one of the files handled by this js package manager.
	 *
	 * @since    1.0.0
	 *
	 * @param string $template The path of the template to include.
	 * @return string
	 */
	public function maybe_set_template( $template ) {
		global $post;
		if ( $post instanceof \WP_Post && $post->ID == $this->settings['devices_page_id'] ) {
			return \wpbp_get_template_part( TDM_TEXTDOMAIN, 'content', 'devices', true );
		}

		return $template;
	}
}

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
 * Fake Pages inside WordPress
 */
class FakePage extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		new \Fake_Page(
			array(
				'slug'         => 'fake_slug',
				'post_title'   => 'Fake Page Title',
				'post_content' => 'This is the fake page content',
			)
		);
	}

}

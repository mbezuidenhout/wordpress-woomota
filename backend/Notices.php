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
use Yoast_I18n_WordPressOrg_v3;

/**
 * Everything that involves notification on the WordPress dashboard
 */
class Notices extends Base {

	/**
	 * Initialize the class
	 *
	 * @return void|bool
	 */
	public function initialize() {
		if ( !parent::initialize() ) {
			return;
		}

		\wpdesk_wp_notice( \__( 'Updated Messages', TDM_TEXTDOMAIN ), 'updated' );
		\wpdesk_wp_notice( \__( 'This is my dismissible notice', TDM_TEXTDOMAIN ), 'error', true );

		/*
		 * Review plugin notice.
		 */
		new \WP_Review_Me(
			array(
				'days_after' => 15,
				'type'       => 'plugin',
				'slug'       => TDM_TEXTDOMAIN,
				'rating'     => 5,
				'message'    => \__( 'Review me!', TDM_TEXTDOMAIN ),
				'link_label' => \__( 'Click here to review', TDM_TEXTDOMAIN ),
			)
		);

		/*
		 * Alert after few days to suggest to contribute to the localization if it is incomplete
		 * on translate.wordpress.org, the filter enables to remove globally.
		 */
		if ( \apply_filters( 'tasmota_device_manager_alert_localization', true ) ) {
			new Yoast_I18n_WordPressOrg_v3(
			array(
				'textdomain'  => TDM_TEXTDOMAIN,
				'tasmota_device_manager' => TDM_NAME,
				'hook'        => 'admin_notices',
			),
			true
			);
		}

	}

}

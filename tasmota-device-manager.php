<?php

/**
 * @package   Tasmota_Device_Manager
 * @author    Marius Bezuidenhout <marius.bezuidenhout@gmail.com>
 * @copyright 2021
 * @license   GPL 2.0+
 * @link      https://profiles.wordpress.org/mbezuidenhout/
 *
 * Plugin Name:     Tasmota Device Manager
 * Plugin URI:      https://github.com/mbezuidenhout/wordpress-woomota/
 * Description:     Get telemetry data from your Tasmota devices. Requires an MQTT connection.
 * Version:         1.0.0
 * Author:          Marius Bezuidenhout
 * Author URI:      https://profiles.wordpress.org/mbezuidenhout/
 * Text Domain:     tasmota-device-manager
 * License:         GPL 2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Domain Path:     /languages
 * Requires PHP:    7.0
 * WordPress-Plugin-Boilerplate-Powered: v3.2.0
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
	die( 'We\'re sorry, but you can not directly access this file.' );
}

define( 'TDM_VERSION', '1.0.0' );
define( 'TDM_TEXTDOMAIN', 'tasmota-device-manager' );
define( 'TDM_NAME', 'WooMota' );
define( 'TDM_PLUGIN_ROOT', plugin_dir_path( __FILE__ ) );
define( 'TDM_PLUGIN_ABSOLUTE', __FILE__ );
define( 'TDM_MIN_PHP_VERSION', '7.4' );
define( 'TDM_WP_VERSION', '5.3' );

add_action(
	'init',
	static function () {
		load_plugin_textdomain( TDM_TEXTDOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	);

if ( version_compare( PHP_VERSION, TDM_MIN_PHP_VERSION, '<=' ) ) {
	add_action(
		'admin_init',
		static function() {
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}
	);
	add_action(
		'admin_notices',
		static function() {
			echo wp_kses_post(
			sprintf(
				'<div class="notice notice-error"><p>%s</p></div>',
				sprintf(__( '"Tasmota Device Manager" requires PHP %s or newer.', TDM_TEXTDOMAIN ), TDM_MIN_PHP_VERSION)
			)
			);
		}
	);

	// Return early to prevent loading the plugin.
	return;
}

$tasmota_device_manager_libraries = require_once TDM_PLUGIN_ROOT . 'vendor/autoload.php';

require_once TDM_PLUGIN_ROOT . 'functions/functions.php';
require_once TDM_PLUGIN_ROOT . 'functions/debug.php';

// Add your new plugin on the wiki: https://github.com/WPBP/WordPress-Plugin-Boilerplate-Powered/wiki/Plugin-made-with-this-Boilerplate

$requirements = new \Micropackage\Requirements\Requirements(
	'Tasmota Device Manager',
	array(
		'php'            => TDM_MIN_PHP_VERSION,
		'php_extensions' => array( 'mbstring' ),
		'wp'             => TDM_WP_VERSION,
		'plugins'            => array(
			array( 'file' => 'font-awesome/index.php', 'name' => 'Font Awesome', 'version' => '4.1.1' )
		),
	)
);
/*
new Fake_Page(
	array(
		'slug' => 'devices',
		'post_title' => 'Fake Page Title',
		'post_content' => 'This is the fake page content'
	)
);
*/
if ( ! $requirements->satisfied() ) {
	$requirements->print_notice();

	return;
}


/**
 * Create a helper function for easy SDK access.
 *
 * @global type $tdm_fs
 * @return object
 */
function tdm_fs() {
	global $tdm_fs;

	if ( !isset( $tdm_fs ) ) {
		require_once TDM_PLUGIN_ROOT . 'vendor/freemius/wordpress-sdk/start.php';
		$tdm_fs = fs_dynamic_init(
			array(
				'id'             => '',
				'slug'           => 'tasmota-device-manager',
				'public_key'     => '',
				'is_live'        => false,
				'is_premium'     => true,
				'has_addons'     => false,
				'has_paid_plans' => true,
				'menu'           => array(
					'slug' => 'tasmota-device-manager',
				),
			)
		);

		if ( $tdm_fs->is_premium() ) {
			$tdm_fs->add_filter(
				'support_forum_url',
				static function ( $wp_org_support_forum_url ) { //phpcs:ignore
					return 'https://your-url.test';
				}
			);
		}
	}

	return $tdm_fs;
}

// tdm_fs();

// Documentation to integrate GitHub, GitLab or BitBucket https://github.com/YahnisElsts/plugin-update-checker/blob/master/README.md
Puc_v4_Factory::buildUpdateChecker( 'https://github.com/mbezuidenhout/tasmota-device-manager/', __FILE__, 'tasmota-device-manager' );

if ( ! wp_installing() ) {
	add_action(
		'plugins_loaded',
		static function () use ( $tasmota_device_manager_libraries ) {
			new \Tasmota_Device_Manager\Engine\Initialize( $tasmota_device_manager_libraries );
		}
	);
}

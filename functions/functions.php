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

/**
 * Get the settings of the plugin in a filterable way
 *
 * @since 1.0.0
 * @return array
 */
function tdm_get_settings() {
	return apply_filters( 'tdm_get_settings', get_option( TDM_TEXTDOMAIN . '-settings' ) );
}

function woomota_page_title( $echo = true ) {
	$settings = tdm_get_settings();
	$devices_page_id = $settings['devices_page_id'];
	$page_title   = get_the_title( $devices_page_id );
	if( $echo ) {
		echo esc_html( $page_title );
	} else {
		return $page_title;
	}
}

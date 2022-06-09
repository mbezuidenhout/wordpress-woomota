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

/**
 * @param int $t Duration
 * @param bool $short Show the longest duration only
 *
 * Convert duration in seconds to days, hours, minutes
 *
 * @return string
 */
function durationToHumanReadable( $t, $short = false ) {
	$s = $t % 60;
	$m = floor( ( $t % 3600 ) / 60 );
	$h = floor( ( $t % 86400 ) / 3600 );
	$d = floor( ( $t % 2592000 ) / 86400 );
	$parts = array();
	if ( $d > 0 ) {
		$parts[] = $d . " day" . ($d == 1 ? "" : "s");
	}
	if ( $h > 0 ) {
		$parts[] = $h . " hour" . ($h == 1 ? "" : "s");
	}
	if ( $m > 0 ) {
		$parts[] = $m . " minute" . ($m == 1 ? "" : "s");
	}
	if ( $s > 0 ) {
		$parts[] = $d . " second" . ($s == 1 ? "" : "s");
	}
	if ( $short ) {
		return $parts[0];
	}
	return implode(", ",  $parts);
}

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

$tdm_debug = new WPBP_Debug( __( 'Plugin Name', TDM_TEXTDOMAIN ) );

/**
 * Log text inside the debugging plugins.
 *
 * @param string $text The text.
 * @return void
 */
function tdm_log( string $text ) {
	global $tdm_debug;
	$tdm_debug->log( $text );
}

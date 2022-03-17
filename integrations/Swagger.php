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

use Swagger\Client\Configuration;
use Swagger\Client\Model\Device;
use Swagger\Client\Model\Session;
use Tasmota_Device_Manager\Engine\Base;

/**
 * Tasmota Device Manager server connection via Swagger OpenAPI
 */
class Swagger extends Base {

	/**
	 * Initialize the class.
	 *
	 * @return void|bool
	 */
	public function initialize() {
		parent::initialize();

		if ( \is_user_logged_in() ) {
			// User must be logged in to see device list
			\add_action( 'woomota_devices_get', array( $this, 'devices_get' ) );
		}
	}

	/**
	 * @param string $host
	 * @param string $username
	 * @param string $password
	 * @param string $customTopic
	 *
	 * @return Session
	 * @throws \Exception
	 */
	private static function connect( $host, $username, $password, $customTopic = '' ) {
		$mqttOptions = new \Swagger\Client\Model\MQTTOptions( array(
			'host'     => $host,
			'username' => $username,
			'password' => $password,
		) );
		if ( ! empty( $customTopic ) )
			$mqttOptions->setCustomTopic( $customTopic );
		$mqttApiInstance = new \Swagger\Client\Api\SessionApi(
			new \GuzzleHttp\Client(['verify' => false])
		);
		$session = $mqttApiInstance->mqttConnectPost( $mqttOptions );
		return $session;
	}

	/**
	 * Check if session is still valid otherwise reconnect using $host, $username and $password
	 *
	 * @param string $host
	 * @param string $username
	 * @param string $password
	 * @param string $customTopic
	 * @param string $apikey
	 *
	 * @return string|null
	 */
	private static function maybe_connect( $host, $username, $password, $customTopic = '', $apikey = '' ) {
		if (!empty( $apikey )) {
			$authConfig = new Configuration();
			$authConfig->setApiKey('X-API-KEY', $apikey);

			$sessionApiInstance = new \Swagger\Client\Api\SessionApi(
			// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
			// This is optional, `GuzzleHttp\Client` will be used as default.
				new \GuzzleHttp\Client(['verify' => false]),
				$authConfig
			);

			try {
				$sessionApiInstance->mqttGet();
				$session = $apikey;
			} catch(\Exception $e) {
				$session = self::connect( $host, $username, $password, $customTopic );
			}
		} else {
			$session = self::connect( $host, $username, $password, $customTopic );
		}
		if($session instanceof Session) {
			return $session->getApikey();
		} else {
			return $session;
		}
	}

	/**
	 * Get the list of devices. If $show is true then output
	 *
	 * @param bool $show Output devices template if set to tru
	 *
	 * @return Device[]
	 */
	public function devices_get($show = true) {
		if ( \key_exists( '_peruser', $this->settings ) && $this->settings['_peruser'] == 'on') {
			$user = \wp_get_current_user();
			$cachedApiKey  = $user->get( 'tdm_user_apikey' );
			$host = $user->get( 'tdm_user_host' );
			$username = $user->get( 'tdm_user_username' );
			$password = $user->get( 'tdm_user_password' );
			$customTopic = $user->get( 'tdm_fulltopic' );
			try {
				$apiKey = self::maybe_connect( $host, $username, $password, $customTopic, $cachedApiKey );
				\update_user_meta( $user->ID, 'tdm_user_apikey', $apiKey, $cachedApiKey );
				// If config is per user then get settings from user profile, otherwise get from global
			} catch (\Exception $e) {
				if( $show ) {
					global $error;
					$error = $e;
					\wpbp_get_template_part( TDM_TEXTDOMAIN,  'content-widget', 'error', true);
				}
				return null;
			}
		} else {
			if ( \key_exists( 'apikey', $this->settings ) )
				$apiKey = $this->settings['apikey'];
			else
				$apiKey = '';
			$host = $this->settings['host'];
			$username = $this->settings['username'];
			$password = $this->settings['password'];
			$customTopic = $this->settings['fulltopic'];
			try {
				$apiKey             = self::maybe_connect( $host, $username, $password, $customTopic, $apiKey );
				$settings           = get_option( TDM_TEXTDOMAIN . '-settings' );
				$settings['apikey'] = $apiKey;
				//$options = \CMB2_Options::get( TDM_TEXTDOMAIN . '-settings' );
				update_option( TDM_TEXTDOMAIN . '-settings', $settings );
			} catch (\Exception $e) {
				if( $show ) {
					global $error;
					$error = $e;
					\wpbp_get_template_part( TDM_TEXTDOMAIN,  'content-widget', 'error', true);
				}
				return null;
			}
		}

		$authConfig = new Configuration();
		$authConfig->setApiKey( 'X-API-KEY', $apiKey );

		$deviceApiInstance = new \Swagger\Client\Api\DeviceApi(
			// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
			// This is optional, `GuzzleHttp\Client` will be used as default.
			new \GuzzleHttp\Client(['verify' => false]),
			$authConfig
		);
		/**
		 * @var $devices Device[]
		 */
		$devices = $deviceApiInstance->devicesPost();

		$sensorApiInstance = new \Swagger\Client\Api\SensorApi(
		// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
		// This is optional, `GuzzleHttp\Client` will be used as default.
			new \GuzzleHttp\Client(['verify' => false]),
			$authConfig
		);

		if ( $show )
		{
			global $tdm_device, $sensors;
			if (is_array( $devices ) ) :
				foreach ( $devices as $device_name => $device_properties ) :
					echo "<li class=\"device\">";
					$tdm_device      = $device_properties;
					$sensors         = $sensorApiInstance->sensorsDeviceTopicGet( $device_properties->getTopic() );
					\wpbp_get_template_part( TDM_TEXTDOMAIN, 'content-widget', 'device', true );
					echo "</li>";
				endforeach; // End of the loop.
			endif;
		}
	}
}

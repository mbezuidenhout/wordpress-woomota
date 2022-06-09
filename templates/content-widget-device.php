<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * @var \Swagger\Client\Model\Device $tdm_device
 * $sensors is a multi-dimensional array of sensors connected to the device
 */
global $tdm_device, $sensors;

$wifiSignalDbm = $tdm_device->getWifi()->getSignal();
$wifiSignal = ""; // Lowest signal level

if( $wifiSignalDbm > -50 ) {
	$wifiSignal = "strong";
} elseif( $wifiSignalDbm > -67 ) {
	$wifiSignal = "medium";
} elseif( $wifiSignalDbm > -70 ) {
	$wifiSignal = "weak";
}

if ( false === $tdm_device->getOnline() )
	$wifiSignal = "";

?>
<div class="sc-controller">
	<div class="sc-header">
		<button title="Settings" type="button" aria-hidden="true" class="settings" data-controller-id="<?php echo $tdm_device->getTopic() ?>"><i class="fa fa-gear"></i></button>
		<!-- Add edit function for name -->
		<span title="Controller name"><?php esc_html_e( $tdm_device->getDeviceName() ?: $tdm_device->getTopic(), TDM_TEXTDOMAIN ) ?></span>
		<div class="signal-icon <?php echo esc_attr($wifiSignal) ?>" title="<?php echo $wifiSignal ?> wi-fi signal">
			<div class="signal-bar"></div>
			<div class="signal-bar"></div>
			<div class="signal-bar"></div>
		</div>
	</div>
	<div class="sc-settings collapse" id="<?php echo $tdm_device->getTopic() ?>-settings">
		<form>
			<input type="string" value="<?php echo $tdm_device->getDeviceName() ?>">
			<button>Permit join</button>
			<input type="string" value="<?php echo $tdm_device->getTimezone() ?>">
			<?php echo $tdm_device->getStatusFwr()->getVersion() ?>
			<input type="submit">
		</form>
	</div>
	<div class="sc-sensors">
		<?php
		if ( key_exists("Zigbee", $sensors) ) :
			foreach ( $sensors["Zigbee"] as $sensor ) : ?>
				<?php
				$faBatteryLevel = "empty";
				if ( $sensor["BatteryPercentage"] > 90) {
					$faBatteryLevel = "full";
				} elseif ( $sensor["BatteryPercentage"] > 70 ) {
					$faBatteryLevel = "three-quarters";
				} elseif ( $sensor["BatteryPercentage"] > 45 ) {
					$faBatteryLevel = "half";
				} elseif ( $sensor["BatteryPercentage"] > 20 ) {
					$faBatteryLevel = "quarter";
				}
				?>
			<div class="sc-sensor" title="Sensor">
				<button title="Settings" type="button" aria-hidden="true" class="settings" data-sensor-id="<?php echo $tdm_device->getTopic() . "-" . $sensor["Device"] ?>"><i class="fa fa-gear"></i></button>
				<!-- Add edit function for name -->
				<div class="device-parameter name" title="Sensor name"><?php echo key_exists("Name", $sensor)?$sensor["Name"]:$sensor["Device"] ?></div>
				<div class="device-parameter temperature" title="Temperature"><i class="fa fa-thermometer-half" aria-hidden="true"></i><?php echo $sensor["Temperature"] ?>°C</div>
				<div class="device-parameter humidity" title="Humidity"><i class="fa fa-tint" aria-hidden="true"></i><?php echo $sensor["Humidity"] ?>%</div>
				<div class="device-parameter battery" title="State of charge at <?php echo $sensor["BatteryPercentage"] ?>%"><i class="fa fa-battery-<?php echo $faBatteryLevel ?>" aria-hidden="true"></i></div>
				<div class="device-parameter last-seen" title="Last seen"><i class="fa fa-history" aria-hidden="true"></i><?php echo durationToHumanReadable($lastSeen = time() - $sensor["LastSeenEpoch"], true) ?></div>
			</div>
			<div class="sc-settings collapse" id="<?php echo $tdm_device->getTopic() . "-" . $sensor["Device"] ?>-settings">
				<form>
					<input type="string" value="<?php echo key_exists("Name", $sensor)?$sensor["Name"]:$sensor["Device"] ?>">
					<input type="checkbox" name="humidity" id="<?php echo $tdm_device->getTopic() . "-" . $sensor["Device"] ?>-humidity">
					<label for="<?php echo $tdm_device->getTopic() . "-" . $sensor["Device"] ?>-humidity">Normal humidity reporting</label>
					<input type="submit">
				</form>
			</div>
			<?php
			endforeach;
		endif;
		?>
	</div>
</div>

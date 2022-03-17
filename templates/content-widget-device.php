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


?>
<div class="device-container">
	<div class="device-name"><?php esc_html_e( $tdm_device->getName(), TDM_TEXTDOMAIN ) ?>
		<?php
		if ($tdm_device->getOnline() && $tdm_device->getStatusNet() instanceof \Swagger\Client\Model\Network) :
			printf( '<a href="%s" target="_blank"><i class="fas fa-external-link-alt"></i></a>', esc_url( 'http://' . $tdm_device->getStatusNet()->getIpAddress() ) );
		else: ?>
			<i class="fa fa-unlink" aria-hidden="true"></i>
		<?php
		endif;
		?>
	</div>
	<div class="device-parameter device-version"><?php echo $tdm_device->getStatusFwr()->getVersion() ?></div>
	<?php
	if ( key_exists("Zigbee", $sensors) ) :
		foreach ( $sensors["Zigbee"] as $sensor ) : ?>
			<div class="device-parameter"><?php echo key_exists("Name", $sensor)?$sensor["Name"]:$sensor["Device"] ?></div>
			<div class="device-parameter"><?php echo $sensor["Temperature"] ?>°C</div>
			<div class="device-parameter"><?php echo $sensor["Humidity"] ?>%</div>
			<div class="device-parameter"><?php echo $sensor["BatteryPercentage"] ?>%</div>
		<?php
		endforeach;
	endif;
	?>
</div>

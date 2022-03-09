<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

defined( 'ABSPATH' ) || exit;

/** @var $tdm_device \Swagger\Client\Model\Device */
global $tdm_device, $tdm_device_name;
?>
<div class="device-container">
	<div class="device-parameter device-name"><?php esc_html_e( $tdm_device_name, TDM_TEXTDOMAIN ) ?>
		<?php echo (false === $tdm_device->getOnline() ? '<i class="fa fa-chain-broken" aria-hidden="true" />' : '<i class="fa fa-link" aria-hidden="true" />') ?>
	</div>
	<?php if($tdm_device->getStatusNet() instanceof \Swagger\Client\Model\Network ): ?>
		<?php
			if (true === $tdm_device->getOnline()) :
				printf( '<a href="%s" target="_blank"><i class="fas fa-external-link-alt" /></a>', esc_url( 'http://' . $tdm_device->getStatusNet()->getIpAddress() ) );
			endif;
		?>

	<?php endif; ?>
	<div class="device-parameter">Signal</div>
</div>

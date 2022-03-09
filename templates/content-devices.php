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

get_header( 'devices' );
?>
	<header class="woomota-devices-header">
		<?php if ( apply_filters( 'woomota_show_page_title', true ) ) : ?>
			<h1 class="woomota-devices-header__title page-title"><?php woomota_page_title(); ?></h1>
		<?php endif; ?>
	</header>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<ul class="devices columns-3">
			<?php
				do_action('woomota_devices_get', true);
			?>
			</ul>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'woomota_sidebar' );
get_footer( 'devices' );

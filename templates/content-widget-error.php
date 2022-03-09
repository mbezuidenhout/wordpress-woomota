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

/** @var $error \Exception */
global $error;
?>
<div>
	An error has occured. <?php echo $error->getMessage() ?>
</div>

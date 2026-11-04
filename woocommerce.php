<?php
/**
 * WooCommerce wrapper: shop, product categories, single products.
 * Cart, checkout and account pages use page.php (they are normal pages).
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$cts_heading = is_product() ? '' : woocommerce_page_title( false );
?>
<?php if ( $cts_heading ) : ?>
	<section class="page-hero cts-dark shop-hero">
		<div class="cts-container cts-stack">
			<p class="cts-eyebrow"><?php esc_html_e( 'STEM Shop', 'cycletechsa' ); ?></p>
			<h1><?php echo esc_html( $cts_heading ); ?></h1>
			<?php if ( is_shop() && ! is_search() ) : ?>
				<p class="cts-lead" style="max-width:600px"><?php esc_html_e( 'Electronics, coding and science kits for learners, classrooms and makers — delivered across South Africa.', 'cycletechsa' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<div class="cts-container entry shop-wrap">
	<?php woocommerce_content(); ?>
</div>
<?php
get_footer();

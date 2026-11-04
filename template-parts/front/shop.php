<?php
/**
 * Homepage STEM shop teaser + latest WooCommerce products.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_count = absint( cts_mod( 'shop_products' ) );
?>
<section id="shop" class="cts-section">
	<div class="cts-container">
		<div class="shop-teaser">
			<div class="shop-teaser__media">
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/photo-usb-c.jpg' ) ); ?>" alt="" width="1600" height="1067" loading="lazy" decoding="async">
			</div>
			<div class="shop-teaser__body">
				<p class="cts-eyebrow"><?php esc_html_e( 'STEM Shop', 'cycletechsa' ); ?></p>
				<h2 class="cts-h2"><?php esc_html_e( 'Kits that get young South Africans building.', 'cycletechsa' ); ?></h2>
				<p class="cts-muted"><?php esc_html_e( 'Electronics, coding and science kits for learners, classrooms and makers.', 'cycletechsa' ); ?></p>
				<div>
					<a class="cts-btn cts-btn--orange" href="<?php echo esc_url( cts_shop_url() ); ?>"><?php esc_html_e( 'Browse the shop', 'cycletechsa' ); ?></a>
				</div>
			</div>
		</div>

		<?php
		if ( $cts_count && class_exists( 'WooCommerce' ) ) {
			$cts_products = do_shortcode( sprintf( '[products limit="%1$d" columns="%1$d" orderby="date" order="DESC" visibility="visible"]', min( $cts_count, 8 ) ) );
			if ( false !== strpos( $cts_products, 'product' ) && false === strpos( $cts_products, 'woocommerce-info' ) ) {
				echo '<div class="featured-products woocommerce">' . $cts_products . '</div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WooCommerce output.
			}
		}
		?>
	</div>
</section>

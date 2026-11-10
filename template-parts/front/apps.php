<?php
/**
 * Homepage mobile ordering apps section (fallback when no block homepage).
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_points = array(
	__( 'Your logo, colours and menu, listed under your name in the App Store and Google Play', 'cycletechsa' ),
	__( 'Online payments with PayFast or Yoco, plus pickup and your own delivery', 'cycletechsa' ),
	__( 'Order alerts on a tablet, with WhatsApp backup so no order is missed', 'cycletechsa' ),
	__( 'Start with a web ordering app, then go native when your orders grow', 'cycletechsa' ),
);
?>
<section id="apps" class="cts-apps cts-dark cts-section">
	<div class="cts-container cts-apps__inner">
		<div class="cts-apps__text">
			<p class="cts-eyebrow"><?php esc_html_e( 'Mobile apps', 'cycletechsa' ); ?></p>
			<h2 class="cts-h2--light" style="color:#fff"><?php esc_html_e( 'Your own ordering app.', 'cycletechsa' ); ?> <span class="cts-accent-sky"><?php esc_html_e( 'Your customers, your margin.', 'cycletechsa' ); ?></span></h2>
			<p class="cts-lead"><?php esc_html_e( 'Branded Android and iOS apps for restaurants, takeaways and shops. Customers order and pay in your app, the order rings on a tablet in your kitchen, and you keep the commission a delivery platform would take.', 'cycletechsa' ); ?></p>
			<ul class="cts-checklist">
				<?php foreach ( $cts_points as $cts_point ) : ?>
					<li><span style="color:#38b6ff"><?php echo cts_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span><?php echo esc_html( $cts_point ); ?></span></li>
				<?php endforeach; ?>
			</ul>
			<div class="cts-btn-row" style="margin-top:8px">
				<a class="cts-btn cts-btn--primary" href="<?php echo esc_url( cts_cta_url() ); ?>"><?php esc_html_e( 'Ask about an app', 'cycletechsa' ); ?></a>
				<a class="cts-btn cts-btn--outline-light" href="<?php echo esc_url( cts_section_url( 'packages' ) ); ?>"><?php esc_html_e( 'See packages', 'cycletechsa' ); ?></a>
			</div>
		</div>
		<div class="cts-apps__media">
			<img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/app-mockup.png' ) ); ?>" alt="<?php esc_attr_e( 'Example of a branded ordering app on a phone', 'cycletechsa' ); ?>" width="532" height="952" loading="lazy" decoding="async">
		</div>
	</div>
</section>

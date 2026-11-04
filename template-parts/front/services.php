<?php
/**
 * Homepage services grid.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_services = array(
	array(
		'title' => __( 'Web development', 'cycletechsa' ),
		'text'  => __( 'Fast, mobile-first websites and online stores on WordPress, WooCommerce or custom code — easy for you to update.', 'cycletechsa' ),
		'img'   => 'photo-laptop-code.jpg',
		'alt'   => __( 'Laptop showing website code', 'cycletechsa' ),
		'link'  => cts_section_url( 'contact' ),
		'cta'   => __( 'Talk to us about a site', 'cycletechsa' ),
	),
	array(
		'title' => __( 'AI-powered services', 'cycletechsa' ),
		'text'  => __( "Assistants, document workflows and automations that take repetitive admin off your team's plate.", 'cycletechsa' ),
		'img'   => 'photo-code-screen.jpg',
		'alt'   => __( 'Close-up of code on a monitor', 'cycletechsa' ),
		'link'  => cts_section_url( 'ai' ),
		'cta'   => __( 'How AI can help', 'cycletechsa' ),
	),
	array(
		'title' => __( 'Digital branding', 'cycletechsa' ),
		'text'  => __( 'Logos, colour and type systems, social templates and merch that make a young business look established.', 'cycletechsa' ),
		'img'   => 'photo-white-tees.jpg',
		'alt'   => __( 'Rail of white branded t-shirts', 'cycletechsa' ),
		'link'  => cts_section_url( 'contact' ),
		'cta'   => __( 'Build your brand', 'cycletechsa' ),
	),
	array(
		'title' => __( 'STEM e-commerce', 'cycletechsa' ),
		'text'  => __( 'Science, coding and electronics kits for learners, schools and makers — delivered across South Africa.', 'cycletechsa' ),
		'img'   => 'photo-usb-c.jpg',
		'alt'   => __( 'USB-C connector in warm light', 'cycletechsa' ),
		'link'  => cts_shop_url(),
		'cta'   => __( 'Visit the shop', 'cycletechsa' ),
	),
);
?>
<section id="services" class="cts-section">
	<div class="cts-container">
		<div class="cts-section-head">
			<p class="cts-eyebrow"><?php esc_html_e( 'What we do', 'cycletechsa' ); ?></p>
			<h2 class="cts-h2"><?php esc_html_e( 'Four services, one team that knows your business.', 'cycletechsa' ); ?></h2>
		</div>
		<div class="cts-grid">
			<?php foreach ( $cts_services as $cts_s ) : ?>
				<article class="cts-card">
					<img class="cts-card__media" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/' . $cts_s['img'] ) ); ?>" alt="<?php echo esc_attr( $cts_s['alt'] ); ?>" width="800" height="450" loading="lazy" decoding="async">
					<div class="cts-card__body">
						<h3 class="cts-h3"><?php echo esc_html( $cts_s['title'] ); ?></h3>
						<p class="cts-muted"><?php echo esc_html( $cts_s['text'] ); ?></p>
						<a class="cts-card__link" href="<?php echo esc_url( $cts_s['link'] ); ?>"><?php echo esc_html( $cts_s['cta'] ); ?> <span aria-hidden="true">→</span></a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

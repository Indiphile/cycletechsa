<?php
/**
 * Not found.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="hero cts-dark">
	<?php cts_arcs( 'hero__arcs' ); ?>
	<div class="cts-container hero__content">
		<p class="cts-eyebrow"><?php esc_html_e( 'Error 404', 'cycletechsa' ); ?></p>
		<h1 class="cts-h1 hero__title"><?php esc_html_e( 'This page went full', 'cycletechsa' ); ?> <span class="cts-accent-sky"><?php esc_html_e( 'cycle', 'cycletechsa' ); ?></span>.</h1>
		<p class="cts-lead hero__lead"><?php esc_html_e( "We couldn't find what you were looking for. Try the homepage or the shop.", 'cycletechsa' ); ?></p>
		<div class="cts-btn-row">
			<a class="cts-btn cts-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go home', 'cycletechsa' ); ?></a>
			<a class="cts-btn cts-btn--outline-light" href="<?php echo esc_url( cts_shop_url() ); ?>"><?php esc_html_e( 'Visit the shop', 'cycletechsa' ); ?></a>
		</div>
	</div>
</section>
<?php
get_footer();

<?php
/**
 * Homepage AI band (hexagon video background).
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_points = cts_lines( cts_mod( 'ai_points' ) );
?>
<section id="ai" class="ai-band cts-section">
	<video class="cts-bg-video" autoplay muted loop playsinline preload="none" aria-hidden="true">
		<source src="<?php echo esc_url( get_theme_file_uri( 'assets/video/band-hexagons.mp4' ) ); ?>" type="video/mp4">
	</video>
	<div class="cts-bg-overlay"></div>
	<div class="cts-container ai-band__content">
		<p class="cts-eyebrow"><?php esc_html_e( 'AI services', 'cycletechsa' ); ?></p>
		<h2 class="cts-h2--light ai-band__title">
			<?php echo esc_html( cts_mod( 'ai_title' ) ); ?>
			<?php if ( cts_mod( 'ai_highlight' ) ) : ?>
				<span class="cts-accent-blue"><?php echo esc_html( cts_mod( 'ai_highlight' ) ); ?></span>
			<?php endif; ?>
		</h2>
		<?php if ( $cts_points ) : ?>
			<ul class="cts-checklist">
				<?php foreach ( $cts_points as $cts_point ) : ?>
					<li><span style="color:#2596be"><?php echo cts_icon( 'check' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span><span><?php echo esc_html( $cts_point ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
		<div>
			<a class="cts-btn cts-btn--dark" href="<?php echo esc_url( cts_cta_url() ); ?>"><?php esc_html_e( 'Book an AI chat', 'cycletechsa' ); ?></a>
		</div>
	</div>
</section>

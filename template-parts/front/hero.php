<?php
/**
 * Homepage hero.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section id="top" class="hero cts-dark">
	<?php if ( cts_mod( 'hero_video' ) ) : ?>
		<video class="cts-bg-video" autoplay muted loop playsinline preload="metadata"
			poster="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-code-poster.jpg' ) ); ?>" aria-hidden="true">
			<source src="<?php echo esc_url( get_theme_file_uri( 'assets/video/hero-code.mp4' ) ); ?>" type="video/mp4">
		</video>
	<?php else : ?>
		<img class="cts-bg-video" src="<?php echo esc_url( get_theme_file_uri( 'assets/img/hero-code-poster.jpg' ) ); ?>" alt="" aria-hidden="true">
	<?php endif; ?>
	<div class="cts-bg-overlay"></div>
	<?php cts_arcs( 'hero__arcs' ); ?>

	<div class="cts-container hero__content">
		<?php if ( cts_mod( 'hero_eyebrow' ) ) : ?>
			<p class="cts-eyebrow"><?php echo esc_html( cts_mod( 'hero_eyebrow' ) ); ?></p>
		<?php endif; ?>
		<h1 class="cts-h1 hero__title">
			<?php echo esc_html( cts_mod( 'hero_title' ) ); ?>
			<?php if ( cts_mod( 'hero_highlight' ) ) : ?>
				<span class="cts-accent-sky"><?php echo esc_html( cts_mod( 'hero_highlight' ) ); ?></span>.
			<?php endif; ?>
		</h1>
		<?php if ( cts_mod( 'hero_lead' ) ) : ?>
			<p class="cts-lead hero__lead"><?php echo esc_html( cts_mod( 'hero_lead' ) ); ?></p>
		<?php endif; ?>
		<div class="cts-btn-row">
			<a class="cts-btn cts-btn--primary" href="<?php echo esc_url( cts_cta_url() ); ?>"><?php esc_html_e( 'Start a project', 'cycletechsa' ); ?></a>
			<a class="cts-btn cts-btn--outline-light" href="<?php echo esc_url( cts_section_url( 'services' ) ); ?>"><?php esc_html_e( 'See what we do', 'cycletechsa' ); ?></a>
		</div>
	</div>
</section>

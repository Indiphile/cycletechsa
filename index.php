<?php
/**
 * Fallback template: blog index, archives, search results.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

if ( is_search() ) {
	/* translators: %s: search query */
	$cts_title = sprintf( __( 'Search: %s', 'cycletechsa' ), get_search_query() );
} elseif ( is_archive() ) {
	$cts_title = wp_strip_all_tags( get_the_archive_title() );
} elseif ( is_home() && ! is_front_page() ) {
	$cts_title = single_post_title( '', false );
} else {
	$cts_title = __( 'Latest', 'cycletechsa' );
}
?>
<section class="page-hero cts-dark">
	<div class="cts-container">
		<h1><?php echo esc_html( $cts_title ); ?></h1>
	</div>
</section>

<div class="cts-container entry">
	<?php if ( have_posts() ) : ?>
		<div class="post-list">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'cts-card' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
							<?php the_post_thumbnail( 'cts-card', array( 'class' => 'cts-card__media', 'alt' => '' ) ); ?>
						</a>
					<?php endif; ?>
					<div class="cts-card__body">
						<p class="cts-eyebrow"><?php echo esc_html( get_the_date() ); ?></p>
						<h2 class="cts-h3"><a href="<?php the_permalink(); ?>" style="color:inherit;text-decoration:none"><?php the_title(); ?></a></h2>
						<div class="cts-muted"><?php the_excerpt(); ?></div>
						<a class="cts-card__link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'cycletechsa' ); ?><span class="screen-reader-text"> <?php the_title(); ?></span> <span aria-hidden="true">→</span></a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<?php
		the_posts_pagination(
			array(
				'prev_text' => __( 'Previous', 'cycletechsa' ),
				'next_text' => __( 'Next', 'cycletechsa' ),
			)
		);
		?>
	<?php else : ?>
		<div class="cts-stack" style="max-width:640px">
			<p class="cts-lead"><?php esc_html_e( 'Nothing found here yet.', 'cycletechsa' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
</div>
<?php
get_footer();

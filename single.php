<?php
/**
 * Single post.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="page-hero cts-dark">
		<div class="cts-container">
			<h1><?php the_title(); ?></h1>
			<p class="entry-meta"><?php echo esc_html( get_the_date() ); ?> · <?php the_author(); ?></p>
		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'cts-container entry' ); ?>>
		<div class="entry-content">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php endif; ?>
			<?php
			the_content();
			wp_link_pages();
			?>
		</div>
		<?php
		the_post_navigation(
			array(
				'prev_text' => '← %title',
				'next_text' => '%title →',
			)
		);
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</article>
	<?php
endwhile;

get_footer();

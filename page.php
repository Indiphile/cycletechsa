<?php
/**
 * Single page.
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
		</div>
	</section>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'cts-container entry' ); ?>>
		<div class="entry-content">
			<?php
			the_content();
			wp_link_pages();
			?>
		</div>
		<?php
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</article>
	<?php
endwhile;

get_footer();

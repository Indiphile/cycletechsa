<?php
/**
 * Template Name: Full width (block sections)
 * Template Post Type: page
 *
 * Header, the page's blocks edge to edge, footer. Used by the editable
 * homepage and by any page built from the CycleTechSA sections.
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
	<div id="post-<?php the_ID(); ?>" <?php post_class( 'cts-blocks' ); ?>>
		<?php the_content(); ?>
	</div>
	<?php
endwhile;

get_footer();

<?php
/**
 * Homepage: hero, services, AI, packages, process, shop, contact.
 * Each section lives in template-parts/front/ so it can be reordered or reused.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

get_template_part( 'template-parts/front/hero' );
get_template_part( 'template-parts/front/services' );
get_template_part( 'template-parts/front/ai' );

if ( cts_mod( 'show_packages' ) ) {
	get_template_part( 'template-parts/front/packages' );
}

get_template_part( 'template-parts/front/process' );
get_template_part( 'template-parts/front/shop' );

// Optional: content written on the page set as "Homepage" in Settings › Reading.
if ( 'page' === get_option( 'show_on_front' ) ) {
	while ( have_posts() ) {
		the_post();
		if ( '' !== trim( get_the_content() ) ) {
			echo '<section class="cts-container entry"><div class="entry-content">';
			the_content();
			echo '</div></section>';
		}
	}
}

get_template_part( 'template-parts/front/contact' );

get_footer();

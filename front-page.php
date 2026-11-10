<?php
/**
 * Homepage.
 *
 * If the homepage is a page using the "Full width (block sections)" template,
 * its blocks are shown (editable in the block editor). Otherwise the built-in
 * sections below are shown, so the site looks right before that page exists.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_front = (int) get_option( 'page_on_front' );
if ( 'page' === get_option( 'show_on_front' ) && $cts_front && cts_is_block_page( $cts_front ) ) {
	require get_theme_file_path( 'page-blocks.php' );
	return;
}

get_header();

get_template_part( 'template-parts/front/hero' );
get_template_part( 'template-parts/front/services' );
get_template_part( 'template-parts/front/apps' );
get_template_part( 'template-parts/front/ai' );

if ( cts_mod( 'show_packages' ) ) {
	get_template_part( 'template-parts/front/packages' );
}

get_template_part( 'template-parts/front/process' );
get_template_part( 'template-parts/front/shop' );

// Content written on a classic static homepage page (not the block template).
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

<?php
/**
 * WooCommerce integration.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Declare support and product gallery features.
 */
function cts_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 600,
			'single_image_width'    => 900,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 4,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'cts_woocommerce_setup' );

/**
 * Remove WooCommerce's own breadcrumb from the top of the content (the hero carries the title)
 * and keep it on single products only.
 */
function cts_woocommerce_breadcrumbs() {
	if ( ! is_product() ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
	}
}
add_action( 'wp', 'cts_woocommerce_breadcrumbs' );

/**
 * The shop hero already shows the title.
 *
 * @return bool
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );

/**
 * Related products: 4 in a row.
 *
 * @param array $args Args.
 * @return array
 */
function cts_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']        = 4;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'cts_related_products_args' );

/**
 * Keep the header cart count fresh after AJAX add-to-cart.
 *
 * @param array $fragments Fragments.
 * @return array
 */
function cts_cart_count_fragment( $fragments ) {
	$count = WC()->cart ? WC()->cart->get_cart_contents_count() : 0;
	$fragments['span.header-cart__count'] = sprintf(
		'<span class="header-cart__count"%s>%s</span>',
		$count ? '' : ' hidden',
		esc_html( $count )
	);
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'cts_cart_count_fragment' );

/**
 * Brand classes on WooCommerce buttons (keeps WC's own classes intact).
 *
 * @param array $args Loop add-to-cart args.
 * @return array
 */
function cts_loop_add_to_cart_args( $args ) {
	$args['class'] = trim( ( isset( $args['class'] ) ? $args['class'] : '' ) . ' cts-btn cts-btn--primary cts-btn--sm' );
	return $args;
}
add_filter( 'woocommerce_loop_add_to_cart_args', 'cts_loop_add_to_cart_args' );

/**
 * Currency position/format is set in WooCommerce › Settings; nothing forced here.
 * South African payment gateways (PayFast, Yoco, Ozow) work with this theme unchanged.
 */

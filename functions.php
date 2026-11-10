<?php
/**
 * CycleTechSA theme setup.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CTS_VERSION', '1.1.0' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/blocks.php';

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Theme supports, menus, image sizes.
 */
function cts_setup() {
	load_theme_textdomain( 'cycletechsa', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 104,
			'width'       => 174,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_theme_support(
		'editor-color-palette',
		array(
			array( 'name' => __( 'Dark', 'cycletechsa' ), 'slug' => 'cts-dark', 'color' => '#3b3841' ),
			array( 'name' => __( 'Sky', 'cycletechsa' ), 'slug' => 'cts-sky', 'color' => '#38b6ff' ),
			array( 'name' => __( 'Logo blue', 'cycletechsa' ), 'slug' => 'cts-blue', 'color' => '#2596be' ),
			array( 'name' => __( 'Link blue', 'cycletechsa' ), 'slug' => 'cts-blue-deep', 'color' => '#1b6f8c' ),
			array( 'name' => __( 'Tan', 'cycletechsa' ), 'slug' => 'cts-tan', 'color' => '#d6b588' ),
			array( 'name' => __( 'Orange', 'cycletechsa' ), 'slug' => 'cts-orange', 'color' => '#ff914d' ),
			array( 'name' => __( 'Light', 'cycletechsa' ), 'slug' => 'cts-light', 'color' => '#c7d0d8' ),
			array( 'name' => __( 'Lighter', 'cycletechsa' ), 'slug' => 'cts-lighter', 'color' => '#eeeeee' ),
			array( 'name' => __( 'White', 'cycletechsa' ), 'slug' => 'cts-white', 'color' => '#ffffff' ),
		)
	);

	add_image_size( 'cts-card', 800, 450, true );

	register_nav_menus(
		array(
			'primary' => __( 'Primary menu', 'cycletechsa' ),
			'footer'  => __( 'Footer menu', 'cycletechsa' ),
		)
	);
}
add_action( 'after_setup_theme', 'cts_setup' );

/**
 * Content width for embeds.
 */
function cts_content_width() {
	$GLOBALS['content_width'] = 760;
}
add_action( 'after_setup_theme', 'cts_content_width', 0 );

/**
 * Google Fonts URL (Montserrat Alternates + Poppins).
 */
function cts_fonts_url() {
	return 'https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;500;600&family=Poppins:wght@400;500;600;700&display=swap';
}

/**
 * Styles and scripts.
 */
function cts_enqueue_assets() {
	wp_enqueue_style( 'cts-fonts', cts_fonts_url(), array(), null ); // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
	wp_enqueue_style( 'cts-style', get_stylesheet_uri(), array( 'cts-fonts' ), CTS_VERSION );

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style( 'cts-woocommerce', get_theme_file_uri( 'assets/css/woocommerce.css' ), array( 'cts-style' ), CTS_VERSION );
	}

	wp_enqueue_script( 'cts-main', get_theme_file_uri( 'assets/js/main.js' ), array(), CTS_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cts_enqueue_assets' );

/**
 * Editor gets the same fonts and base type.
 */
function cts_editor_assets() {
	add_editor_style( array( cts_fonts_url(), 'assets/css/editor.css' ) );
}
add_action( 'after_setup_theme', 'cts_editor_assets' );

/**
 * Preconnect to Google Fonts.
 *
 * @param array  $urls          URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array
 */
function cts_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = 'https://fonts.googleapis.com';
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'cts_resource_hints', 10, 2 );

/**
 * Preload the hero poster on the front page (largest contentful paint).
 */
function cts_preload_hero() {
	if ( is_front_page() ) {
		printf(
			'<link rel="preload" as="image" href="%s">' . "\n",
			esc_url( get_theme_file_uri( 'assets/img/hero-code-poster.jpg' ) )
		);
	}
}
add_action( 'wp_head', 'cts_preload_hero', 2 );

/**
 * Theme colour for mobile browser chrome.
 */
function cts_theme_color() {
	echo '<meta name="theme-color" content="#3b3841">' . "\n";
}
add_action( 'wp_head', 'cts_theme_color', 3 );

/**
 * Shorter, cleaner excerpts.
 *
 * @return int
 */
function cts_excerpt_length() {
	return 24;
}
add_filter( 'excerpt_length', 'cts_excerpt_length' );

/**
 * @return string
 */
function cts_excerpt_more() {
	return '…';
}
add_filter( 'excerpt_more', 'cts_excerpt_more' );

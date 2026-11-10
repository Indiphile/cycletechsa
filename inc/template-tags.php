<?php
/**
 * Template helpers: settings, links, icons, decorative SVG.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Read a theme setting with its registered default.
 *
 * @param string $key Setting key without the cts_ prefix.
 * @return mixed
 */
function cts_mod( $key ) {
	$defaults = cts_customizer_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( 'cts_' . $key, $default );
}

/**
 * Link to a front-page section that also works from inner pages.
 *
 * @param string $id Section id, without '#'.
 * @return string
 */
function cts_section_url( $id ) {
	return is_front_page() ? '#' . $id : home_url( '/#' . $id );
}

/**
 * URL of the shop, or the front-page shop section without WooCommerce.
 *
 * @return string
 */
function cts_shop_url() {
	if ( function_exists( 'wc_get_page_permalink' ) ) {
		$url = wc_get_page_permalink( 'shop' );
		if ( $url ) {
			return $url;
		}
	}
	return cts_section_url( 'shop' );
}

/**
 * Primary call-to-action URL ("Start a project").
 *
 * @return string
 */
function cts_cta_url() {
	$custom = cts_mod( 'cta_url' );
	return $custom ? $custom : cts_section_url( 'contact' );
}

/**
 * WhatsApp link from the configured number (digits only, international format).
 *
 * @return string Empty when no number is set.
 */
function cts_whatsapp_url() {
	$digits = preg_replace( '/\D+/', '', (string) cts_mod( 'whatsapp' ) );
	if ( '' === $digits ) {
		return '';
	}
	if ( 0 === strpos( $digits, '0' ) ) {
		$digits = '27' . substr( $digits, 1 ); // South African local number -> +27.
	}
	return 'https://wa.me/' . $digits;
}

/**
 * Site logo: custom logo if set, otherwise the bundled CycleTechSA logo.
 *
 * @param int $height CSS height in px.
 */
function cts_logo( $height = 52 ) {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}
	printf(
		'<a href="%1$s" rel="home"><img src="%2$s" alt="%3$s" width="%4$d" height="%5$d" style="height:%5$dpx;width:auto"></a>',
		esc_url( home_url( '/' ) ),
		esc_url( get_theme_file_uri( 'assets/img/cycletechsa-logo.png' ) ),
		esc_attr( get_bloginfo( 'name' ) ),
		(int) round( $height * 1346 / 808 ),
		(int) $height
	);
}

/**
 * Inline SVG icons (line style, 1.75 stroke).
 *
 * @param string $name Icon name.
 * @return string SVG markup.
 */
function cts_icon( $name ) {
	$paths = array(
		'check' => '<path d="M20 6L9 17l-5-5"/>',
		'menu'  => '<path d="M4 7h16M4 12h16M4 17h16"/>',
		'close' => '<path d="M6 6l12 12M18 6L6 18"/>',
		'cart'  => '<circle cx="9" cy="20" r="1.4"/><circle cx="18" cy="20" r="1.4"/><path d="M3 4h2l2.6 11.2a1.5 1.5 0 0 0 1.5 1.1h8.3a1.5 1.5 0 0 0 1.5-1.1L21 8H6.2"/>',
		'user'  => '<circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		return '';
	}
	return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">' . $paths[ $name ] . '</svg>';
}

/**
 * The brand crescents (blue outer, tan inner) as decoration.
 *
 * @param string $class CSS class for positioning.
 */
function cts_arcs( $class ) {
	printf(
		'<svg class="%s" viewBox="0 0 400 400" aria-hidden="true" focusable="false"><path d="M218 12 A190 190 0 1 0 300 360" fill="none" stroke="#2596be" stroke-width="10" stroke-linecap="round"/><path d="M260 70 A150 150 0 1 0 220 352" fill="none" stroke="#d6b588" stroke-width="7" stroke-linecap="round"/></svg>',
		esc_attr( $class )
	);
}

/**
 * Fallback primary menu (front-page anchors) when no menu is assigned.
 */
function cts_primary_menu_fallback() {
	$items = array(
		'services' => __( 'Services', 'cycletechsa' ),
		'apps'     => __( 'Apps', 'cycletechsa' ),
		'ai'       => __( 'AI', 'cycletechsa' ),
		'packages' => __( 'Packages', 'cycletechsa' ),
	);
	echo '<ul>';
	foreach ( $items as $id => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( cts_section_url( $id ) ), esc_html( $label ) );
	}
	printf( '<li><a href="%s">%s</a></li>', esc_url( cts_shop_url() ), esc_html__( 'STEM Shop', 'cycletechsa' ) );
	echo '</ul>';
}

/**
 * Fallback footer menu.
 */
function cts_footer_menu_fallback() {
	echo '<ul>';
	printf( '<li><a href="%s">%s</a></li>', esc_url( cts_section_url( 'services' ) ), esc_html__( 'Services', 'cycletechsa' ) );
	printf( '<li><a href="%s">%s</a></li>', esc_url( cts_section_url( 'packages' ) ), esc_html__( 'Packages', 'cycletechsa' ) );
	printf( '<li><a href="%s">%s</a></li>', esc_url( cts_shop_url() ), esc_html__( 'Shop', 'cycletechsa' ) );
	printf( '<li><a href="%s">%s</a></li>', esc_url( cts_section_url( 'contact' ) ), esc_html__( 'Contact', 'cycletechsa' ) );
	$privacy = get_privacy_policy_url();
	if ( $privacy ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( $privacy ), esc_html__( 'Privacy', 'cycletechsa' ) );
	}
	echo '</ul>';
}

/**
 * Split a textarea setting into trimmed, non-empty lines.
 *
 * @param string $text Raw text.
 * @return string[]
 */
function cts_lines( $text ) {
	return array_values( array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', (string) $text ) ) ) );
}

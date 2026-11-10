<?php
/**
 * Customizer: everything on the homepage that changes without code.
 * Appearance › Customize › CycleTechSA.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default values for every setting (keys without the cts_ prefix).
 *
 * @return array
 */
function cts_customizer_defaults() {
	return array(
		// Contact.
		'email'           => '',
		'whatsapp'        => '',
		'city'            => '',
		'response_time'   => '1 business day',
		'cta_url'         => '',

		// Hero.
		'hero_eyebrow'    => 'Digital agency · South Africa',
		'hero_title'      => 'Websites, apps, AI tools and brands that keep your business',
		'hero_highlight'  => 'moving',
		'hero_lead'       => 'We design, build and look after the digital side of South African businesses — from a first website and your own ordering app to AI automations that take the admin off your team.',
		'hero_video'      => true,

		// AI band.
		'ai_title'        => 'Let AI handle the admin.',
		'ai_highlight'    => 'You handle the business.',
		'ai_points'       => "Website chat assistants that answer customer questions after hours\nAutomated quotes, invoices and reports from the data you already have\nSearch and summaries across your own documents and emails",

		// Packages.
		'show_packages'   => true,
		'tier1_name'      => '[Tier 1 name]',
		'tier1_price'     => 'R[price]',
		'tier1_period'    => '/once',
		'tier1_blurb'     => '[Who this tier is for, in one sentence.]',
		'tier1_items'     => "[Included item]\n[Included item]\n[Included item]",
		'tier2_name'      => '[Tier 2 name]',
		'tier2_price'     => 'R[price]',
		'tier2_period'    => '/month',
		'tier2_blurb'     => '[Who this tier is for, in one sentence.]',
		'tier2_items'     => "[Included item]\n[Included item]\n[Included item]",
		'tier3_name'      => '[Tier 3 name]',
		'tier3_price'     => 'R[price]',
		'tier3_period'    => '/month',
		'tier3_blurb'     => '[Who this tier is for, in one sentence.]',
		'tier3_items'     => "[Included item]\n[Included item]\n[Included item]",
		'featured_tier'   => '2',
		'featured_badge'  => 'Most popular',

		// Shop.
		'shop_products'   => 4,
	);
}

/**
 * Sanitize a checkbox.
 *
 * @param mixed $value Value.
 * @return bool
 */
function cts_sanitize_checkbox( $value ) {
	return (bool) $value;
}

/**
 * Sanitize text that may contain a little inline markup (none needed; plain text).
 *
 * @param string $value Value.
 * @return string
 */
function cts_sanitize_textarea( $value ) {
	return sanitize_textarea_field( $value );
}

/**
 * Register panels, sections, settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function cts_customize_register( $wp_customize ) {
	$d = cts_customizer_defaults();

	$wp_customize->add_panel(
		'cts_panel',
		array(
			'title'    => __( 'CycleTechSA', 'cycletechsa' ),
			'priority' => 30,
		)
	);

	$add = function ( $key, $section, $label, $type = 'text', $args = array() ) use ( $wp_customize, $d ) {
		$sanitize = 'sanitize_text_field';
		if ( 'textarea' === $type ) {
			$sanitize = 'cts_sanitize_textarea';
		} elseif ( 'email' === $type ) {
			$sanitize = 'sanitize_email';
		} elseif ( 'url' === $type ) {
			$sanitize = 'esc_url_raw';
		} elseif ( 'checkbox' === $type ) {
			$sanitize = 'cts_sanitize_checkbox';
		} elseif ( 'number' === $type ) {
			$sanitize = 'absint';
		}
		$wp_customize->add_setting(
			'cts_' . $key,
			array(
				'default'           => isset( $d[ $key ] ) ? $d[ $key ] : '',
				'sanitize_callback' => isset( $args['sanitize'] ) ? $args['sanitize'] : $sanitize,
				'transport'         => 'refresh',
			)
		);
		unset( $args['sanitize'] );
		$wp_customize->add_control(
			'cts_' . $key,
			array_merge(
				array(
					'label'   => $label,
					'section' => $section,
					'type'    => $type,
				),
				$args
			)
		);
	};

	// Contact.
	$wp_customize->add_section( 'cts_contact', array( 'title' => __( 'Contact details', 'cycletechsa' ), 'panel' => 'cts_panel' ) );
	$add( 'email', 'cts_contact', __( 'Email address', 'cycletechsa' ), 'email' );
	$add( 'whatsapp', 'cts_contact', __( 'WhatsApp number', 'cycletechsa' ), 'text', array( 'description' => __( 'e.g. 082 123 4567 or +27 82 123 4567. Leave empty to hide the button.', 'cycletechsa' ) ) );
	$add( 'city', 'cts_contact', __( 'City (footer)', 'cycletechsa' ) );
	$add( 'response_time', 'cts_contact', __( 'Reply time (e.g. "1 business day")', 'cycletechsa' ) );
	$add( 'cta_url', 'cts_contact', __( '"Start a project" link (optional)', 'cycletechsa' ), 'url', array( 'description' => __( 'Leave empty to scroll to the contact section, or link a contact/quote page.', 'cycletechsa' ) ) );

	// Hero.
	$wp_customize->add_section( 'cts_hero', array( 'title' => __( 'Homepage hero', 'cycletechsa' ), 'panel' => 'cts_panel' ) );
	$add( 'hero_eyebrow', 'cts_hero', __( 'Small label above the headline', 'cycletechsa' ) );
	$add( 'hero_title', 'cts_hero', __( 'Headline', 'cycletechsa' ), 'textarea' );
	$add( 'hero_highlight', 'cts_hero', __( 'Highlighted last word(s), in sky-blue', 'cycletechsa' ) );
	$add( 'hero_lead', 'cts_hero', __( 'Intro paragraph', 'cycletechsa' ), 'textarea' );
	$add( 'hero_video', 'cts_hero', __( 'Play the background video', 'cycletechsa' ), 'checkbox' );

	// AI.
	$wp_customize->add_section( 'cts_ai', array( 'title' => __( 'AI section', 'cycletechsa' ), 'panel' => 'cts_panel' ) );
	$add( 'ai_title', 'cts_ai', __( 'Headline', 'cycletechsa' ) );
	$add( 'ai_highlight', 'cts_ai', __( 'Headline, blue part', 'cycletechsa' ) );
	$add( 'ai_points', 'cts_ai', __( 'Bullet points (one per line)', 'cycletechsa' ), 'textarea' );

	// Packages.
	$wp_customize->add_section( 'cts_packages', array( 'title' => __( 'Packages', 'cycletechsa' ), 'panel' => 'cts_panel', 'description' => __( 'Leave a tier name empty to hide that tier.', 'cycletechsa' ) ) );
	$add( 'show_packages', 'cts_packages', __( 'Show the packages section', 'cycletechsa' ), 'checkbox' );
	foreach ( array( 1, 2, 3 ) as $n ) {
		/* translators: %d: tier number */
		$t = sprintf( __( 'Tier %d', 'cycletechsa' ), $n );
		$add( "tier{$n}_name", 'cts_packages', $t . ' — ' . __( 'name', 'cycletechsa' ) );
		$add( "tier{$n}_price", 'cts_packages', $t . ' — ' . __( 'price (e.g. R4 500)', 'cycletechsa' ) );
		$add( "tier{$n}_period", 'cts_packages', $t . ' — ' . __( 'period (e.g. /once, /month)', 'cycletechsa' ) );
		$add( "tier{$n}_blurb", 'cts_packages', $t . ' — ' . __( 'who it is for', 'cycletechsa' ), 'textarea' );
		$add( "tier{$n}_items", 'cts_packages', $t . ' — ' . __( 'included items (one per line)', 'cycletechsa' ), 'textarea' );
	}
	$add(
		'featured_tier',
		'cts_packages',
		__( 'Highlighted tier', 'cycletechsa' ),
		'select',
		array(
			'choices'  => array( '0' => __( 'None', 'cycletechsa' ), '1' => '1', '2' => '2', '3' => '3' ),
			'sanitize' => function ( $v ) {
				return in_array( (string) $v, array( '0', '1', '2', '3' ), true ) ? (string) $v : '2';
			},
		)
	);
	$add( 'featured_badge', 'cts_packages', __( 'Badge text on the highlighted tier', 'cycletechsa' ) );

	// Shop.
	$wp_customize->add_section( 'cts_shop', array( 'title' => __( 'Homepage shop', 'cycletechsa' ), 'panel' => 'cts_panel' ) );
	$add( 'shop_products', 'cts_shop', __( 'Latest products to show on the homepage (0 to hide)', 'cycletechsa' ), 'number', array( 'input_attrs' => array( 'min' => 0, 'max' => 8 ) ) );
}
add_action( 'customize_register', 'cts_customize_register' );

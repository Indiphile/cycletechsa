<?php
/**
 * Block editor integration (Option B): pattern category, block styles,
 * editable homepage creation, and block styles in the editor.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The homepage sections, top to bottom. Each is a pattern in /patterns.
 *
 * @return string[]
 */
function cts_homepage_patterns() {
	$patterns = array(
		'cycletechsa/hero',
		'cycletechsa/services',
		'cycletechsa/mobile-apps',
		'cycletechsa/ai',
		'cycletechsa/packages',
		'cycletechsa/process',
		'cycletechsa/shop',
		'cycletechsa/contact',
	);
	return apply_filters( 'cts_homepage_patterns', $patterns );
}

/**
 * Pattern category so all sections sit together in the inserter.
 */
function cts_register_pattern_category() {
	register_block_pattern_category(
		'cycletechsa',
		array(
			'label'       => __( 'CycleTechSA sections', 'cycletechsa' ),
			'description' => __( 'Full-width sections from the CycleTechSA design.', 'cycletechsa' ),
		)
	);
}
add_action( 'init', 'cts_register_pattern_category' );

/**
 * Brand styles people can pick in the block sidebar (Styles panel).
 */
function cts_register_block_styles() {
	$styles = array(
		'core/button'    => array(
			'cts-outline'       => __( 'Outline', 'cycletechsa' ),
			'cts-outline-light' => __( 'Outline (on dark)', 'cycletechsa' ),
			'cts-dark'          => __( 'Charcoal', 'cycletechsa' ),
			'cts-orange'        => __( 'Orange', 'cycletechsa' ),
		),
		'core/paragraph' => array(
			'cts-eyebrow' => __( 'Eyebrow label', 'cycletechsa' ),
			'cts-badge'   => __( 'Badge', 'cycletechsa' ),
			'cts-step'    => __( 'Step number', 'cycletechsa' ),
		),
		'core/heading'   => array(
			'cts-light-heading' => __( 'Display light', 'cycletechsa' ),
		),
		'core/list'      => array(
			'cts-checklist' => __( 'Checklist', 'cycletechsa' ),
		),
		'core/group'     => array(
			'cts-card'          => __( 'Card', 'cycletechsa' ),
			'cts-card-featured' => __( 'Card (featured, dark)', 'cycletechsa' ),
		),
		'core/media-text' => array(
			'cts-card' => __( 'Card', 'cycletechsa' ),
		),
	);
	foreach ( $styles as $block => $set ) {
		foreach ( $set as $name => $label ) {
			register_block_style( $block, array( 'name' => $name, 'label' => $label ) );
		}
	}
}
add_action( 'init', 'cts_register_block_styles' );

/**
 * Block section styles on the front end and in the editor.
 */
function cts_enqueue_block_styles() {
	wp_enqueue_style( 'cts-blocks', get_theme_file_uri( 'assets/css/blocks.css' ), array( 'cts-style' ), CTS_VERSION );
}
add_action( 'wp_enqueue_scripts', 'cts_enqueue_block_styles', 20 );

/**
 * Editor: fonts + block styles so what you edit looks like the site.
 */
function cts_block_editor_styles() {
	add_editor_style( array( cts_fonts_url(), 'assets/css/editor.css', 'assets/css/blocks.css' ) );
}
add_action( 'after_setup_theme', 'cts_block_editor_styles', 20 );

/**
 * Is this page built with the full-width block template?
 *
 * @param int $post_id Page ID.
 * @return bool
 */
function cts_is_block_page( $post_id ) {
	return 'page-blocks.php' === get_page_template_slug( $post_id );
}

/**
 * Build the homepage block content from the registered patterns.
 *
 * @return string
 */
function cts_homepage_content() {
	$registry = WP_Block_Patterns_Registry::get_instance();
	$parts    = array();
	foreach ( cts_homepage_patterns() as $name ) {
		$pattern = $registry->get_registered( $name );
		if ( $pattern && ! empty( $pattern['content'] ) ) {
			$parts[] = trim( $pattern['content'] );
		}
	}
	return implode( "\n\n", $parts );
}

/**
 * Admin notice offering to create the editable homepage.
 */
function cts_homepage_notice() {
	if ( ! current_user_can( 'manage_options' ) || ! current_user_can( 'edit_pages' ) ) {
		return;
	}
	$screen = get_current_screen();
	if ( ! $screen || ! in_array( $screen->id, array( 'themes', 'dashboard' ), true ) ) {
		return;
	}
	$front = (int) get_option( 'page_on_front' );
	if ( 'page' === get_option( 'show_on_front' ) && $front && cts_is_block_page( $front ) ) {
		return;
	}
	$url = wp_nonce_url( admin_url( 'admin-post.php?action=cts_create_homepage' ), 'cts_create_homepage' );
	?>
	<div class="notice notice-info">
		<p><strong><?php esc_html_e( 'CycleTechSA: make the homepage editable', 'cycletechsa' ); ?></strong></p>
		<p><?php esc_html_e( 'Create a new "Home" page built from the CycleTechSA sections and set it as your homepage. Every heading, image, button and section can then be edited, moved or removed in the block editor. Your current homepage is kept as a page; you can switch back in Settings › Reading.', 'cycletechsa' ); ?></p>
		<p><a class="button button-primary" href="<?php echo esc_url( $url ); ?>"><?php esc_html_e( 'Create editable homepage', 'cycletechsa' ); ?></a></p>
	</div>
	<?php
}
add_action( 'admin_notices', 'cts_homepage_notice' );

/**
 * Handle "Create editable homepage".
 */
function cts_create_homepage() {
	if ( ! current_user_can( 'manage_options' ) || ! current_user_can( 'edit_pages' ) ) {
		wp_die( esc_html__( 'You are not allowed to do this.', 'cycletechsa' ), 403 );
	}
	check_admin_referer( 'cts_create_homepage' );

	$page_id = wp_insert_post(
		array(
			'post_type'    => 'page',
			'post_status'  => 'publish',
			'post_title'   => __( 'Home', 'cycletechsa' ),
			'post_name'    => 'home-cycletechsa',
			'post_content' => cts_homepage_content(),
		),
		true
	);

	if ( is_wp_error( $page_id ) ) {
		wp_die( esc_html( $page_id->get_error_message() ) );
	}

	update_post_meta( $page_id, '_wp_page_template', 'page-blocks.php' );

	$previous = (int) get_option( 'page_on_front' );
	if ( $previous ) {
		update_option( 'cts_previous_front_page', $previous );
	}
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $page_id );

	wp_safe_redirect( admin_url( 'post.php?post=' . $page_id . '&action=edit' ) );
	exit;
}
add_action( 'admin_post_cts_create_homepage', 'cts_create_homepage' );

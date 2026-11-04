<?php
/**
 * Site header.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'cycletechsa' ); ?></a>

<header class="site-header" id="masthead">
	<div class="cts-container site-header__inner">
		<div class="site-branding">
			<?php cts_logo( 52 ); ?>
		</div>

		<div class="header-actions">
			<nav class="primary-nav" id="primary-nav" aria-label="<?php esc_attr_e( 'Main', 'cycletechsa' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => 'cts_primary_menu_fallback',
					)
				);
				?>
				<a class="cts-btn cts-btn--primary cts-btn--sm" href="<?php echo esc_url( cts_cta_url() ); ?>"><?php esc_html_e( 'Start a project', 'cycletechsa' ); ?></a>
			</nav>

			<?php if ( function_exists( 'WC' ) && WC()->cart ) : ?>
				<?php $cts_count = WC()->cart->get_cart_contents_count(); ?>
				<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
					<?php echo cts_icon( 'cart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					<span class="screen-reader-text"><?php esc_html_e( 'Cart', 'cycletechsa' ); ?></span>
					<span class="header-cart__count" <?php echo $cts_count ? '' : 'hidden'; ?>><?php echo esc_html( $cts_count ); ?></span>
				</a>
			<?php endif; ?>

			<button class="nav-toggle" type="button" aria-controls="primary-nav" aria-expanded="false">
				<span class="nav-toggle__open"><?php echo cts_icon( 'menu' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<span class="nav-toggle__close" hidden><?php echo cts_icon( 'close' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'cycletechsa' ); ?></span>
			</button>
		</div>
	</div>
</header>

<main id="main" class="site-main" tabindex="-1">

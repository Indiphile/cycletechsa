<?php
/**
 * Site footer.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_city = cts_mod( 'city' );
?>
</main>

<footer class="site-footer">
	<div class="cts-container site-footer__inner">
		<?php cts_logo( 44 ); ?>
		<span>
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> CycleTechSA (Pty) Ltd<?php echo $cts_city ? ' · ' . esc_html( $cts_city ) . ', South Africa' : ' · South Africa'; ?>
		</span>
		<nav aria-label="<?php esc_attr_e( 'Footer', 'cycletechsa' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'depth'          => 1,
					'fallback_cb'    => 'cts_footer_menu_fallback',
				)
			);
			?>
		</nav>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

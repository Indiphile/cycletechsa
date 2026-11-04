<?php
/**
 * Homepage contact band.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_email    = cts_mod( 'email' );
$cts_whatsapp = cts_whatsapp_url();
$cts_reply    = cts_mod( 'response_time' );
?>
<section id="contact" class="contact-band cts-dark cts-section">
	<?php cts_arcs( 'contact-band__arcs' ); ?>
	<div class="cts-container contact-band__inner">
		<div class="contact-band__text">
			<p class="cts-eyebrow"><?php esc_html_e( "Let's talk", 'cycletechsa' ); ?></p>
			<h2 class="cts-h2--light" style="color:#fff"><?php esc_html_e( 'Got a project in mind?', 'cycletechsa' ); ?></h2>
			<p class="cts-lead">
				<?php
				if ( $cts_reply ) {
					/* translators: %s: reply time, e.g. "1 business day" */
					echo esc_html( sprintf( __( "Tell us what you need. We'll come back within %s with next steps and a quote.", 'cycletechsa' ), $cts_reply ) );
				} else {
					esc_html_e( "Tell us what you need. We'll come back with next steps and a quote.", 'cycletechsa' );
				}
				?>
			</p>
		</div>
		<div class="cts-btn-row">
			<?php if ( $cts_email ) : ?>
				<a class="cts-btn cts-btn--primary" href="<?php echo esc_url( 'mailto:' . antispambot( $cts_email ) ); ?>"><?php esc_html_e( 'Email us', 'cycletechsa' ); ?></a>
			<?php endif; ?>
			<?php if ( $cts_whatsapp ) : ?>
				<a class="cts-btn cts-btn--outline-light" href="<?php echo esc_url( $cts_whatsapp ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'WhatsApp us', 'cycletechsa' ); ?><span class="screen-reader-text"> <?php esc_html_e( '(opens in a new tab)', 'cycletechsa' ); ?></span></a>
			<?php endif; ?>
			<?php if ( ! $cts_email && ! $cts_whatsapp && current_user_can( 'customize' ) ) : ?>
				<a class="cts-btn cts-btn--outline-light" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=cts_contact' ) ); ?>"><?php esc_html_e( 'Admin: add your email or WhatsApp', 'cycletechsa' ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>

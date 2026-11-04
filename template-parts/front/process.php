<?php
/**
 * Homepage "How we work" steps.
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_steps = array(
	array( __( 'Discover', 'cycletechsa' ), __( 'A short call to understand your business, your customers and what success looks like.', 'cycletechsa' ) ),
	array( __( 'Design & build', 'cycletechsa' ), __( 'You see designs early and often, then we build, test and refine with you.', 'cycletechsa' ) ),
	array( __( 'Launch & support', 'cycletechsa' ), __( 'We go live, train your team and stay on hand for updates and improvements.', 'cycletechsa' ) ),
);
?>
<section id="process" class="process cts-section">
	<div class="cts-container">
		<div class="cts-section-head">
			<p class="cts-eyebrow"><?php esc_html_e( 'How we work', 'cycletechsa' ); ?></p>
			<h2 class="cts-h2"><?php esc_html_e( 'From first call to launch, in three steps.', 'cycletechsa' ); ?></h2>
		</div>
		<ol class="steps">
			<?php foreach ( $cts_steps as $cts_i => $cts_step ) : ?>
				<li>
					<span class="step-num" aria-hidden="true"><?php echo esc_html( $cts_i + 1 ); ?></span>
					<h3 class="cts-h3"><?php echo esc_html( $cts_step[0] ); ?></h3>
					<p class="cts-muted"><?php echo esc_html( $cts_step[1] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

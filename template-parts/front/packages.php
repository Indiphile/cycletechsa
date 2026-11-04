<?php
/**
 * Homepage packages (edited in Customizer › CycleTechSA › Packages).
 *
 * @package CycleTechSA
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cts_featured = (string) cts_mod( 'featured_tier' );
$cts_tiers    = array();
foreach ( array( 1, 2, 3 ) as $cts_n ) {
	$cts_name = cts_mod( "tier{$cts_n}_name" );
	if ( '' === trim( (string) $cts_name ) ) {
		continue;
	}
	$cts_tiers[] = array(
		'name'     => $cts_name,
		'price'    => cts_mod( "tier{$cts_n}_price" ),
		'period'   => cts_mod( "tier{$cts_n}_period" ),
		'blurb'    => cts_mod( "tier{$cts_n}_blurb" ),
		'items'    => cts_lines( cts_mod( "tier{$cts_n}_items" ) ),
		'featured' => ( (string) $cts_n === $cts_featured ),
	);
}

if ( ! $cts_tiers ) {
	return;
}
?>
<section id="packages" class="cts-section">
	<div class="cts-container">
		<div class="cts-section-head">
			<p class="cts-eyebrow"><?php esc_html_e( 'Packages', 'cycletechsa' ); ?></p>
			<h2 class="cts-h2"><?php esc_html_e( 'Clear scope, clear price.', 'cycletechsa' ); ?></h2>
			<p class="cts-muted"><?php esc_html_e( 'Pick a starting point. Every package can grow with you.', 'cycletechsa' ); ?></p>
		</div>
		<div class="cts-grid cts-grid--3">
			<?php foreach ( $cts_tiers as $cts_t ) : ?>
				<article class="cts-card tier<?php echo $cts_t['featured'] ? ' tier--featured' : ''; ?>">
					<div class="tier__head">
						<h3 class="cts-h3"><?php echo esc_html( $cts_t['name'] ); ?></h3>
						<?php if ( $cts_t['featured'] && cts_mod( 'featured_badge' ) ) : ?>
							<span class="cts-badge"><?php echo esc_html( cts_mod( 'featured_badge' ) ); ?></span>
						<?php endif; ?>
					</div>
					<?php if ( $cts_t['price'] ) : ?>
						<p class="tier__price"><?php echo esc_html( $cts_t['price'] ); ?><span class="tier__period"> <?php echo esc_html( $cts_t['period'] ); ?></span></p>
					<?php endif; ?>
					<?php if ( $cts_t['blurb'] ) : ?>
						<p class="cts-muted"><?php echo esc_html( $cts_t['blurb'] ); ?></p>
					<?php endif; ?>
					<?php if ( $cts_t['items'] ) : ?>
						<ul>
							<?php foreach ( $cts_t['items'] as $cts_item ) : ?>
								<li><?php echo esc_html( $cts_item ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<a class="cts-btn <?php echo $cts_t['featured'] ? 'cts-btn--primary' : 'cts-btn--outline'; ?>" href="<?php echo esc_url( cts_cta_url() ); ?>">
						<?php esc_html_e( 'Choose this', 'cycletechsa' ); ?>
						<span class="screen-reader-text"><?php echo esc_html( $cts_t['name'] ); ?></span>
					</a>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

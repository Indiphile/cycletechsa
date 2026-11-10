<?php
/**
 * Title: Contact band
 * Slug: cycletechsa/contact
 * Categories: cycletechsa
 * Keywords: contact, cta, call to action, footer
 * Description: Dark call-to-action band with email and WhatsApp buttons. Edit the button links in the block toolbar.
 * Viewport Width: 1440
 */

$cts_email = function_exists( 'cts_mod' ) ? cts_mod( 'email' ) : '';
$cts_wa    = function_exists( 'cts_whatsapp_url' ) ? cts_whatsapp_url() : '';
$cts_reply = function_exists( 'cts_mod' ) ? cts_mod( 'response_time' ) : '';
?>
<!-- wp:group {"tagName":"section","align":"full","className":"cts-section cts-contact","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"24px","right":"24px"}}},"backgroundColor":"dark","textColor":"white","layout":{"type":"constrained","contentSize":"1240px"},"anchor":"contact"} -->
<section class="wp-block-group alignfull cts-section cts-contact has-white-color has-dark-background-color has-text-color has-background" id="contact" style="padding-top:var(--wp--preset--spacing--70);padding-right:24px;padding-bottom:var(--wp--preset--spacing--70);padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"40px"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"62%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:62%"><!-- wp:paragraph {"className":"is-style-cts-eyebrow"} -->
<p class="is-style-cts-eyebrow">Let's talk</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"className":"is-style-cts-light-heading","textColor":"white"} -->
<h2 class="wp-block-heading is-style-cts-light-heading has-white-color has-text-color">Got a project in mind?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"light","fontSize":"large"} -->
<p class="has-light-color has-text-color has-large-font-size">Tell us what you need. We'll come back within <?php echo esc_html( $cts_reply ? $cts_reply : '1 business day' ); ?> with next steps and a quote.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"38%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:38%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_attr( $cts_email ? 'mailto:' . $cts_email : 'mailto:hello@example.com' ); ?>">Email us</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-cts-outline-light"} -->
<div class="wp-block-button is-style-cts-outline-light"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_attr( $cts_wa ? $cts_wa : 'https://wa.me/27000000000' ); ?>" target="_blank" rel="noreferrer noopener">WhatsApp us</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->

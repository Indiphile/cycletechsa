<?php
/**
 * Title: Hero (video background)
 * Slug: cycletechsa/hero
 * Categories: cycletechsa
 * Keywords: hero, banner, video, header
 * Description: Dark hero with the code video, headline, intro and two buttons.
 * Viewport Width: 1440
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/video/hero-code.mp4' ) ); ?>","backgroundType":"video","minHeight":600,"customGradient":"linear-gradient(90deg,rgba(59,56,65,0.96) 0%,rgba(59,56,65,0.86) 55%,rgba(59,56,65,0.6) 100%)","align":"full","className":"is-dark cts-hero","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"24px","right":"24px"}}},"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-cover alignfull is-dark cts-hero" style="padding-top:var(--wp--preset--spacing--70);padding-right:24px;padding-bottom:var(--wp--preset--spacing--70);padding-left:24px;min-height:600px"><video class="wp-block-cover__video-background intrinsic-ignore" autoplay muted loop playsinline src="<?php echo esc_url( get_theme_file_uri( 'assets/video/hero-code.mp4' ) ); ?>" data-object-fit="cover"></video><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(90deg,rgba(59,56,65,0.96) 0%,rgba(59,56,65,0.86) 55%,rgba(59,56,65,0.6) 100%)"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"blockGap":"24px"}},"layout":{"type":"constrained","contentSize":"780px","justifyContent":"left"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"className":"is-style-cts-eyebrow"} -->
<p class="is-style-cts-eyebrow">Digital agency · South Africa</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"className":"cts-hero__title","textColor":"white"} -->
<h1 class="wp-block-heading cts-hero__title has-white-color has-text-color">Websites, apps, AI tools and brands that keep your business <mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-sky-color">moving</mark>.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"cts-hero__lead","textColor":"light","fontSize":"large"} -->
<p class="cts-hero__lead has-light-color has-text-color has-large-font-size">We design, build and look after the digital side of South African businesses — from a first website and your own ordering app to AI automations that take the admin off your team.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"32px"}}}} -->
<div class="wp-block-buttons" style="margin-top:32px"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#contact">Start a project</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"is-style-cts-outline-light"} -->
<div class="wp-block-button is-style-cts-outline-light"><a class="wp-block-button__link wp-element-button" href="#services">See what we do</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<?php
/**
 * Title: STEM shop teaser + latest products
 * Slug: cycletechsa/shop
 * Categories: cycletechsa
 * Keywords: shop, store, products, woocommerce, stem
 * Description: Photo and text card linking to the shop, followed by the latest WooCommerce products.
 * Viewport Width: 1440
 */
?>
<!-- wp:group {"tagName":"section","align":"full","className":"cts-section","style":{"spacing":{"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70","left":"24px","right":"24px"},"blockGap":"32px"}},"layout":{"type":"constrained","contentSize":"1240px"},"anchor":"shop"} -->
<section class="wp-block-group alignfull cts-section" id="shop" style="padding-top:var(--wp--preset--spacing--70);padding-right:24px;padding-bottom:var(--wp--preset--spacing--70);padding-left:24px"><!-- wp:media-text {"mediaType":"image","mediaWidth":46,"imageFill":true,"className":"is-style-cts-card cts-shop-teaser"} -->
<div class="wp-block-media-text is-stacked-on-mobile is-image-fill-element is-style-cts-card cts-shop-teaser" style="grid-template-columns:46% auto"><figure class="wp-block-media-text__media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/photo-usb-c.jpg' ) ); ?>" alt="" style="object-position:50% 50%"/></figure><div class="wp-block-media-text__content"><!-- wp:paragraph {"className":"is-style-cts-eyebrow"} -->
<p class="is-style-cts-eyebrow">STEM Shop</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2 class="wp-block-heading">Kits that get young South Africans building.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"muted"} -->
<p class="has-muted-color has-text-color">Electronics, coding and science kits for learners, classrooms and makers.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-cts-orange"} -->
<div class="wp-block-button is-style-cts-orange"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( function_exists( 'cts_shop_url' ) ? cts_shop_url() : home_url( '/shop/' ) ); ?>">Browse the shop</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:media-text -->

<!-- wp:shortcode -->
[products limit="4" columns="4" orderby="date" order="DESC" visibility="visible"]
<!-- /wp:shortcode --></section>
<!-- /wp:group -->

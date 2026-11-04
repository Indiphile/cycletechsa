=== CycleTechSA ===
Contributors: cycletechsa
Requires at least: 6.4
Tested up to: 7.1
Requires PHP: 7.4
WooCommerce tested up to: 9.8
License: GPLv2 or later

Custom theme for cycletechsa.co.za: agency homepage + WooCommerce STEM shop.

== Install (cPanel / wp-admin) ==

1. BACK UP FIRST. In cPanel use Backup (or Softaculous › Backups) to download the
   files and the database. Your current theme stays installed, so you can switch back.
2. wp-admin › Appearance › Themes › Add New › Upload Theme › choose cycletechsa.zip › Install.
   (Upload too large? Unzip into public_html/wp-content/themes/ with cPanel File Manager.)
3. Preview first: on the theme card click "Live Preview", check the homepage, then Activate.
4. Settings › Permalinks › Save (refreshes URLs once).

== Fill in the homepage ==

Appearance › Customize › CycleTechSA
- Contact details: email, WhatsApp number, city, reply time. Buttons hide until filled.
- Packages: names, prices, included items (one per line). Empty name = tier hidden.
  Untick "Show the packages section" to hide it until prices are final.
- Homepage hero / AI section: edit the headline and copy.
- Homepage shop: how many latest products to show (0 hides the strip).

Menus: Appearance › Menus. Assign a menu to "Primary menu" and "Footer menu".
Without menus the theme shows sensible defaults (Services, AI, Packages, STEM Shop).
For homepage sections use Custom Links like /#services, /#packages, /#contact.

Logo: the CycleTechSA logo is built in. To replace it, Customize › Site Identity › Logo.

== Shop (WooCommerce) ==

1. Plugins › Add New › WooCommerce › Install › Activate (skip if already installed).
2. WooCommerce › Settings › General: country South Africa, currency South African rand (R).
3. Payments: install one South African gateway and connect your merchant account:
   - PayFast (WooCommerce PayFast Gateway) — cards, Instant EFT, SnapScan, Zapper.
   - Yoco (Yoco Payments for WooCommerce) — cards, low setup.
   - Ozow — instant EFT.
   Test in sandbox mode first, then switch to live.
4. Shipping: WooCommerce › Settings › Shipping › add a "South Africa" zone
   (flat rate, free over an amount, and/or local pickup). The Courier Guy and
   Bob Go have WooCommerce plugins for live courier rates.
5. Products › Add New. Use square photos (at least 800×800) for a tidy grid.
6. Legal (POPIA / Consumer Protection Act): publish Privacy, Terms, Returns & Refunds
   and Shipping pages; set the Privacy page in Settings › Privacy and the Terms page in
   WooCommerce › Settings › Advanced.

== Production checklist ==

- SSL on (cPanel › SSL/TLS Status › AutoSSL) and site URL uses https://.
- Caching: LiteSpeed Cache (if your host runs LiteSpeed) or WP Super Cache.
  Exclude Cart, Checkout and My Account from page caching (WooCommerce does this
  automatically with LiteSpeed Cache).
- Image optimisation plugin (e.g. converts uploads to WebP).
- Security: strong admin passwords + 2FA, keep WordPress, WooCommerce and plugins updated,
  daily off-server backups (e.g. UpdraftPlus to Google Drive).
- PHP 8.1+ (cPanel › Select PHP Version / MultiPHP Manager).
- SEO plugin (Yoast or Rank Math) for meta descriptions and the sitemap.
- Delete the old theme's leftover demo content and unused plugins.

== What's in the theme ==

style.css                     design tokens + all site styles
functions.php                 setup, assets, menus
inc/customizer.php            homepage settings (contact, hero, AI, packages, shop)
inc/template-tags.php         helpers (links, logo, icons, brand arcs)
inc/woocommerce.php           WooCommerce support, cart count, button styling
assets/css/woocommerce.css    shop, product, cart, checkout styling
assets/js/main.js             mobile menu, background video (pauses off-screen,
                              respects "reduce motion" and data saver)
front-page.php + template-parts/front/*.php   homepage sections
page.php, single.php, index.php, 404.php, woocommerce.php   inner pages

== Changelog ==

= 1.0.0 =
* First release from the CycleTechSA design system.

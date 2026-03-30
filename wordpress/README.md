# WordPress Starter Pack

This folder gives you a copy-friendly path from the current React homepage into a standard WordPress theme or child theme.

## What This Includes

- A page template for the homepage
- Section partials for the current React sections
- One CSS file for the design
- One vanilla JS file for the header scroll state, hero slider, hero parallax, and reusable scroll motion
- Sample data in PHP so you can see how each section maps into WordPress

## Best Use Case

This starter assumes:

- you want a normal WordPress theme or child theme
- you want something easy to paste into WordPress now
- you may replace hardcoded data with ACF fields later

It is intentionally set up so you can copy the contents of `theme-starter/` into your actual theme root.

## Copy Order

1. Copy everything inside `theme-starter/` into your WordPress theme.
2. Add this line to your theme `functions.php`:

```php
require_once get_stylesheet_directory() . '/inc/lh-homepage-bootstrap.php';
```

3. Copy your existing media into the theme:
   - `public/images/*` -> `wp-content/themes/your-theme/assets/images/*`
   - `public/videos/*` -> `wp-content/themes/your-theme/assets/videos/*`
   - `src/icons/lambourne_house_logo.svg` -> `wp-content/themes/your-theme/assets/images/branding/lambourne-house-logo.svg`
   - `src/icons/lh_logo.svg` -> `wp-content/themes/your-theme/assets/images/branding/lh-logo.svg`
4. In WordPress admin, create a page and assign the `Lambourne Homepage` template.

## React To WordPress Mapping

- `Header.tsx` -> `template-parts/lambourne/site-header.php`
- `Hero.tsx` -> `template-parts/lambourne/hero.php`
- `Welcome.tsx` -> `template-parts/lambourne/welcome.php`
- `MediaGrid.tsx` -> `template-parts/lambourne/media-grid.php`
- `Quote.tsx` -> `template-parts/lambourne/quote.php`
- `Step.tsx` -> `template-parts/lambourne/step.php`
- `ImageMarquee.tsx` -> `template-parts/lambourne/marquee.php`
- `Footer.tsx` -> `template-parts/lambourne/site-footer.php`
- `ScrollMotion.tsx` -> `assets/js/lh-homepage.js`

## Why This Is Easy To Copy Into WordPress

- Each React section is now a WordPress partial.
- Reusable motion is driven by `data-*` attributes instead of React.
- The homepage content lives in one sample-data function, so you can swap values gradually.
- The front-end animation is self-contained and can later be reused in blocks with `viewScript`.

## Recommended Next Step

Once the pasted version is working in WordPress, replace the sample arrays in `inc/lh-homepage-helpers.php` with:

- ACF fields
- custom block fields
- or native WordPress page fields plus repeaters

## ACF-Friendly Field Shape

If you want editor-managed content later, these are the clean section-level field groups:

- Header: logo, menu items, CTA URL, CTA label
- Hero: repeater of background images, title, subtitle, CTA/contact text
- Welcome: background image, 3 text lines
- Media grid: background image, 3 columns with image or video items
- Quote: title, body, link
- Step: image side, image, optional background image, eyebrow, title, body, link
- Marquee: mode, speed, card width, height, items repeater
- Footer: logo, headline, CTA buttons, contact lines, socials, legal links

## Notes

- I left the cookie popup out of the starter because WordPress cookie handling is usually better done with a consent plugin.
- I replaced the Lottie scroll icon with a CSS-only indicator so you do not need an extra runtime dependency in WordPress.
- The mobile navigation here is intentionally simple. If you want, the next step can be a proper WordPress menu + mobile drawer.

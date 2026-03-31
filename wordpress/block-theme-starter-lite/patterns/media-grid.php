<?php
/**
 * Title: Lambourne Media Grid
 * Slug: lambourne-house-block-starter/media-grid
 * Inserter: no
 */
?>
<!-- wp:html -->
<section class="lh-media-grid">
  <img class="lh-media-grid__background" src="<?php echo esc_url(get_theme_file_uri('assets/images/bgs/plant-02-small.webp')); ?>" alt="" loading="lazy">

  <div class="lh-media-grid__inner">
    <div class="lh-motion-line" data-scroll-motion="1" data-x-start="0" data-x-end="0" data-y-start="-20" data-y-end="0" data-appear-at="0" data-appear-by="0.3" data-animate-opacity="0" data-disable-below="800" data-start-vh="0.85" data-end-vh="0.35">
      <div class="lh-media-grid__column">
        <div class="lh-media-grid__item">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/stock/02.webp')); ?>" alt="Meeting room view" loading="lazy">
        </div>
      </div>
    </div>

    <div class="lh-motion-line" data-scroll-motion="1" data-x-start="0" data-x-end="0" data-y-start="0" data-y-end="0" data-appear-at="0" data-appear-by="0.3" data-animate-opacity="0" data-disable-below="800" data-start-vh="0.85" data-end-vh="0.35">
      <div class="lh-media-grid__column">
        <div class="lh-media-grid__item">
          <video autoplay muted loop playsinline>
            <source src="<?php echo esc_url(get_theme_file_uri('assets/videos/office.mp4')); ?>" type="video/mp4">
          </video>
        </div>
      </div>
    </div>

    <div class="lh-motion-line" data-scroll-motion="1" data-x-start="0" data-x-end="0" data-y-start="-200" data-y-end="0" data-appear-at="0" data-appear-by="0.3" data-animate-opacity="0" data-disable-below="800" data-start-vh="0.85" data-end-vh="0.35">
      <div class="lh-media-grid__column">
        <div class="lh-media-grid__item">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/stock/21.webp')); ?>" alt="Workspace details" loading="lazy">
        </div>
        <div class="lh-media-grid__item">
          <img src="<?php echo esc_url(get_theme_file_uri('assets/images/stock/06.webp')); ?>" alt="Office seating" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->

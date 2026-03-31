<?php
/**
 * Title: Lambourne Hero
 * Slug: lambourne-house-block-starter/hero
 * Inserter: no
 */
?>
<!-- wp:html -->
<section class="lh-hero" data-lh-hero-section>
  <div class="lh-hero__viewport">
    <div class="lh-hero__media" data-lh-parallax data-move-px="-220">
      <div class="lh-hero__slides" data-lh-hero data-slide-ms="10000">
        <div class="lh-hero__slide is-active" data-lh-slide style="background-image:url('<?php echo esc_url(get_theme_file_uri('assets/images/heros/00.webp')); ?>');"></div>
        <div class="lh-hero__slide is-next" data-lh-slide style="background-image:url('<?php echo esc_url(get_theme_file_uri('assets/images/heros/10.webp')); ?>');"></div>
      </div>

      <div class="lh-hero__content">
        <div class="lh-hero__content-inner">
          <p class="lh-hero__eyebrow">Spaces That Work for You</p>
          <h1>A Collaborative space<br>for the Everyday</h1>
          <p class="lh-hero__lede">Host events, run meetings, or grow your business in adaptable,<br>fully equipped spaces backed by dedicated support.<br><br><strong>Contact us now at 029 2082 7550</strong></p>

          <div class="lh-hero__scroll">
            <span>Scroll for more</span>
            <span class="lh-hero__scroll-indicator" aria-hidden="true"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /wp:html -->

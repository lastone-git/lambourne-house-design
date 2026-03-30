<?php
if (!defined('ABSPATH')) {
    exit;
}

$eyebrow = isset($args['eyebrow']) ? $args['eyebrow'] : '';
$title = isset($args['title']) ? $args['title'] : '';
$subtitle = isset($args['subtitle']) ? $args['subtitle'] : '';
$images = isset($args['images']) ? $args['images'] : array();
$move_px = isset($args['move_px']) ? (int) $args['move_px'] : -220;
$slide_ms = isset($args['slide_ms']) ? (int) $args['slide_ms'] : 10000;
$scroll_label = isset($args['scroll_label']) ? $args['scroll_label'] : 'Scroll for more';
?>

<section class="lh-hero" data-lh-hero-section>
    <div class="lh-hero__viewport">
        <div class="lh-hero__media" data-lh-parallax data-move-px="<?php echo esc_attr((string) $move_px); ?>">
            <div class="lh-hero__slides" data-lh-hero data-slide-ms="<?php echo esc_attr((string) $slide_ms); ?>">
                <?php foreach ($images as $index => $image) : ?>
                    <div
                        class="lh-hero__slide<?php echo 0 === $index ? ' is-active' : ' is-next'; ?>"
                        data-lh-slide
                        style="background-image: url('<?php echo esc_url(lh_homepage_asset_url($image)); ?>');"
                    ></div>
                <?php endforeach; ?>
            </div>

            <div class="lh-hero__content">
                <div class="lh-hero__content-inner">
                    <?php if ($eyebrow) : ?>
                        <p class="lh-hero__eyebrow"><?php echo esc_html($eyebrow); ?></p>
                    <?php endif; ?>

                    <?php if ($title) : ?>
                        <h1><?php echo wp_kses_post($title); ?></h1>
                    <?php endif; ?>

                    <?php if ($subtitle) : ?>
                        <p class="lh-hero__lede"><?php echo wp_kses_post($subtitle); ?></p>
                    <?php endif; ?>

                    <div class="lh-hero__scroll">
                        <span><?php echo esc_html($scroll_label); ?></span>
                        <span class="lh-hero__scroll-indicator" aria-hidden="true"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

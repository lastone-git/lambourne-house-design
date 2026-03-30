<?php
if (!defined('ABSPATH')) {
    exit;
}

$image_side = isset($args['image_side']) ? $args['image_side'] : 'left';
$image = isset($args['image']) ? $args['image'] : '';
$background_image = isset($args['background_image']) ? $args['background_image'] : '';
$title = isset($args['title']) ? $args['title'] : '';
$eyebrow = isset($args['eyebrow']) ? $args['eyebrow'] : '';
$body = isset($args['body']) ? $args['body'] : '';
$link = isset($args['link']) ? $args['link'] : array();
$background_side = 'left' === $image_side ? 'right' : 'left';
?>

<section class="lh-step lh-step--<?php echo esc_attr($image_side); ?>">
    <?php if ($background_image) : ?>
        <img
            class="lh-step__background lh-step__background--<?php echo esc_attr($background_side); ?>"
            src="<?php echo esc_url(lh_homepage_asset_url($background_image)); ?>"
            alt=""
            loading="lazy"
        >
    <?php endif; ?>

    <div
        class="lh-step__image"
        style="background-image: url('<?php echo esc_url(lh_homepage_asset_url($image)); ?>');"
        aria-hidden="true"
    ></div>

    <div class="lh-step__content">
        <?php if ($eyebrow) : ?>
            <span class="lh-step__eyebrow"><?php echo esc_html($eyebrow); ?></span>
        <?php endif; ?>

        <?php if ($title) : ?>
            <h3><?php echo esc_html($title); ?></h3>
        <?php endif; ?>

        <?php if ($body) : ?>
            <p><?php echo esc_html($body); ?></p>
        <?php endif; ?>

        <?php if (!empty($link['url']) && !empty($link['label'])) : ?>
            <a class="lh-section-link" href="<?php echo esc_url($link['url']); ?>">
                <?php echo esc_html($link['label']); ?>
            </a>
        <?php endif; ?>
    </div>
</section>

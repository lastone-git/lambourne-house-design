<?php
if (!defined('ABSPATH')) {
    exit;
}

$title = isset($args['title']) ? $args['title'] : '';
$body = isset($args['body']) ? $args['body'] : '';
$link = isset($args['link']) ? $args['link'] : array();
?>

<section class="lh-quote">
    <div class="lh-quote__inner">
        <div class="lh-motion-line" <?php echo lh_homepage_motion_attrs(array(
            'y_start' => 6.5,
            'appear_at' => 0,
            'appear_by' => 0.25,
        )); ?>>
            <h2><?php echo esc_html($title); ?></h2>
        </div>

        <div class="lh-motion-line" <?php echo lh_homepage_motion_attrs(array(
            'y_start' => 6.5,
            'appear_at' => 0.2,
            'appear_by' => 0.2,
        )); ?>>
            <p><?php echo esc_html($body); ?></p>
        </div>

        <?php if (!empty($link['url']) && !empty($link['label'])) : ?>
            <div class="lh-motion-line" <?php echo lh_homepage_motion_attrs(array(
                'y_start' => 6.5,
                'appear_at' => 0.3,
                'appear_by' => 0.3,
            )); ?>>
                <a class="lh-section-link" href="<?php echo esc_url($link['url']); ?>">
                    <?php echo esc_html($link['label']); ?> &rarr;
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

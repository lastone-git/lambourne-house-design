<?php
if (!defined('ABSPATH')) {
    exit;
}

$background_image = isset($args['background_image']) ? $args['background_image'] : '';
$lines = isset($args['lines']) ? $args['lines'] : array();
?>

<section class="lh-welcome">
    <?php if ($background_image) : ?>
        <img
            class="lh-welcome__background"
            src="<?php echo esc_url(lh_homepage_asset_url($background_image)); ?>"
            alt=""
            loading="lazy"
        >
    <?php endif; ?>

    <div class="lh-welcome__inner">
        <?php foreach ($lines as $line) : ?>
            <?php
            $modifier = !empty($line['modifier']) ? ' ' . $line['modifier'] : '';
            $motion = !empty($line['motion']) ? $line['motion'] : array();
            ?>
            <div class="lh-motion-line<?php echo esc_attr($modifier); ?>" <?php echo lh_homepage_motion_attrs($motion); ?>>
                <h2><?php echo esc_html($line['text']); ?></h2>
            </div>
        <?php endforeach; ?>
    </div>
</section>

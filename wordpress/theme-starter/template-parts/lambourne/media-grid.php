<?php
if (!defined('ABSPATH')) {
    exit;
}

$background_image = isset($args['background_image']) ? $args['background_image'] : '';
$columns = isset($args['columns']) ? $args['columns'] : array();
?>

<section class="lh-media-grid">
    <?php if ($background_image) : ?>
        <img
            class="lh-media-grid__background"
            src="<?php echo esc_url(lh_homepage_asset_url($background_image)); ?>"
            alt=""
            loading="lazy"
        >
    <?php endif; ?>

    <div class="lh-media-grid__inner">
        <?php foreach ($columns as $column) : ?>
            <?php
            $class_name = !empty($column['class_name']) ? ' ' . $column['class_name'] : '';
            $motion = !empty($column['motion']) ? $column['motion'] : array();
            $items = !empty($column['items']) ? $column['items'] : array();
            ?>
            <div class="lh-motion-line<?php echo esc_attr($class_name); ?>" <?php echo lh_homepage_motion_attrs($motion); ?>>
                <div class="lh-media-grid__column">
                    <?php foreach ($items as $item) : ?>
                        <div class="lh-media-grid__item">
                            <?php if ('video' === $item['type']) : ?>
                                <video autoplay muted loop playsinline>
                                    <source src="<?php echo esc_url(lh_homepage_asset_url($item['src'])); ?>" type="video/mp4">
                                </video>
                            <?php else : ?>
                                <img
                                    src="<?php echo esc_url(lh_homepage_asset_url($item['src'])); ?>"
                                    alt="<?php echo esc_attr($item['alt']); ?>"
                                    loading="lazy"
                                >
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

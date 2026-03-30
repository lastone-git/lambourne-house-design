<?php
if (!defined('ABSPATH')) {
    exit;
}

$items = isset($args['items']) ? $args['items'] : array();
$render_mode = isset($args['render_mode']) ? $args['render_mode'] : 'background';
$text_position = isset($args['text_position']) ? $args['text_position'] : 'below';
$speed_seconds = isset($args['speed_seconds']) ? (int) $args['speed_seconds'] : 28;
$card_width = isset($args['card_width']) ? (int) $args['card_width'] : 360;
$image_height = isset($args['image_height']) ? (int) $args['image_height'] : 360;
$gap = isset($args['gap']) ? (int) $args['gap'] : 18;
$section_pad_y = isset($args['section_pad_y']) ? (int) $args['section_pad_y'] : 12;
$section_bg = isset($args['section_bg']) ? $args['section_bg'] : 'transparent';
$border_radius = !empty($args['border_radius']);
$pause_on_hover = !isset($args['pause_on_hover']) || $args['pause_on_hover'];
$class_names = array(
    'lh-marquee',
    'background' === $render_mode ? 'lh-marquee--background' : 'lh-marquee--image',
    'lh-marquee--text-' . sanitize_html_class($text_position),
    $pause_on_hover ? 'is-pausable' : 'is-continuous',
    $border_radius ? 'has-radius' : 'no-radius',
);
$track_items = array_merge($items, $items);
$style = sprintf(
    '--speed:%ss;--card-width:%spx;--image-height:%spx;--gap:%spx;--section-pad-y:%spx;--section-bg:%s;',
    $speed_seconds,
    $card_width,
    $image_height,
    $gap,
    $section_pad_y,
    esc_attr($section_bg)
);
?>

<section class="<?php echo esc_attr(implode(' ', $class_names)); ?>" style="<?php echo esc_attr($style); ?>">
    <div class="lh-marquee__viewport">
        <div class="lh-marquee__track">
            <?php foreach ($track_items as $item) : ?>
                <?php
                $has_link = !empty($item['href']);
                $tag = $has_link ? 'a' : 'div';
                $attrs = $has_link ? ' href="' . esc_url($item['href']) . '"' : '';
                ?>
                <<?php echo $tag; ?> class="lh-marquee__card"<?php echo $attrs; ?>>
                    <?php if ('background' === $render_mode) : ?>
                        <div
                            class="lh-marquee__media"
                            style="background-image: url('<?php echo esc_url(lh_homepage_asset_url($item['image'])); ?>');"
                        >
                            <?php if ('below' !== $text_position) : ?>
                                <div class="lh-marquee__overlay">
                                    <span class="lh-marquee__label"><?php echo esc_html($item['label']); ?></span>
                                    <?php if (!empty($item['link_name'])) : ?>
                                        <span class="lh-marquee__link"><?php echo esc_html($item['link_name']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <img
                            class="lh-marquee__image"
                            src="<?php echo esc_url(lh_homepage_asset_url($item['image'])); ?>"
                            alt="<?php echo esc_attr($item['label']); ?>"
                            loading="lazy"
                            draggable="false"
                        >

                        <div class="lh-marquee__below">
                            <span class="lh-marquee__label"><?php echo esc_html($item['label']); ?></span>
                            <?php if (!empty($item['link_name'])) : ?>
                                <span class="lh-marquee__link"><?php echo esc_html($item['link_name']); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </<?php echo $tag; ?>>
            <?php endforeach; ?>
        </div>
    </div>
</section>

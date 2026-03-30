<?php
if (!defined('ABSPATH')) {
    exit;
}

$home_url = isset($args['home_url']) ? $args['home_url'] : home_url('/');
$logo_url = isset($args['logo_url']) ? $args['logo_url'] : '';
$logo_alt = isset($args['logo_alt']) ? $args['logo_alt'] : get_bloginfo('name');
$book_url = isset($args['book_url']) ? $args['book_url'] : '#';
$book_label = isset($args['book_label']) ? $args['book_label'] : 'Book now';
$nav_items = isset($args['nav_items']) ? $args['nav_items'] : array();
?>

<header class="lh-site-header" data-lh-sticky-header>
    <div class="lh-site-header__inner">
        <a class="lh-site-header__logo" href="<?php echo esc_url($home_url); ?>">
            <?php if ($logo_url) : ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
            <?php else : ?>
                <span><?php echo esc_html(get_bloginfo('name')); ?></span>
            <?php endif; ?>
        </a>

        <nav class="lh-site-header__nav" aria-label="Primary navigation">
            <ul class="lh-site-header__menu">
                <?php foreach ($nav_items as $item) : ?>
                    <?php
                    $children = !empty($item['children']) ? $item['children'] : array();
                    ?>
                    <li class="lh-site-header__menu-item<?php echo $children ? ' has-children' : ''; ?>">
                        <a href="<?php echo esc_url($item['url']); ?>">
                            <?php echo esc_html($item['label']); ?>
                            <?php if ($children) : ?>
                                <span aria-hidden="true">&#9662;</span>
                            <?php endif; ?>
                        </a>

                        <?php if ($children) : ?>
                            <ul class="lh-site-header__submenu">
                                <?php foreach ($children as $child) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($child['url']); ?>">
                                            <?php echo esc_html($child['label']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <a class="lh-site-header__button" href="<?php echo esc_url($book_url); ?>">
            <?php echo esc_html($book_label); ?>
        </a>
    </div>
</header>

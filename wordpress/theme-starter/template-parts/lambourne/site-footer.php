<?php
if (!defined('ABSPATH')) {
    exit;
}

$logo_url = isset($args['logo_url']) ? $args['logo_url'] : '';
$logo_alt = isset($args['logo_alt']) ? $args['logo_alt'] : get_bloginfo('name');
$headline = isset($args['headline']) ? $args['headline'] : '';
$actions = isset($args['actions']) ? $args['actions'] : array();
$contact_intro = isset($args['contact_intro']) ? $args['contact_intro'] : '';
$contact_lines = isset($args['contact_lines']) ? $args['contact_lines'] : array();
$socials = isset($args['socials']) ? $args['socials'] : array();
$legal_links = isset($args['legal_links']) ? $args['legal_links'] : array();
$copyright = isset($args['copyright']) ? $args['copyright'] : '';
$copyright_url = isset($args['copyright_url']) ? $args['copyright_url'] : '';
?>

<footer class="lh-site-footer">
    <div class="lh-site-footer__main">
        <div class="lh-site-footer__inner">
            <a class="lh-site-footer__logo" href="<?php echo esc_url(home_url('/')); ?>">
                <?php if ($logo_url) : ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($logo_alt); ?>">
                <?php else : ?>
                    <span><?php echo esc_html(get_bloginfo('name')); ?></span>
                <?php endif; ?>
            </a>

            <div class="lh-site-footer__columns">
                <div class="lh-site-footer__column">
                    <h2><?php echo esc_html($headline); ?></h2>

                    <div class="lh-site-footer__actions">
                        <?php foreach ($actions as $action) : ?>
                            <a
                                class="lh-site-footer__button <?php echo esc_attr($action['class_name']); ?>"
                                href="<?php echo esc_url($action['url']); ?>"
                                <?php echo !empty($action['new_tab']) ? 'target="_blank" rel="noreferrer noopener"' : ''; ?>
                            >
                                <?php echo esc_html($action['label']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="lh-site-footer__column is-right">
                    <p class="lh-site-footer__intro"><?php echo esc_html($contact_intro); ?></p>

                    <?php foreach ($contact_lines as $line) : ?>
                        <p class="lh-site-footer__line"><?php echo esc_html($line); ?></p>
                    <?php endforeach; ?>

                    <ul class="lh-site-footer__socials" aria-label="Social links">
                        <?php foreach ($socials as $social) : ?>
                            <li>
                                <a href="<?php echo esc_url($social['url']); ?>" aria-label="<?php echo esc_attr($social['label']); ?>">
                                    <?php echo esc_html($social['short_label']); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="lh-site-footer__legal">
                <?php foreach ($legal_links as $legal) : ?>
                    <p>
                        <a href="<?php echo esc_url($legal['url']); ?>" target="_blank" rel="noreferrer noopener">
                            <?php echo esc_html($legal['label']); ?>
                        </a>
                    </p>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="lh-site-footer__bottom">
        <p>
            &copy; <?php echo esc_html(gmdate('Y')); ?> <?php echo esc_html($copyright); ?>
            <?php if ($copyright_url) : ?>
                <a href="<?php echo esc_url($copyright_url); ?>" target="_blank" rel="noreferrer noopener">Visit site</a>
            <?php endif; ?>
        </p>
    </div>
</footer>

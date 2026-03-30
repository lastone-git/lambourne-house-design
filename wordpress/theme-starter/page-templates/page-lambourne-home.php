<?php
/**
 * Template Name: Lambourne Homepage
 * Template Post Type: page
 */

if (!defined('ABSPATH')) {
    exit;
}

$data = lh_homepage_sample_data();

get_header();
?>

<div class="lh-homepage">
    <?php get_template_part('template-parts/lambourne/site', 'header', $data['header']); ?>

    <main class="lh-homepage__main">
        <?php get_template_part('template-parts/lambourne/hero', null, $data['hero']); ?>
        <?php get_template_part('template-parts/lambourne/welcome', null, $data['welcome']); ?>
        <?php get_template_part('template-parts/lambourne/media-grid', null, $data['media_grid']); ?>
        <?php get_template_part('template-parts/lambourne/quote', null, $data['quote']); ?>

        <?php foreach ($data['steps'] as $step) : ?>
            <?php get_template_part('template-parts/lambourne/step', null, $step); ?>
        <?php endforeach; ?>

        <?php foreach ($data['marquees'] as $marquee) : ?>
            <?php get_template_part('template-parts/lambourne/marquee', null, $marquee); ?>
        <?php endforeach; ?>
    </main>

    <?php get_template_part('template-parts/lambourne/site', 'footer', $data['footer']); ?>
</div>

<?php
get_footer();

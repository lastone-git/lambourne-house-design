<?php
if (!defined('ABSPATH')) {
    exit;
}

function lh_v2_theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'lh_v2_theme_setup');

function lh_v2_theme_version() {
    $theme = wp_get_theme();
    $version = $theme->get('Version');

    return $version ? $version : '1.0.0';
}

function lh_v2_enqueue_assets() {
    $version = lh_v2_theme_version();

    wp_enqueue_style(
        'lh-v2-style',
        get_stylesheet_uri(),
        array(),
        $version
    );

    wp_enqueue_style(
        'lh-v2-homepage',
        get_template_directory_uri() . '/css/homepage.css',
        array('lh-v2-style'),
        $version
    );

    wp_enqueue_script(
        'lh-v2-homepage',
        get_template_directory_uri() . '/js/homepage.js',
        array(),
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'lh_v2_enqueue_assets');

function lh_v2_render_html_section($slug) {
    $path = get_template_directory() . '/html/' . $slug . '.html';

    if (!file_exists($path)) {
        return;
    }

    $html = file_get_contents($path);

    if (false === $html) {
        return;
    }

    $replacements = array(
        '{{theme_url}}' => esc_url(get_template_directory_uri()),
        '{{home_url}}' => esc_url(home_url('/')),
        '{{site_year}}' => esc_html(gmdate('Y')),
    );

    echo strtr($html, $replacements);
}

function lh_v2_render_homepage() {
    $sections = array(
        'site-header',
        'hero',
        'welcome',
        'media-grid',
        'quote',
        'step-events',
        'step-coworking',
        'marquee-suites',
        'marquee-icons',
        'site-footer',
    );

    echo '<div class="lh-homepage">';

    foreach ($sections as $index => $section) {
        if (1 === $index) {
            echo '<main class="lh-homepage__main">';
        }

        lh_v2_render_html_section($section);

        if ('marquee-icons' === $section) {
            echo '</main>';
        }
    }

    echo '</div>';
}

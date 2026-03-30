<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/lh-homepage-helpers.php';

function lh_homepage_enqueue_assets() {
    if (!is_page_template(array(
        'page-templates/page-lambourne-home.php',
        'page-lambourne-home.php',
    ))) {
        return;
    }

    $version = wp_get_theme()->get('Version');
    $version = $version ? $version : '1.0.0';

    wp_enqueue_style(
        'lh-homepage',
        get_stylesheet_directory_uri() . '/assets/css/lh-homepage.css',
        array(),
        $version
    );

    wp_enqueue_script(
        'lh-homepage',
        get_stylesheet_directory_uri() . '/assets/js/lh-homepage.js',
        array(),
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'lh_homepage_enqueue_assets');

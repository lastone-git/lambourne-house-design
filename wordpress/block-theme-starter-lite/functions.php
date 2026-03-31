<?php
if (!defined('ABSPATH')) {
    exit;
}

function lh_block_theme_enqueue_assets() {
    $version = wp_get_theme()->get('Version');
    $version = $version ? $version : '1.0.0';

    wp_enqueue_style(
        'lh-block-theme-style',
        get_stylesheet_uri(),
        array(),
        $version
    );

    wp_enqueue_style(
        'lh-block-theme-homepage',
        get_theme_file_uri('assets/css/lh-homepage.css'),
        array('lh-block-theme-style'),
        $version
    );

    wp_enqueue_script(
        'lh-block-theme-homepage',
        get_theme_file_uri('assets/js/lh-homepage.js'),
        array(),
        $version,
        true
    );
}
add_action('wp_enqueue_scripts', 'lh_block_theme_enqueue_assets');

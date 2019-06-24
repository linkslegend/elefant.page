<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

$cssPath = get_theme_file_path() . '/dist/style/main.css';


/**
 * Async load CSS
 */
add_filter('style_loader_tag', function ($html, $handle, $href) {
    if (is_admin() || file_exists($cssPath) ) {
        return $html;
    }

    $dom = new \DOMDocument();
    $dom->loadHTML($html);
    $tag = $dom->getElementById($handle . '-css');
    $tag->setAttribute('rel', 'preload');
    $tag->setAttribute('as', 'style');
    $tag->setAttribute('onload', "this.onload=null;this.rel='stylesheet'");
    $tag->removeAttribute('type');
    $html = $dom->saveHTML($tag);

    return $html;
}, 999, 3);

if (env('WP_ENV') === 'production') {
    add_action('wp_head', function () {
        $preload_script = get_theme_file_path() . '/resources/assets/scripts/cssrelpreload.js';

        if (fopen($preload_script, 'r')) {
            echo '<script>' . file_get_contents($preload_script) . '</script>';
        }
    }, 101);
}

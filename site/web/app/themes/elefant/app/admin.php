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

// Lazyload Converter for lozad.js
/**
 * Use Lozad (lazy loading) for attachments/featured images
 */
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    $attr['src="https://d1zczzapudl1mr.cloudfront.net/blank-kraken.gif"'] = $attr['src'];
    $attr['data-src'] = $attr['src'];
    $attr['data-srcset'] = $attr['srcset'];
    $attr['class'] .= ' lozad';
    unset($attr['src']);
    unset($attr['srcset']);
    return $attr;
}, 10, 2);

/**
 * Async load CSS
 */
add_filter('style_loader_tag', function ($html, $handle, $href) {
    if (is_admin()) {
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

add_action('wp_head', function () {
    $preload_script = get_theme_file_path() . '/resources/assets/scripts/cssrelpreload.js';

    if (fopen($preload_script, 'r')) {
        echo '<script>' . file_get_contents($preload_script) . '</script>';
    }
}, 101);



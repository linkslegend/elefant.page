<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});


/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);




// Lazyload Converter for lozad.js

function add_lazyload($content) {

    $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
    $dom = new \DOMDocument();
    @$dom->loadHTML($content);

    // Convert Images
    $images = [];

    foreach ($dom->getElementsByTagName('img') as $node) {
        $images[] = $node;
    }

    foreach ($images as $node) {
        $fallback = $node->cloneNode(true);

        $oldsrc = $node->getAttribute('src');
        $node->setAttribute('data-src', $oldsrc );
        $newsrc = 'https://d1zczzapudl1mr.cloudfront.net/blank-kraken.gif';
        $node->setAttribute('src', $newsrc);

        $oldsrcset = $node->getAttribute('srcset');
        $node->setAttribute('data-srcset', $oldsrcset );
        $newsrcset = '';
        $node->setAttribute('srcset', $newsrcset);

        $classes = $node->getAttribute('class');
        $newclasses = $classes . ' lozad';
        $node->setAttribute('class', $newclasses);

        $noscript = $dom->createElement('noscript', '');
        $node->parentNode->insertBefore($noscript, $node);
        $noscript->appendChild($fallback);
    }


    // Convert Videos
    $videos = [];

    foreach ($dom->getElementsByTagName('iframe') as $node) {
        $videos[] = $node;
    }

    foreach ($videos as $node) {
        $fallback = $node->cloneNode(true);

        $oldsrc = $node->getAttribute('src');
        $node->setAttribute('data-src', $oldsrc );
        $newsrc = '';
        $node->setAttribute('src', $newsrc);

        $classes = $node->getAttribute('class');
        $newclasses = $classes . ' lozad';
        $node->setAttribute('class', $newclasses);

        $noscript = $dom->createElement('noscript', '');
        $node->parentNode->insertBefore($noscript, $node);
        $noscript->appendChild($fallback);
    }

    $newHtml = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace( array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $dom->saveHTML()));
    return $newHtml;
}
add_filter('the_content', __NAMESPACE__ . '\\add_lazyload');
add_filter('post_thumbnail_html', __NAMESPACE__ . '\\add_lazyload');


add_filter('wp_nav_menu_objects', __NAMESPACE__ . '\\my_wp_nav_menu_objects', 10, 2);
function my_wp_nav_menu_objects( $items, $args ) {
	// loop
	foreach( $items as &$item ) {
		// vars
		$icon = get_field('icon', $item);
		// append icon
		if( $icon ) {
			$item->title .= ' <div class="list-image"><i class="fas fa-'.$icon.'"></i></div>';
		}
	}
	// return
	return $items;
}

/**
 * excerpt length
 */
add_filter( 'excerpt_length', __NAMESPACE__ . '\\custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
   return 20; // you can use any integer per your requirement.
}

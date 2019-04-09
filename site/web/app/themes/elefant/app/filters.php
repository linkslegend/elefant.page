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
    return ' &hellip; <a class="readmore" href="' . get_permalink() . '">' . __('Weiterlesen ....', 'sage') . '</a>';
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
/**
 * Use Lozad (lazy loading) for attachments/featured images
 */
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    // Bail on admin
    if (is_admin() || is_product()) {
        return $attr;
    }
    $attr['data-src'] = $attr['src'];
    $attr['class'] .= ' lozad';
    unset($attr['src']);
    return $attr;
}, 10, 2);

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

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', __NAMESPACE__ . '\\woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
	//$tabs['description']['title'] = __( 'More Information' );		// Rename the description tab
	//$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
	$tabs['additional_information']['title'] = __( 'Zusätzliche Infos' );	// Rename the additional information tab
	return $tabs;
}

/*Allow customers to login with their email address or username */
add_filter('authenticate', __NAMESPACE__ . '\\internet_allow_email_login', 20, 3);
/**
 * internet_allow_email_login filter to the authenticate filter hook, to fetch a username based on entered email
 * @param  obj $user
 * @param  string $username [description]
 * @param  string $password [description]
 * @return boolean
 */
function internet_allow_email_login( $user, $username, $password ) {
    if ( is_email( $username ) ) {
        $user = get_user_by_email( $username );
        if ( $user ) $username = $user->user_login;
    }
    return wp_authenticate_username_password( null, $username, $password );
}

/**
 * Modify the "must_log_in" string of the comment form.
 *
 * @see http://wordpress.stackexchange.com/a/170492/26350
 */
add_filter( 'comment_form_defaults', function( $fields ) {
    $fields['must_log_in'] = sprintf(
        __( '<p class="must-log-in">
                 You must <a href="/my-account/">Register</a> or
                 <a data-toggle="modal" data-target="#loginmodal" href="#">Login</a> to post a comment.</p>'
        ),
        wp_registration_url(),
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    );
    return $fields;
});
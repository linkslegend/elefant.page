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

/**
 * Use Lozad (lazy loading) for attachments/featured images
 */
add_filter('wp_get_attachment_image_attributes', function ($attr, $attachment) {
    // Bail on admin
    if (is_admin()) {
        return $attr;
    }
    $attr['data-src'] = $attr['src'];
    $attr['class'] .= ' lozad';
    unset($attr['src']);
    $attr['src="https://d1zczzapudl1mr.cloudfront.net/blank-kraken.giftest"'] = $attr['src'];

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
                 Sie müssen <a href="/my-account/">registriert</a> sein oder
                 <a data-toggle="modal" data-target="#loginmodal" href="#">Anmelden</a> , um einen Kommentar zu schreiben.</p>'
        ),
        wp_registration_url(),
        wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    );
    return $fields;
});

/**
* @snippet Move & Change Number of Cross-Sells @ WooCommerce Cart
* @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode https://businessbloomer.com/?p=20449
* @author Rodolfo Melogli
* @testedwith WooCommerce 2.6.2
*/

// ---------------------------------------------
// Remove Cross Sells From Default Position 

remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
// ---------------------------------------------
// Add them back UNDER the Cart Table
 
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
// ---------------------------------------------
// Display Cross Sells on 3 columns instead of default 4
 
add_filter( 'woocommerce_cross_sells_columns', __NAMESPACE__ . '\\bbloomer_change_cross_sells_columns' );

function bbloomer_change_cross_sells_columns( $columns ) {
return 8;
}

// ---------------------------------------------
// Display Only 3 Cross Sells instead of default 4
add_filter( 'woocommerce_cross_sells_total', __NAMESPACE__ . '\\bbloomer_change_cross_sells_product_no' );
function bbloomer_change_cross_sells_product_no( $columns ) {
return 8;
}

add_filter( 'gettext', __NAMESPACE__ . '\\translate_woocommerce_strings', 999 );
    function translate_woocommerce_strings( $translated ) {
    // OR zu ODER ändern
    $translated = str_ireplace('&mdash; or &mdash;', '&mdash; oder &mdash;', $translated );
    // Noch mehr ändern
    $translated = str_ireplace('falscher text', 'übersetzter text', $translated );
    //Create an account by entering the information below. If you are a returning customer please login at the top of the page.
    $translated = str_ireplace('Create an account by entering the information below. If you are a returning customer please login at the top of the page.', 'Erstellen Sie ein Konto, indem Sie die folgenden Informationen eingeben. Wenn Sie bereits Kunde sind, melden Sie sich bitte oben auf der Seite an.', $translated );
    // ETC.
    $translated = str_ireplace ('Create an account?', 'Ein Benutzerkonto erstellen?', $translated );
    $translated = str_ireplace ('Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our', 'Wir verwenden Ihre personenbezogenen Daten, um Ihre Bestellung durchführen zu können, eine möglichst gute Benutzererfahrung auf dieser Website zu ermöglichen und für weitere Zwecke, die in unserer %s beschrieben sind.', $translated );
    $translated = str_ireplace ('View Wishlist', 'Wunschliste', $translated);
    $translated = str_ireplace ('There are no products', 'Ihr Einkaufswagen ist leer.', $translated );
    $translated = str_ireplace ('Subtotal:', 'Zwischensumme:', $translated );
    $translated = str_ireplace ('View Cart', 'zum Warenkorb', $translated );
    $translated = str_ireplace ('Checkout', 'Zur Kasse', $translated );
    $translated = str_ireplace ('Item Added to your Cart!', 'Artikel in den Warenkorb gelegt!', $translated );
    $translated = str_ireplace ('Continue Shopping', 'Weiter einkaufen', $translated );
    $translated = str_ireplace ('No products in the wishlist.', 'Ihre Wunschliste ist leer.', $translated );
    
    return $translated;
}

/*
add_filter( 'woocommerce_loop_add_to_cart_link', __NAMESPACE__ . '\\misha_before_after_btn', 10, 3 );

function misha_before_after_btn( $add_to_cart_html, $product, $args ){
    $var = do_shortcode( '[favorite_button]' );
	echo $var; // Some text or HTML here
 
	return $add_to_cart_html;
}
*/

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
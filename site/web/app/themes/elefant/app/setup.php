<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

function criticalCSS_wp_head() {
	echo '<style>';
	include get_template_directory() . '/critical.css.php';
	echo '</style>';
}
add_action( 'wp_head',  __NAMESPACE__.'\\criticalCSS_wp_head' );


/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('google_fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600', false, null);
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);


/* 
    Ajax login 
*/
function ajax_login_init(){
    wp_register_script('ajax-login-script', get_template_directory_uri() . '/ajax-login-script.js', array('jquery'), false, true );
    wp_enqueue_script('ajax-login-script');
    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => get_permalink('http://elefant.page'),
        'loadingmessage' => __('Senden von Benutzerinformationen, bitte warten ...')
    ));
    // Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', __NAMESPACE__ . '\\ajax_login' );
}
// Execute the action only if the user isn't logged in
if (!is_user_logged_in()) {
    add_action('init', __NAMESPACE__ . '\\ajax_login_init');
}
function ajax_login(){
    // First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

    // Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Falscher Benutzername/Email oder Passwort.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Anmeldung erfolgreich, Bitte warten ...')));
    }

    die();
}

function wc_bypass_logout_confirmation() {
    global $wp;

    if ( isset( $wp->query_vars['customer-logout'] ) ) {
        wp_redirect( str_replace( '&amp;', '&', wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) );
        exit;
    }
}
add_action( 'template_redirect', __NAMESPACE__ . '\\wc_bypass_logout_confirmation' );
/* END Ajax Login */

/**
* Custom Registration Form Fields  
*/
function wooc_extra_register_fields() {?>
    <p class="form-row form-row-wide">
    <label for="reg_billing_phone"><?php _e( 'Telefon', 'woocommerce' ); ?></label>
    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
    </p>
    <p class="form-row form-row-first">
    <label for="reg_billing_first_name"><?php _e( 'Name', 'woocommerce' ); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
    </p>
    <p class="form-row form-row-last">
    <label for="reg_billing_last_name"><?php _e( 'Nachname', 'woocommerce' ); ?><span class="required">*</span></label>
    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}
add_action( 'woocommerce_register_form_start', __NAMESPACE__ . '\\wooc_extra_register_fields' );

/**
* register fields Validating.
*/
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
           $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );
    }
    if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
           $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );
    }
       return $validation_errors;
}
add_action( 'woocommerce_register_post', __NAMESPACE__ . '\\wooc_validate_extra_register_fields', 10, 3 );

/**
* Below code save extra fields.
*/
function wooc_save_extra_register_fields( $customer_id ) {
    if ( isset( $_POST['billing_phone'] ) ) {
                 // Phone input filed which is used in WooCommerce
                 update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
          }
      if ( isset( $_POST['billing_first_name'] ) ) {
             //First name field which is by default
             update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
             // First name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
      }
      if ( isset( $_POST['billing_last_name'] ) ) {
             // Last name field which is by default
             update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
             // Last name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
      }
}
add_action( 'woocommerce_created_customer', __NAMESPACE__ . '\\wooc_save_extra_register_fields' );

/* 
    Disable the emoji's 
*/
add_action( 'wp_enqueue_scripts',  function() {
  if ( ! is_user_logged_in() ) {
    wp_deregister_style( 'dashicons' );
  }
}, 100);

/* 
    Disable Plugin CSS 
*/
add_action( 'wp_enqueue_scripts',  function() {
    wp_deregister_script( 'ct-ultimate-gdpr' );
    wp_deregister_style( 'font-awesome' );
    //wp_deregister_style( 'yith-wacp-frontend' );
}, 100);

/**
 * Change number of products that are displayed per page (shop page)
 */
add_filter( 'loop_shop_per_page', __NAMESPACE__ . '\\new_loop_shop_per_page', 10 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 100;
  return $cols;
}

/*
  Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
function jk_dequeue_styles( $enqueue_styles ) {
	  // unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
      // unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	  // unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
add_filter( 'woocommerce_enqueue_styles', __NAMESPACE__ . '\\jk_dequeue_styles' );

// Google maps api key for ACF
function acf_google_map_api($api) {
    $api['key'] = 'AIzaSyDVLSmdnszVnSFqJspfkf8bcp5icSNmzjo';
    return $api;
}
add_filter('acf/fields/google_map/api', __NAMESPACE__ . '\\acf_google_map_api');

/* You save xx$ Amount */
// Add save amount next to sale item prices.
function you_save_echo_product() {
	global $product;

	// works for Simple and Variable type
	$regular_price 	= get_post_meta( $product->get_id(), '_regular_price', true ); // 36.32
	$sale_price 	= get_post_meta( $product->get_id(), '_sale_price', true ); // 24.99

	if( !empty($sale_price) ) {

		$saved_amount 		= $regular_price - $sale_price;
		$currency_symbol 	= get_woocommerce_currency_symbol();

		$percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );
		?>
			<div class="you_save_price"><span class="save_prefix">Sie Sparen:</span><span class="save_price"><?php echo $currency_symbol .''. number_format($saved_amount, 2, '.', ''); ?></span></div>				
		<?php
	}
}
add_action( 'woocommerce_single_product_summary', __NAMESPACE__ . '\\you_save_echo_product', 11 ); // hook number

/* Change Read more text */
// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
    global $post;
 return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\new_excerpt_more');

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
    add_theme_support('soil-js-to-footer');
    add_theme_support( 'wc-product-gallery-zoom' );
    //add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

add_filter('loop_shop_columns', __NAMESPACE__ . '\\loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    $config2 = [
        'before_widget' => '<section class="widget container text-center text-md-left %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Posts', 'sage'),
        'id'            => 'sidebar-posts'
    ] + $config);
    register_sidebar([
        'name'          => __('Page Sidebar', 'sage'),
        'id'            => 'sidebar-page'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/* Woocommerce Email style */
add_action( 'woocommerce_email_header', __NAMESPACE__ . '\\intermac_email_header', 10, 2 );
function intermac_email_header( $email_heading, $email ) { 
    echo "
    <table id='main-header' border='0' height='auto' width='100%'>
    <tbody>
    <tr>
    <td>
    <div class='navbar-brand'>
    <img class='logo' src='https://elefant.page/app/themes/elefant/dist/images/logo-elefant2_247d1fda.png'>
    </div>
    <div class='email-nav'>
        <ul>
            <li><a href='elefant.link'>Elefant.page</a></li> |
            <li><a href='elefant.link/mein-konto'>Meine Bestellungen</a></li> |
            <li><a href='elefant.link/mein-konto'>Mein Konto</a></li> |
            <li><a href='elefant.link/blog'>News/Blog</a></li>
        </ul>
    </div>
    </td>
    </tr>
    </tbody>
    </table>";
}

/* WooCommerce Email CSS */
add_filter( 'woocommerce_email_styles', __NAMESPACE__ . '\\intermac_woocommerce_email_styles', 9999, 2 );
function intermac_woocommerce_email_styles( $css, $email ) {
    $css .= "
    body { font-family: sans-serif; background: #f7f7f7; }
    .navbar-brand { text-align: left; width: 600px; white-space: nowrap; padding-left: 20px; margin: 40px auto 0 auto; }
    img.logo { height: auto; width: 120px; outline: none; }
    h1 { color: #ff7003 !important; font-family: sans-serif; font-size: 20px; font-weight: 600; line-height: 150%; margin: 0; text-align: left; text-shadow: none; }
    h2 { font-size: 17px; }
    h3 { font-size: 16px; }
    #wrapper { padding: 20px 0 70px 0; }
    table#template_container { border-radius: 8px !important; position: relative; }
    table#template_header { color: #ff7003; background-color: transparent; font-size: 1.3em; font-weight: 500; border-radius: 8px !important; }
    #header_wrapper { padding: 28px 38px 0; }
    #main-header { background-color: #f7f7f7; margin: 0; width: 100%; -webkit-text-size-adjust: none; }
    #body_content_inner p { z-index: 4; position: relative; }
    blockquote { background: #f4f4f4; border: 1px solid #e5e5e5; padding: 20px; border-radius: 4px; font-size: 15px; margin: 15px 0px; }
    .email-nav { display: block; width: 600px; background: #ffffff; box-shadow: 0 1px 4px rgba(0,0,0,0.1); color: #dedede; border: 1px solid #dedede; border-radius: 8px; padding: 0; margin: 20px auto 0 auto; }
    .email-nav ul { list-style: none; display: inline-block; padding: 15px; margin: 0;}
    .email-nav ul li { list-style: none; display: inline-block; padding: 0 5px; }
    .email-nav ul li a { color: #ff7003; text-decoration: none; transition: all 0.3s; border-radius: 4px; font-size: 0.85em; }
    .legal ul, .contact ul, .social-media ul { padding: 0; margin: 15px 0; text-align: center; }
    .legal ul li, .contact ul li, .social-media ul li { list-style: none; display: inline-block; padding-right: 5px; }
    .legal { font-size: 0.85em; color: #afafaf; position: relative; }
    .legal a { padding-right: 5px; text-decoration: none; }
    a.link { color: #636363; font-weight: normal; text-decoration: underline; background: #bbdee9; padding: 10px; margin: 0; display: block; text-decoration: none; position: relative; font-size: 14px; border-radius: 8px; text-align: center; width: 332px; }
    td.td { padding: 15px !important; }
    table.td { border: none; font-size: 15px; }
    table.td thead { background: #f4f4f4; }
    tfoot tr th.td { color: #636363; border: 1px solid #e5e5e5; vertical-align: middle; padding: 12px; text-align: left; border-top-width: 2px !important; }
    tfoot tr td.td span.woocommerce-Price-amount.amount { font-weight: 600; }
    #credit { background: #f2f2f2; }
    .footer { border-top: 5px solid #e5e5e5; padding: 20px 0 0; }
    .footer a { text-decoration: none; }
    .footer p { margin: 0; padding: 0; }
    .footer-nav { z-index: 2; position: relative; color: #636363; }
    span.line { width: auto; background: #d2d2d2; height: 1px; display: block; margin: 10px 38px; }
    .footer-logo { font-weight: normal; text-decoration: underline; width: 100%; padding: 0; display: block; text-align: center;}
    .footer-logo img { width: 110px; }
    address { padding: 12px; color: #636363; background: #f4f4f4; line-height: 20px; font-size: 15px; border: 1px solid #e5e5e5; }
    ";
	return $css;
}
 

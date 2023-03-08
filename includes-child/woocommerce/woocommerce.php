<?php

add_action( 'wp_enqueue_scripts', 'woo_css_styles', 900 );
/**
 * WOO CSS styles
 * @since 1.0.0
 */
function woo_css_styles() {
        if ( is_woocommerce() ||  is_cart() ||  is_checkout() || is_account_page() ) {
        wp_enqueue_style( 'woocss' , get_stylesheet_directory_uri() . '/includes-child/woocommerce/woo.css', array(), '2.0.0', 'all' );
        } 
}

add_action( 'template_redirect', 'bt_remove_woocommerce_styles_scripts', 999 );
/**
 * Remove Woo Styles and Scripts from non-Woo Pages
 * @link https://gist.github.com/DevinWalker/7621777#gistcomment-1980453
 * @since 1.7.0
 */
function bt_remove_woocommerce_styles_scripts() {

        // Skip Woo Pages
        if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
                return;
        }
        // Otherwise...
        remove_action('wp_enqueue_scripts', [WC_Frontend_Scripts::class, 'load_scripts']);
        remove_action('wp_print_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
        remove_action('wp_print_footer_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
}


add_action( 'wp_enqueue_scripts', 'bt_dequeue_woocommerce_fragments', 99 );
/**
 * Disable WooCommerce Fragments on Product Pages
 * Make sure 'Redirect to Cart After Successful Addition' is set in WC backend
 * @since 1.7.0
 */
function bt_dequeue_woocommerce_fragments() {
        if ( is_product() ) {
                wp_dequeue_script( 'wc-cart-fragments' );
        }
}


/**
 * Remove Supports for zoom/slider/gallery
 * @since 1.7.0
 */
//remove_theme_support( 'wc-product-gallery-zoom' );
//remove_theme_support( 'wc-product-gallery-lightbox' );
//remove_theme_support( 'wc-product-gallery-slider' );


add_filter( 'loop_shop_per_page', 'bt_new_loop_shop_per_page', 20 );
/**
 * How many products per page
 * @since 1.0.0
 */
function bt_new_loop_shop_per_page( $cols ) {
	$bt_number_products = get_theme_mod( 'bt_number_products' );

        // $cols contains the current number of products per page based on the value stored on Options -> Reading
        // Return the number of products you wanna show per page.
        $cols = $bt_number_products;
        return $cols;
}


add_filter( 'woocommerce_pagination_args', 'bt_woocommerce_pagination' );
/**
 * Update the next and previous arrows to the default style.
 *
 * @since 1.0.0
 *
 * @return string New next and previous text string.
 */
function bt_woocommerce_pagination( $args ) {

	$args['prev_text'] = sprintf( '&laquo; %s', __( 'Previous Page', 'beavertron' ) );
	$args['next_text'] = sprintf( '%s &raquo;', __( 'Next Page', 'beavertron' ) );

	return $args;
}


/**
 * Removes Order Notes Title - Additional Information
 * @since 1.7.0
 */
$bt_woo_additional = get_theme_mod( 'bt_woo_additional' );

if( $bt_woo_additional === 'disabled' ) {
	add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );
}


/**
 * Remove Notice - Showing all x results
 * @since 1.0.0
 */
$bt_woo_results = get_theme_mod( 'bt_woo_results' );

if( $bt_woo_results === 'disabled' ) {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
}


/**
 * Remove default sorting drop-down from WooCommerce
 * @since 1.7.0
 */
$bt_woo_sort = get_theme_mod( 'bt_woo_sort' );

if( $bt_woo_sort === 'disabled' ) {
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
}

/**
 * Hide 'add to cart' button on Woo archive pages
 * @since 1.7.1
 */
$cartbut = FLTheme::get_setting( 'fl-woo-cart-button' );

if ( $cartbut === 'hidden' ) {
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
}


// add_filter( 'woocommerce_checkout_fields' , 'bt_remove_order_notes' );
/**
 * Remove Order Notes Field
 * @since 1.0.0
 */
function bt_remove_order_notes( $fields ) {
        unset( $fields['order']['order_comments'] );
        return $fields;
}


// add_filter('woocommerce_billing_fields','bt_custom_billing_fields');
/**
 * Remove some fields from billing form
 * @since 1.0.0
 * @link https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 */
function bt_custom_billing_fields( $fields = array() ) {
        unset( $fields['billing_company'] );
        // unset($fields['billing_address_1']);
        // unset($fields['billing_address_2']);
        // unset($fields['billing_state']);
        // unset($fields['billing_city']);
        // unset($fields['billing_phone']);
        // unset($fields['billing_postcode']);
        // unset($fields['billing_country']);
        return $fields;
}


//add_filter('woocommerce_shipping_fields','bt_custom_shipping_fields');
/**
 * Remove some fields from shipping form
 * @since 1.0.0
 * @link https://docs.woothemes.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 */
function bt_custom_shipping_fields( $fields = array() ) {
        unset( $fields['shipping_company'] );
        // unset($fields['shipping_address_1']);
        // unset($fields['shipping_address_2']);
        // unset($fields['shipping_state']);
        // unset($fields['shipping_city']);
        // unset($fields['shipping_phone']);
        // unset($fields['shipping_postcode']);
        // unset($fields['shipping_country']);
        return $fields;
}


add_filter( 'woocommerce_thankyou_order_received_text', 'bt_thank_you' );
/**
 * Filter thank you text for digital downloads or the first page after payment
 * @since 1.7.0
 */
function bt_thank_you() {
$bt_woo_order_received = get_theme_mod( 'bt_woo_order_received' );
       
        $added_text = $bt_woo_order_received;
       
        return $added_text ;
}


/**
 * Filter to remove SKU number
 * @since 1.7.0
 */
// $bt_woo_sku = get_theme_mod( 'bt_woo_sku' );

// if( $bt_woo_sku === 'disabled' ) {
// 	add_filter( 'wc_product_sku_enabled', '__return_false' );
// }


/**
 * Remove related products on a WooCommerce product page
 * @since 1.7.0
 */
$bt_woo_related = get_theme_mod( 'bt_woo_related' );
if( $bt_woo_related === 'enabled' ) {
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
}


/**
 * Remove Category Meta on WooCommerce product page
 * @since 1.7.0
 */
$bt_woo_meta = get_theme_mod( 'bt_woo_meta' );
if( $bt_woo_meta === 'enabled' ) {
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
}


add_action( 'init', 'bt_remove_wc_breadcrumbs' );
/**
 * Remove the WooCommerce breadcrumbs 
 * @link https://docs.woocommerce.com/document/customise-the-woocommerce-breadcrumb/
 * @since 1.7.0
 */
function bt_remove_wc_breadcrumbs() {
$bt_woo_breadcrumbs = get_theme_mod( 'bt_woo_breadcrumbs');
	if( $bt_woo_breadcrumbs === 'enabled' ) {
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}
}

add_filter( 'woocommerce_breadcrumb_defaults', 'bt_change_breadcrumb_home_text' );
/**
 * Rename "home" in WooCommerce breadcrumb
 */
function bt_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Shop'
	$defaults['home'] = 'Shop';
	return $defaults;
}

add_filter( 'woocommerce_breadcrumb_home_url', 'bt_custom_breadrumb_home_url' );
/**
 * Replace the home link URL in WooCommerce breadcrumb
 */
function bt_custom_breadrumb_home_url() {
    return '/shop/';
}


add_filter( 'woocommerce_product_tabs', 'bt_remove_product_tabs', 98 );
/**
 * Remove WooCommerce Tabs - this code removes all 3 tabs - to be more specific just remove actual unset lines 
 * @since 1.7.0
 */
function bt_remove_product_tabs( $tabs ) {

$bt_woo_tabs_review = get_theme_mod( 'bt_woo_tabs_review');
$bt_woo_tabs_description = get_theme_mod( 'bt_woo_tabs_description');
$bt_woo_tabs_information = get_theme_mod( 'bt_woo_tabs_information');
	
        if ($bt_woo_tabs_description == 1) {
        unset( $tabs['description'] );
        }      	// Remove the description tab
        if ($bt_woo_tabs_review == 1) {
        unset( $tabs['reviews'] ); 		
        }	// Remove the reviews tab
        if ($bt_woo_tabs_information == 1) {
        unset( $tabs['additional_information'] );  	
        }  // Remove the additional information tab

        return $tabs;

}


add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'bt_dropdown_choice', 10 );
/**
 * Change the custom "Choose an option" on the front end
 * @since 1.7.0
 */
function bt_dropdown_choice( $args ){
	
	if( is_product() ) {

		$bt_woo_dropdown_variation = get_theme_mod( 'bt_woo_dropdown_variation');

		$args['show_option_none'] = $bt_woo_dropdown_variation;
	}  
		return $args;    
}


//add_filter( 'woocommerce_add_to_cart_redirect', 'bt_add_to_cart_redirect' );
/**
 * Go Straight to checkout after added to cart
 * @since 1.7.0
 */
function bt_add_to_cart_redirect() {
        global $woocommerce;
        $checkout_url = wc_get_checkout_url();
        return $checkout_url;
}


add_action( 'wp_print_styles', 'bt_deregister_gbstyles_wc', 100 );
/**
 * Disable gutenberg style in Frontend
 * 
 */
function bt_deregister_gbstyles_wc() {
	wp_dequeue_style('wc-blocks-style'); // disable woocommerce frontend block styles
	wp_dequeue_style('wc-blocks-vendors-style'); // disable woocommerce frontend block styles
}
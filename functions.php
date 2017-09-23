<?php

/**
 * Beavertron Theme
 *
 * @package beavertron
 * @author  NeilGee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com/
 */

/**
 * Custom Image Sizes
 * Image sizes - add in required image sizes here. Not working for theme if inside after_setup_theme function
 * @since 1.0.0
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'blog-feature', 300, 200, true );
	add_image_size( 'medium', 300, 300, true ); // Overwrite default and hard cropping
}


add_action( 'after_setup_theme', 'br_theme_setup', 15 );
/**
 * Beavertron theme set up
 *
 * @since 1.0.0
 */
function br_theme_setup() {
	

	// Defines
	// Child theme constant settings.
	define( 'CHILD_THEME_NAME', 'beavertron' );
	define( 'CHILD_THEME_URL', 'http://wpbeaches.com' );
	define( 'CHILD_THEME_VERSION', '1.0.0' );
	define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );
	// Allow SVG Upload
	define( 'ALLOW_UNFILTERED_UPLOADS', true );

	// Clean up WP Head
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );


	// Load in required or optional files.
	// Classes.
	require_once( get_stylesheet_directory() . '/classes/class-fl-child-theme.php');
	// Actions - BB Default way - This theme calls required files below.
	add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );
	// Add in our Customizer options.
	require_once( get_stylesheet_directory() . '/includes-child/customizer.php' );
	// Add in our CSS for our customizer options.
	require_once( get_stylesheet_directory() . '/includes-child/output.php' );
	// Client Logo for WP Login and backend admin clean up.
	include_once( get_stylesheet_directory() . '/includes-child/client-file.php' );
	// Remove Default BB Mobile Menu.
	include_once( get_stylesheet_directory() . '/includes-child/mobile-menu-removal.php' );
	
	// BeaverBuilder
	if ( class_exists( 'FLBuilderModel' ) ) {
		// BeaverBuilder functions
			include_once( get_stylesheet_directory() . '/includes-child/beaverbuilder.php' );
		}
		

	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {
	// WooCommerce functions
			include_once( get_stylesheet_directory() . '/includes-child/woocommerce/woocommerce.php' );
	}

	// GravityForms
	if ( class_exists( 'GFCommon' ) ) {
		include_once( get_stylesheet_directory() . '/includes-child/gravity.php' );
	}
	

	// Get the plugins.
	//require_once  get_stylesheet_directory() . '/plugins.php';

	// Allow the theme to be translated.
	load_theme_textdomain( 'beavertron', get_stylesheet_directory_uri() . '/languages' );

	add_filter( 'image_size_names_choose', 'bt_custom_image_sizes' );
	// Helps Beaver Builder see custom sizes.
	function bt_custom_image_sizes( $sizes ) {
		global $_wp_additional_image_sizes;
		if ( empty($_wp_additional_image_sizes) )
				return $sizes;
	
		foreach ( $_wp_additional_image_sizes as $id => $data ) {
				if ( !isset($sizes[$id]) )
						$sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
		}
		return $sizes;
	}

	add_filter( 'intermediate_image_sizes_advanced', 'bt_remove_default_images' );
	// Remove default image sizes here.
	function bt_remove_default_images( $sizes ) {
		// unset( $sizes['small']); // 150px
		// unset( $sizes['medium']); // 300px
		// unset( $sizes['large']); // 1024px
		unset( $sizes['medium_large']); // 768px
		return $sizes;
	}


	add_filter( 'upload_mimes', 'bt_add_svg_images' );
	/**
	* Allow SVG Images Via Media Uploader.
	*/
	function bt_add_svg_images( $mimetypes ) {
		$mimetypes['svg'] = 'image/svg+xml';
		return $mimetypes;
	}

	// Add support for custom logo change the dimensions to suit. Need WordPress 4.5 for this.
	add_theme_support( 'custom-logo', array(
		'height'      => 100, // set to your dimensions
		'width'       => 300,// set to your dimensions
		'flex-height' => true,
		'flex-width'  => true,
	));
	
	
	add_shortcode( 'client_logo', 'bt_client_logo' );
	// Position the content with a shortcode [client_logo]
	function bt_client_logo() {
	ob_start();
		if ( function_exists( 'the_custom_logo' ) ) {    
		echo '<div itemscope itemtype="http://schema.org/Organization">' . get_custom_logo() . '</div>';
		}
	return ob_get_clean();
	}


	// Allow shortcode to run in widgets.
	add_filter( 'widget_text', 'do_shortcode' );


	add_filter( 'widget_text','bt_execute_php_widgets' );
	/**
	* Allow PHP code to run in Widgets.
	*/
	function bt_execute_php_widgets( $html ) {
		if ( strpos( $html, '<' . '?php' ) !== false ) {
			ob_start();
			eval( '?' . '>' . $html );
			$html = ob_get_contents();
			ob_end_clean();
		}
	return $html;
	}
	/**
	* Add sys font stack to theme customizer
	*/
	add_filter( 'fl_theme_system_fonts', 'bt_added_fonts' );
	function bt_added_fonts( $system ) {
		$system[ '-apple-system' ] = array(
				"fallback" => "BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",			
				"weights"  => array(
					"300",
					"400",
					"700",
				)
		);
		return $system;
	}

	

} // Closing After Set Up Hook


add_filter( 'fl_builder_override_lightbox', __return_true );

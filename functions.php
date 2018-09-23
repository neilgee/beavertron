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
/**
 * Filtering the Customizer
 * Not working for theme if inside after_setup_theme function - so thats why it is here.
 * @since 1.7.0
 */
require_once( get_stylesheet_directory() . '/includes-child/customizer-filtered.php' );


add_action( 'after_setup_theme', 'bt_theme_setup', 15 );
/**
 * Beavertron theme set up
 *
 * @since 1.0.0
 */
function bt_theme_setup() {
	/**
	 * Defines
	 * Child theme constant settings.
	 * @since 1.0.0
	 */
	define( 'CHILD_THEME_NAME', 'beavertron' );
	define( 'CHILD_THEME_URL', 'http://wpbeaches.com' );
	define( 'CHILD_THEME_VERSION', '1.7.0' );
	define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
	define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );
	// Allow SVG Upload
	define( 'ALLOW_UNFILTERED_UPLOADS', true );

	/**
	 * Clean up WP Head
	 * @since 1.0.0
	 */
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	/**
	 * Load Beaver Builder classes, cache buster and core class
	 * @since 1.0.0
	 */
	if ( ! class_exists('FLCache\CacheHelper') ) {
		require_once( get_stylesheet_directory() . '/classes/class-fl-builder-cache-helper.php');
	}
	require_once( get_stylesheet_directory() . '/classes/class-fl-child-theme.php');
	// Actions - BB Default way - This theme calls required files below.
	add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

	/**
	 * Add Customizer Options and CSS output.
	 * @since 1.0.0
	 */
	require_once( get_stylesheet_directory() . '/includes-child/customizer.php' );
	require_once( get_stylesheet_directory() . '/includes-child/output.php' );

	/**
	 * Client Logo for WP Login and backend admin clean up.
	 * @since 1.0.0
	 */
	include_once( get_stylesheet_directory() . '/includes-child/client-file.php' );
	
	/**
	 * Remove Default BB Mobile Menu.
	 * @since 1.0.0
	 */
	//include_once( get_stylesheet_directory() . '/includes-child/mobile-menu-removal.php' );
	
	
	/**
	 * Load in Beaver Builder Plugin functions
	 * @since 1.0.0
	 */
	if ( class_exists( 'FLBuilderModel' ) ) {
		// BeaverBuilder functions
		include_once( get_stylesheet_directory() . '/includes-child/beaverbuilder.php' );
	}
	
	/**
	 * Load in WooCommerce functions
	 * @since 1.0.0
	 */
	if ( class_exists( 'WooCommerce' ) ) {
		include_once( get_stylesheet_directory() . '/includes-child/woocommerce/woocommerce.php' );
	}

	/**
	 * Load in Gravity Forms functions
	 * @since 1.0.0
	 */
	if ( class_exists( 'GFCommon' ) ) {
		include_once( get_stylesheet_directory() . '/includes-child/gravity.php' );
	}
	
	/**
	* Get the plugins ffrom TGM Plugin Activation
	* @since 1.0.0
	*/
	//require_once  get_stylesheet_directory() . '/plugins.php';

	/**
	* Allow the theme to be translated.
	* @since 1.0.0
	*/
	load_theme_textdomain( 'beavertron', get_stylesheet_directory_uri() . '/languages' );

	add_filter( 'image_size_names_choose', 'bt_custom_image_sizes' );
	/**
	* Helps Beaver Builder see custom sizes.
	* @since 1.0.0
	* @link https://kb.wpbeaverbuilder.com/article/382-add-custom-image-sizes
	*/
	function bt_custom_image_sizes( $sizes ) {
		global $_wp_additional_image_sizes;
		if ( empty( $_wp_additional_image_sizes ) )
				return $sizes;
	
		foreach ( $_wp_additional_image_sizes as $id => $data ) {
				if ( !isset($sizes[$id]) )
						$sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
		}
		return $sizes;
	}

	add_filter( 'intermediate_image_sizes_advanced', 'bt_remove_default_images' );
	/**
	* Remove default image sizes
	* @since 1.0.0
	*/
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
	* @since 1.0.0
	*/
	function bt_add_svg_images( $mimetypes ) {
		$mimetypes['svg'] = 'image/svg+xml';
		return $mimetypes;
	}


	/**
	* Add support for custom logo change the dimensions to suit. Need WordPress 4.5 for this.
	* @since 1.0.0
	*/
	add_theme_support( 'custom-logo', array(
		'height'      => 100, // set to your dimensions
		'width'       => 300,// set to your dimensions
		'flex-height' => true,
		'flex-width'  => true,
	));
	
	
	add_shortcode( 'client_logo', 'bt_client_logo' );
	/**
	* Position the content with a shortcode [client_logo]
	* @since 1.0.0
	*/
	function bt_client_logo() {
	ob_start();
		if ( function_exists( 'the_custom_logo' ) ) {    
			echo '<div itemscope itemtype="http://schema.org/Organization">' . get_custom_logo() . '</div>';
		}
	return ob_get_clean();
	}

	
	add_action( 'add_attachment', 'bt_image_meta_upon_image_upload' );
	/**
	 * Automatically set the image Title, Alt-Text, Caption & Description upon upload
	 * @since 1.0.0
	 * @link https://brutalbusiness.com/automatically-set-the-wordpress-image-title-alt-text-other-meta/
	 */
	function bt_image_meta_upon_image_upload( $post_ID ) {

		// Check if uploaded file is an image, else do nothing

		if ( wp_attachment_is_image( $post_ID ) ) {

			$my_image_title = get_post( $post_ID )->post_title;

			// Sanitize the title:  remove hyphens, underscores & extra spaces:
			$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

			// Sanitize the title:  capitalize first letter of every word (other letters lower case):
			$my_image_title = ucwords( strtolower( $my_image_title ) );

			// Create an array with the image meta (Title, Caption, Description) to be updated
			// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
			$my_image_meta = array(
				'ID'		=> $post_ID,			// Specify the image (ID) to be updated
				'post_title'	=> $my_image_title,		// Set image Title to sanitized title
				//'post_excerpt'	=> $my_image_title,		// Set image Caption (Excerpt) to sanitized title
				//'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
			);

			// Set the image Alt-Text
			update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

			// Set the image meta (e.g. Title, Excerpt, Content)
			wp_update_post( $my_image_meta );

		} 
	}

	/**
	* Allow shortcode to run in widgets.
	* @since 1.0.0
	*/
	add_filter( 'widget_text', 'do_shortcode' );


	add_filter( 'widget_text','bt_execute_php_widgets' );
	/**
	* Allow PHP code to run in Widgets.
	* @since 1.0.0
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

} // Closing After Set Up Hook
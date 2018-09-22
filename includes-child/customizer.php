<?php
/**
 * Adding all Customizer Stuff Here.
 *
 * @package beavertron
 */


add_action( 'customize_register', 'bt_register_theme_customizer', 20 );
/**
 * Register for the Customizer
 */
function bt_register_theme_customizer( $wp_customize ) {

	global $wp_customize;

	/* Adding in a Hover Control for Buttons to the fl-buttons panel*/
	$wp_customize->add_setting(
		'bt_border_color_hover', //give it an ID
		array(
			'default' => '#000000', // Give it a default
		)
	);
	$wp_customize->add_control(
	   new WP_Customize_Color_Control(
		   $wp_customize,
		   'bt_border_color_on_hover', //give it an ID
		   array(
			   'label'      => __( 'Border Hover Color', 'beavertron' ), //set the label to appear in the Customizer
			   'section'    => 'fl-buttons', //select the section for it to appear under  
			   'settings'   => 'bt_border_color_hover', //pick the setting it applies to
			   'priority'	 => 15,
		   )
	   )
	);
	
	// Change label for logo text color
	// $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'beavertron');

	// Customize Background Settings
	// Change heading.
	$wp_customize->get_section( 'background_image' )->title = __( 'Background Styles', 'beavertron' );
	// Move background image to background styles.
	$wp_customize->get_control( 'background_color' )->section = 'background_image';

	// Create custom panel.
	$wp_customize->add_panel( 'featured_images', array(
		'priority'       => 70,
		'theme_supports' => '',
		'title'          => __( 'Featured Images', 'beavertron' ),
		'description'    => __( 'Set background images for certain widgets.', 'beavertron' ),
	) );

	// Add Featured Image for Hero Widget
	// Add section.
	$wp_customize->add_section( 'hero_background' , array(
		'title'      => __( 'Hero Background','beavertron' ),
		'panel'      => 'featured_images',
		'priority'   => 20,
	) );

	// Add setting.
	$wp_customize->add_setting( 'hero_bg', array(
			//'default'     => get_stylesheet_directory_uri() . '/images/hero-bg.jpg',
	) );

	// Add control.
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'hero_background_image', array(
			'label'      => __( 'Add Hero Background Here, the width should be approx 1400px', 'beavertron' ),
			'section'    => 'hero_background',
			'settings'   => 'hero_bg',
			)
	) );


		 
	// Remove Panels and Sections by uncommenting.

	//$wp_customize->remove_section( 'fl-presets' ); 

	// $wp_customize->remove_panel( 'fl-general' );
	// 	$wp_customize->remove_section( 'fl-layout' ); 
	// 	$wp_customize->remove_section( 'fl-body-bg' ); 
	// 	$wp_customize->remove_section( 'fl-accent-color' ); 
	// 	$wp_customize->remove_section( 'fl-heading-font' ); 
	// 	$wp_customize->remove_section( 'fl-body-text' ); 
	// $wp_customize->remove_section( 'fl-buttons' ); 

	 

	// $wp_customize->remove_panel( 'fl-header' ); 
	// 	$wp_customize->remove_section( 'fl-topbar-layout' ); 
	// 	$wp_customize->remove_section( 'fl-topbar-style' ); 
	// 	$wp_customize->remove_section( 'fl-header-layout' ); 
	// 	$wp_customize->remove_section( 'fl-header-style' ); 
	// 	$wp_customize->remove_section( 'fl-header-logo' ); 
	// 	$wp_customize->remove_section( 'fl-nav-layout' ); 
	// 	$wp_customize->remove_section( 'fl-nav-style' ); 
		
	
	// $wp_customize->remove_panel( 'fl-content' ); 
	// 	$wp_customize->remove_section( 'fl-content-bg ' ); 
	// 	$wp_customize->remove_section( 'fl-content-blog' ); 
	// 	$wp_customize->remove_section( 'fl-content-archives' ); 
	// 	$wp_customize->remove_section( 'fl-content-posts' ); 
	// 	$wp_customize->remove_section( 'fl-content-woo' ); 
	// 	$wp_customize->remove_section( 'fl-lightbox-layout' ); 


	// $wp_customize->remove_panel( 'fl-footer' ); 
	// 	$wp_customize->remove_section( 'fl-footer-widgets-layout' ); 
	// 	$wp_customize->remove_section( 'fl-footer-widgets-style' ); 
	// 	$wp_customize->remove_section( 'fl-footer-layout' ); 
	// 	$wp_customize->remove_section( 'fl-footer-style' ); 
	// 	$wp_customize->remove_section( 'fl-footer-effect' ); 

	// $wp_customize->remove_panel( 'fl-code' ); 
	// 	$wp_customize->remove_section( 'fl-css-code-section' ); 
	// 	$wp_customize->remove_section( 'fl-js-code-section' ); 
	// 	$wp_customize->remove_section( 'fl-head-code-section' ); 
	// 	$wp_customize->remove_section( 'fl-header-code-section' ); 
	// 	$wp_customize->remove_section( 'fl-footer-code-section' ); 
	
	
	// $wp_customize->remove_panel( 'fl-settings' ); 
	// 	$wp_customize->remove_section( 'fl-social-links' ); 
	// 	$wp_customize->remove_section( 'title_tagline' ); 
	// 	$wp_customize->remove_section( 'static_front_page' ); 
	
	
	// $wp_customize->remove_panel( 'nav_menus' ); 
	// $wp_customize->remove_section( 'custom_css' ); 	
	// $wp_customize->remove_panel( 'widgets' ); 
	// $wp_customize->remove_section( 'fl-export-import' );

	
	// $wp_customize->remove_panel( 'featured_images' );
	// $wp_customize->remove_section( 'bt_single_image_section' );
	// $wp_customize->remove_section( 'colors' );


	// $wp_customize->remove_section( 'title_tagline' ); // Removes Site Identity
	// $wp_customize->remove_section( 'static_front_page' ); // Removes Static Front Page

	
}



// Adding a custom preset with some default values.
FLCustomizer::add_preset( 'bt-preset-colour', array(
	'name'      => 'BT Preset',
	'skin'      => get_stylesheet_directory() . '/css/presets.css', // what ever is in this gets output to Skin CSS
	'settings'  => array(
		// http://kb.wpbeaverbuilder.com/article/283-add-theme-preset-general
		'fl-layout-width'				=> 'full-width',
		'fl-content-width'				=> '1020', // Container width
		'fl-scroll-to-top'				=> 'enable', 

		'fl-body-bg-color'             	=> '#fff',
		
		'fl-accent'                 	=> '#666666',
		'fl-accent-hover'           	=> '#999999',

		'fl-heading-text-color'     	=> '#333333',
		'fl-topbar-bg-color'        	=> '#333333',
		'fl-topbar-text-color'			=> '#cccccc',
		'fl-topbar-link-color'			=> '#999999',
		'fl-topbar-hover-color'			=> '#ffffff',


		'fl-header-bg-color'        	=> '#000',
		'fl-header-text-color'			=> '#cccccc',
		'fl-header-link-color'			=> '#999999',
		'fl-header-hover-color'			=> '#ffffff',

		'fl-nav-bg-color'           	=> '#000000',
		'fl-nav-link-color'				=> '#cccccc',
		'fl-nav-hover-color'			=> '#ffffff',
		'fl-logo-font-family'			=> 'system-ui',
		'fl-nav-font-family'			=> 'system-ui',

		'fl-footer-widgets-bg-color'	=> '#000000',
		'fl-footer-widgets-text-color'	=> '#cccccc',
		'fl-footer-widgets-link-color'	=> '#999999',
		'fl-footer-widgets-hover-color'	=> '#ffffff',
		'fl-footer-bg-color'			=> '#000000',
		'fl-footer-text-color'			=> '#cccccc',
		'fl-footer-link-color'			=> '#999999',
		'fl-footer-hover-color'			=> '#ffffff',

		'fl-heading-font-family'		 => 'system-ui',
		'fl-h1-font-size'			     => '36',
		'fl-h2-font-size'			     => '30',
		'fl-h3-font-size'			     => '24',
		'fl-h4-font-size'			     => '20',
		'fl-h5-font-size'			     => '18',
		'fl-h6-font-size'			     => '16',

		'fl-body-text-color'			 => '#333333',
		'fl-body-font-family'			 => 'system-ui',
		'fl-body-font-weight'			 => '400',
		'fl-body-font-size'			     => '18',
		'fl-body-line-height'			 => '1.3',

		'fl-archive-readmore-text' 	  => 'See More',

		'fl-button-style'					=> 'custom',
		'fl-button-color'	                  => '#ffffff',
		'fl-button-hover-color'	            => '#000000',
		'fl-button-background-color'	       => '#000000',
		'fl-button-background-hover-color'	 => '#ffffff',
		// 'fl-button-font-line'	              => '',
		'fl-button-font-family'	               => 'system-ui',
		'fl-button-font-weight'	               => '400',
		// 'fl-button-font-size'	              => '',
		'fl-button-line-height'	               => 1.5,
		'fl-button-text-transform'	            => 'uppercase',
		// 'fl-button-border-line'	            => '',
		'fl-button-border-style'	           => 'solid',
		'fl-button-border-width'	              => 1,
		'fl-button-border-color'	           => '#000000',
		'fl-button-border-radius'	             => 3,

		// Thesea are other key pairs that you can use
		// 'fl-header-nav-search' 		     => 'hidden',
		// 'fl-header-content-layout' 	  => 'social-text',
		// 'fl-header-content-text' 	    => '¡Llámanos! 5555-555',
		// 'fl-logo-type' 			            => 'text',
		// 'fl-logo-text' 			            => 'Centro de Salud',
		// 'fl-blog-layout' 		           => 'sidebar-right',
		// 'fl-blog-sidebar-size' 		     => '3',
		// 'fl-blog-sidebar-display' 	   => 'desktop',
		// 'fl-blog-post-author' 		      => 'hidden',
		// 'fl-blog-post-date' 		        => 'visible',
		// 'fl-archive-show-full' 		     => '0',
		// 
		// 'fl-archive-show-thumbs' 	    => 'beside',
		// 'fl-posts-show-thumbs' 		     => '',
		// 'fl-posts-show-cats' 		       => 'visible',
		// 'fl-posts-show-tags' 		       => 'visible',
		// 'fl-posts-show-nav' 		        => 'hidden',
		// 'fl-lightbox' 			             => 'enabled',
		// 'fl-footer-widgets-display'	  => 'disabled',
		// 'fl-footer-widgets-bg-type' 	 => 'content',
		// 'fl-footer-layout' 		         => '2-cols',
		// 'fl-footer-col1-layout' 	     => 'text',
		// 'fl-footer-col2-layout'	 	    => 'social',

		// 'fl-social-facebook' 		 => 'http://facebook.com',
		// 'fl-social-twitter' 		  => 'http://twitter.com',
		// 'fl-social-google' 		   => 'http://google.com',
		// 'fl-social-linkedin' 		 => 'http://linkedin.com',

	)
));

/** Remove all the builtin presets.
 *  Removing all but the default and custom preset one.
 */
FLCustomizer::remove_preset( 
	array('default-dark' , 'classic' , 'modern' , 'bold' , 
		'stripe' , 'deluxe' , 'premier' , 'dusk' , 'midnight'
	)
);


add_filter( 'fl_default_theme_mods', 'bt_default_theme_preset');
/** 
 *  Default Theme Mods
 */
function bt_default_theme_preset( $mods ) {
	$mods2 = array(
		'fl-layout-width'				=> 'full-width',
		'fl-content-width'				=> '1200', // Container width
		'fl-scroll-to-top'				=> 'enable', 

		'fl-body-bg-color'             	=> '#fff',
		
		'fl-accent'                 	=> '#555555',
		'fl-accent-hover'           	=> '#666666',

		'fl-heading-text-color'     	=> '#333333',
		'fl-topbar-bg-color'        	=> '#333333',
		'fl-topbar-text-color'			=> '#cccccc',
		'fl-topbar-link-color'			=> '#999999',
		'fl-topbar-hover-color'			=> '#ffffff',


		'fl-header-bg-color'        	=> '#000',
		'fl-header-text-color'			=> '#cccccc',
		'fl-header-link-color'			=> '#999999',
		'fl-header-hover-color'			=> '#ffffff',

		'fl-nav-bg-color'           	=> '#000000',
		'fl-nav-link-color'				=> '#cccccc',
		'fl-nav-hover-color'			=> '#ffffff',
		'fl-logo-font-family'			=> 'system-ui',
		'fl-nav-font-family'			=> 'system-ui',

		'fl-footer-widgets-bg-color'	=> '#000000',
		'fl-footer-widgets-text-color'	=> '#cccccc',
		'fl-footer-widgets-link-color'	=> '#999999',
		'fl-footer-widgets-hover-color'	=> '#ffffff',
		'fl-footer-bg-color'			=> '#000000',
		'fl-footer-text-color'			=> '#cccccc',
		'fl-footer-link-color'			=> '#999999',
		'fl-footer-hover-color'			=> '#ffffff',

		'fl-heading-font-family'		 => 'system-ui',
		'fl-h1-font-size'			     => '36',
		'fl-h2-font-size'			     => '30',
		'fl-h3-font-size'			     => '24',
		'fl-h4-font-size'			     => '20',
		'fl-h5-font-size'			     => '18',
		'fl-h6-font-size'			     => '16',

		'fl-body-text-color'			 => '#333333',
		'fl-body-font-family'			 => 'system-ui',
		'fl-body-font-weight'			 => '300',
		'fl-body-font-size'			     => '18',
		'fl-body-line-height'			 => '1.6',

		'fl-archive-readmore-text' 	     => 'Read More',

		'fl-blog-layout' 		         => 'sidebar-right',
		'fl-blog-sidebar-size' 		     => '3',
		'fl-blog-sidebar-display' 	     => 'desktop',
		'fl-blog-post-author' 		     => 'hidden',
		'fl-blog-post-date' 		     => 'visible',
		'fl-archive-show-full' 		     => '0',

		'fl-lightbox' 			         => 'enabled',
		
		'fl-button-style'					=> 'custom',
		'fl-button-color'	                  => '#ffffff',
		'fl-button-hover-color'	            => '#000000',
		'fl-button-background-color'	       => '#000000',
		'fl-button-background-hover-color'	 => '#ffffff',
		// 'fl-button-font-line'	              => '',
		'fl-button-font-family'	               => 'system-ui',
		'fl-button-font-weight'	               => '400',
		// 'fl-button-font-size'	              => '',
		'fl-button-line-height'	               => 1.5,
		'fl-button-text-transform'	            => 'uppercase',
		// 'fl-button-border-line'	            => '',
		'fl-button-border-style'	           => 'solid',
		'fl-button-border-width'	              => 1,
		'fl-button-border-color'	           => '#000000',
		'fl-button-border-radius'	             => 3,


		// These are other key pairs that you can use
		// 'fl-header-nav-search' 		     => 'hidden',
		// 'fl-header-content-layout' 	  => 'social-text',
		// 'fl-header-content-text' 	    => '¡Llámanos! 5555-555',
		// 'fl-logo-type' 			            => 'text',
		// 'fl-logo-text' 			            => 'Centro de Salud',
	
		// 
		// 'fl-archive-show-thumbs' 	    => 'beside',
		// 'fl-posts-show-thumbs' 		     => '',
		// 'fl-posts-show-cats' 		       => 'visible',
		// 'fl-posts-show-tags' 		       => 'visible',
		// 'fl-posts-show-nav' 		        => 'hidden',
		// 'fl-footer-widgets-display'	  => 'disabled',
		// 'fl-footer-widgets-bg-type' 	 => 'content',
		// 'fl-footer-layout' 		         => '2-cols',
		// 'fl-footer-col1-layout' 	     => 'text',
		// 'fl-footer-col2-layout'	 	    => 'social',

		// 'fl-social-facebook' 		       => 'http://facebook.com/beavertron'
		// 'fl-social-twitter' 		        => 'http://twitter.com',
		// 'fl-social-google' 		         => 'http://google.com',
		// 'fl-social-linkedin' 		       => 'http://linkedin.com',
	);
	
	
	$mods3 = array_merge($mods, $mods2); 

	return $mods3;

}






//add_action( 'wp_enqueue_scripts', 'bt_customize_css2', 1001 );
/**
 * Output CSS for background image with wp_add_inline_style
 * This is being output in output.php
 */
function bt_customize_css2() {
	//wp_enqueue_style( 'beavertron', get_stylesheet_directory_uri() . '/style.css' ); //Enqueue your main stylesheet
	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';
	//$handle  = 'beavertron';

	$css = '';
	$border_color = get_theme_mod( 'bt_border_color_hover' ); // Assigning it to a variable to keep the markup clean.
	$css .= ( $border_color ) ? sprintf('
		.fl-page button:hover, 
		.fl-responsive-preview-content button:hover, 
		.fl-page input[type=button]:hover, 
		.fl-responsive-preview-content input[type=button]:hover, 
		.fl-page input[type=submit]:hover, 
		.fl-responsive-preview-content input[type=submit]:hover, 
		.fl-page a.fl-button:hover, 
		.fl-responsive-preview-content a.fl-button:hover {
			border-color: %s;			 
		}
	', $border_color ) : '';
	if ( $css ) {
	wp_add_inline_style( $handle  , $css );
	}

	// var_dump($handle);
	// var_dump($css);
	// var_dump($border_color);
	
}

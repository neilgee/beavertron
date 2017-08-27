<?php
/**
 * Adding all Customizer Stuff Here.
 *
 * @package beavertron
 */

 /**
  * Set Up Default Colors - so if not changed in Customizer no CSS mark up is output
  */
 

 function  bt_button_color_default() {
	return '#333333';
 }

 function  bt_button_hover_color_default() {
	 return '#c3251d';
 }


add_action( 'customize_register', 'bt_register_theme_customizer', 20 );
/**
 * Register for the Customizer
 */
function bt_register_theme_customizer( $wp_customize ) {

	global $wp_customize;

	
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


	// Add Section For Buttons
	$wp_customize->add_section( 'bt_buttons' , array(
		'title'      => __( 'Buttons','beavertron' ),
		'panel'      => 'fl-general',
		'priority'   => 20,
	) );

	// Add buttons background color
	// Add setting.
	$wp_customize->add_setting( 'bt_button_color', array(
			'default' => bt_button_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_button_color', array(
        		'label'      => __( 'Button Color', 'beavertron' ), //set the label to appear in the Customizer
        		'section'    => 'bt_buttons', //select the section for it to appear under
        		'settings'   => 'bt_button_color' //pick the setting it applies to
        		)
        ) );

	// Add buttons hover - focus background color
	// Add setting.
	$wp_customize->add_setting( 'bt_button_hover_color', array(
		'default' => bt_button_hover_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_button_hover_color', array(
        		'label'      => __( 'Button Hover Color', 'beavertron' ), //set the label to appear in the Customizer
        		'section'    => 'bt_buttons', //select the section for it to appear under
        		'settings'   => 'bt_button_hover_color' //pick the setting it applies to
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



// Add custom preset.
FLCustomizer::add_preset( 'bt-preset-colour', array(
	'name'      => 'BT Preset',
	'skin'      => get_stylesheet_directory() . '/css/presets.css', // what ever is in this gets output to Skin CSS
	'settings'  => array(
		// http://kb.wpbeaverbuilder.com/article/283-add-theme-preset-general
		'fl-layout-width'				=> 'full-width',
		'fl-content-width'				=> '1020', // Container width
		'fl-scroll-to-top'				=> 'enable', 

		'fl-body-bg-color'             	=> '#fff',
		
		'fl-accent'                 	=> '#c3251d',
		'fl-accent-hover'           	=> '#999999',

		'fl-heading-text-color'     	=> '#555555',
		'fl-topbar-bg-color'        	=> '#222222',
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

		'fl-footer-widgets-bg-color'	=> '#000000',
		'fl-footer-widgets-text-color'	=> '#cccccc',
		'fl-footer-widgets-link-color'	=> '#999999',
		'fl-footer-widgets-hover-color'	=> '#ffffff',
		'fl-footer-bg-color'			=> '#000000',
		'fl-footer-text-color'			=> '#cccccc',
		'fl-footer-link-color'			=> '#999999',
		'fl-footer-hover-color'			=> '#ffffff',

		'fl-h1-font-size'			     => '36',
		'fl-h2-font-size'			     => '30',
		'fl-h3-font-size'			     => '24',
		'fl-h4-font-size'			     => '20',
		'fl-h5-font-size'			     => '18',
		'fl-h6-font-size'			     => '16',

		'fl-body-text-color'			 => '#555555',
		// 'fl-body-font-family'			 => 'BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
		'fl-body-font-weight'			 => '400',
		'fl-body-font-size'			     => '18',
		'fl-body-line-height'			 => '1.3',

		'fl-archive-readmore-text' 	  => 'See More',

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
 *  Removing all but th default and my custom preset one.
 */
FLCustomizer::remove_preset( 
	array('default-dark' , 'classic' , 'modern' , 'bold' , 
		'stripe' , 'deluxe' , 'premier' , 'dusk' , 'midnight'
	)
);


add_filter( 'fl_default_theme_mods', 'bt_default_theme_preset');

function bt_default_theme_preset( $mods ) {

	$mods2 = array(
		'fl-layout-width'				=> 'full-width',
		'fl-content-width'				=> '1020', // Container width
		'fl-scroll-to-top'				=> 'enable', 

		'fl-body-bg-color'             	=> '#fff',

		//'fl-accent'                 	=> '#333',
		
		'fl-accent'                 	=> '#c3251d',
		'fl-accent-hover'           	=> '#666666',

		'fl-heading-text-color'     	=> '#555555',
		'fl-topbar-bg-color'        	=> '#222222',
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

		'fl-footer-widgets-bg-color'	=> '#000000',
		'fl-footer-widgets-text-color'	=> '#cccccc',
		'fl-footer-widgets-link-color'	=> '#999999',
		'fl-footer-widgets-hover-color'	=> '#ffffff',
		'fl-footer-bg-color'			=> '#000000',
		'fl-footer-text-color'			=> '#cccccc',
		'fl-footer-link-color'			=> '#999999',
		'fl-footer-hover-color'			=> '#ffffff',

		'fl-h1-font-size'			     => '36',
		'fl-h2-font-size'			     => '30',
		'fl-h3-font-size'			     => '24',
		'fl-h4-font-size'			     => '20',
		'fl-h5-font-size'			     => '18',
		'fl-h6-font-size'			     => '16',

		'fl-body-text-color'			 => '#555555',
		// 'fl-body-font-family'			 => 'BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
		'fl-body-font-weight'			 => '400',
		'fl-body-font-size'			     => '18',
		'fl-body-line-height'			 => '1.3',

		'fl-archive-readmore-text' 	     => 'Read More'
	);

	$mods3 = array_merge($mods, $mods2); 
	

	return $mods3;

}






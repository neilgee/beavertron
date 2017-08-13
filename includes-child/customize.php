<?php
/**
 * Adding all Customizer Stuff Here.
 *
 * @package beavertron
 */
 /**
  * Set Up Default Colors - so if not changed in Customizer no CSS mark up is output
  */
 function  bt_link_color_default() {
 	return '#c3251d';
 }

 function  bt_link_hover_color_default() {
 	return '#c3251d';
 }

 function  bt_menu_color_default() {
	 return '#333333';
 }

 function  bt_menu_hover_color_default() {
 	return '#c3251d';
 }

 function  bt_button_color_default() {
	return '#333333';
 }

 function  bt_button_hover_color_default() {
	 return '#c3251d';
 }

 function  bt_footer_link_color_default() {
 	return '#999999';
 }

 function  bt_footer_link_hover_color_default() {
 	return '#ffffff';
 }

 function  bt_footerwidgets_background_color_default() {
   return '#333';
 }

add_action( 'customize_register', 'bt_register_theme_customizer', 20 );
/**
 * Register for the Customizer
 */
function bt_register_theme_customizer( $wp_customize ) {
	// Change label for logo text color
	 $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'beavertron');

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

	// Add Link Color
	// Add setting.
	$wp_customize->add_setting( 'bt_link_color', array(
			'default'           => bt_link_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_link_color', array(
        		'label'      => __( 'Link Color', 'beavertron' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'bt_link_color' //pick the setting it applies to
        		)
        ) );

	// Add link hover - focus color
	// Add setting.
	$wp_customize->add_setting( 'bt_link_hover_color', array(
			'default'           => bt_link_hover_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Color_Control(
	 $wp_customize, 'bt_link_hover_color', array(
			'label'      => __( 'Link Hover Color', 'beavertron' ), //set the label to appear in the Customizer
			'section'    => 'colors', //select the section for it to appear under
			'settings'   => 'bt_link_hover_color' //pick the setting it applies to
			)
	) );

	// Add Link Color
	// Add setting.
	$wp_customize->add_setting( 'bt_menu_color', array(
			'default'           => bt_menu_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_menu_color', array(
        		'label'      => __( 'Menu Color', 'beavertron' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'bt_menu_color' //pick the setting it applies to
        		)
        ) );

	// Add link hover - focus  color
	// Add setting.
	$wp_customize->add_setting( 'bt_menu_hover_color', array(
		'default'           => bt_menu_hover_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'bt_menu_hover_color', array(
			'label'      => __( 'Menu Hover Color', 'beavertron' ), //set the label to appear in the Customizer
			'section'    => 'colors', //select the section for it to appear under
			'settings'   => 'bt_menu_hover_color' //pick the setting it applies to
			)
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
        		'section'    => 'colors', //select the section for it to appear under
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
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'bt_button_hover_color' //pick the setting it applies to
        		)
        ) );

	// Add Footer Link Color
	// Add setting.
	$wp_customize->add_setting( 'bt_footer_link_color', array(
			'default'           => bt_footer_link_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_footer_link_color', array(
        		'label'      => __( 'Footer Widgets Link Color', 'beavertron' ), //set the label to appear in the Customizer
        		'section'    => 'colors', //select the section for it to appear under
        		'settings'   => 'bt_footer_link_color' //pick the setting it applies to
        		)
        ) );

	// Add Footer link hover - focus color
	// Add setting.
	$wp_customize->add_setting( 'bt_footer_link_hover_color', array(
			'default'           => bt_footer_link_hover_color_default(),
			'sanitize_callback' => 'sanitize_hex_color',
	) );

	// Add control
	$wp_customize->add_control( new WP_Customize_Color_Control(
	 $wp_customize, 'bt_footer_link_hover_color', array(
			'label'      => __( 'Footer Widgets Link Hover Color', 'beavertron' ), //set the label to appear in the Customizer
			'section'    => 'colors', //select the section for it to appear under
			'settings'   => 'bt_footer_link_hover_color' //pick the setting it applies to
			)
	) );

        // Add Footer Widgets background color
        // Add setting.
        $wp_customize->add_setting( 'bt_footerwidgets_background_color', array(
                'default'           => bt_footerwidgets_background_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_footerwidgets_background_color', array(
                'label'      => __( 'Footer Widgets Background  Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'colors', //select the section for it to appear under
                'settings'   => 'bt_footerwidgets_background_color' //pick the setting it applies to
        )
        ) );

	// Remove default Genesis logo/title
	$wp_customize->remove_control('blog_title');


         // Add featured image section to the Customizer
         $wp_customize->add_section( 'bt_single_image_section', array(
                 'title'       => __( 'Post and Page Images', 'beavertron' ),
                 'description' => __( 'Choose if you would like to display the featured image above the content on single posts and pages.', 'beavertron' ),
                 'priority'    => 200, // puts the customizer section lower down
         ) );
         // Add featured image setting to the Customizer
         $wp_customize->add_setting( 'bt_single_image_setting', array(
                 'default'    => false, // set the option as enabled by default
                 'capability' => 'edit_theme_options',
         ) );
         $wp_customize->add_control( 'bt_single_image_setting', array(
                 'section'  => 'bt_single_image_section',
                 'settings' => 'bt_single_image_setting',
                 'label'    => __( 'Show featured image on posts and pages?', 'beavertron' ),
                 'type'     => 'checkbox'
         ));

}

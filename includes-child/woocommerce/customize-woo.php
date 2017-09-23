<?php
/**
 * Adding all Customizer Stuff Here.
 *
 * @package beavertron
 */
 /**
  * Set Up Default Colors - so if not changed in Customizer no CSS mark up is output
  */

 function  bt_woo_button_color_default() {
 return '#ebe9eb';
 }
 //
 function  bt_woo_button_hover_color_default() {
  return '#dad8da';
 }

 function  bt_woo_button_alt_color_default() {
 return '#a46497';
 }

 function  bt_woo_button_alt_hover_color_default() {
  return '#935386';
 }

 function  bt_woo_button_dis_color_default() {
 return '#eee';
 }

function  bt_woo_button_dis_hover_color_default() {
  return '#ddd';
 }

 function bt_woo_price_color_default() {
  return '#77a464';
 }

 function bt_woo_sale_price_color_default() {
  return '#77a464';
 }

 function bt_woo_error_color_default() {
  return '#b81c23';
 }

 function bt_woo_info_color_default() {
  return '#1e85be';
 }

 function bt_woo_message_color_default() {
  return '#8fae1b';
 }



add_action( 'customize_register', 'bt_register_theme_customizer_woo', 20 );
/**
 * Register for the Customizer
 */
function bt_register_theme_customizer_woo( $wp_customize ) {


	// Add in WooCommerce in default panel
	// Add section.
	$wp_customize->add_section( 'woocommerce' , array(
		'title'      => __( 'WooCommerce','beavertron' ),
		//'panel'      => 'woocommerce',
		'priority'   => 520,
	) );

	// Add buttons background color
	// Add setting.
	$wp_customize->add_setting( 'bt_woo_button_color', array(
		'default' => bt_woo_button_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_color', array(
		'label'      => __( 'Button Color', 'beavertron' ), //set the label to appear in the Customizer
		'section'    => 'fl-content-woo', //select the section for it to appear under
		'settings'   => 'bt_woo_button_color' //pick the setting it applies to
		)
        ) );

	// Add buttons hover - focus background color
	// Add setting.
	$wp_customize->add_setting( 'bt_woo_button_hover_color', array(
		'default' => bt_woo_button_hover_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_hover_color', array(
		'label'      => __( 'Button Hover Color', 'beavertron' ), //set the label to appear in the Customizer
		'section'    => 'fl-content-woo', //select the section for it to appear under
		'settings'   => 'bt_woo_button_hover_color' //pick the setting it applies to
		)
        ) );

        // Add buttons background alt color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_button_alt_color', array(
                'default' => bt_woo_button_alt_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_alt_color', array(
                'label'      => __( 'Button Alt Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_button_alt_color' //pick the setting it applies to
                )
        ) );

        // Add buttons hover - focus background color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_button_alt_hover_color', array(
                'default' => bt_woo_button_alt_hover_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_alt_hover_color', array(
                'label'      => __( 'Button Alt Hover Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_button_alt_hover_color' //pick the setting it applies to
                )
        ) );

        // Add buttons background disabled color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_button_dis_color', array(
                'default' => bt_woo_button_dis_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_dis_color', array(
                'label'      => __( 'Button Disabled Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_button_dis_color' //pick the setting it applies to
                )
        ) );

        // Add buttons hover - focus background color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_button_dis_hover_color', array(
                'default' => bt_woo_button_dis_hover_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_dis_hover_color', array(
                'label'      => __( 'Button Disabled Hover Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_button_dis_hover_color' //pick the setting it applies to
                )
        ) );

        // Add price color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_price_color', array(
                'default' => bt_woo_price_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_price_color', array(
                'label'      => __( 'Price Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_price_color' //pick the setting it applies to
                )
        ) );

        // Add sale price color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_sale_price_color', array(
                'default' => bt_woo_sale_price_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_sale_price_color', array(
                'label'      => __( 'SALE Price Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_sale_price_color' //pick the setting it applies to
                )
        ) );

        // Add INFO color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_info_color', array(
                'default' => bt_woo_info_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_info_color', array(
                'label'      => __( 'Info Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_info_color' //pick the setting it applies to
                )
        ) );

        // Add Error color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_error_color', array(
                'default' => bt_woo_error_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_error_color', array(
                'label'      => __( 'Error Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_error_color' //pick the setting it applies to
                )
        ) );

        // Add Message color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_message_color', array(
                'default' => bt_woo_message_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_message_color', array(
                'label'      => __( 'Message Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'fl-content-woo', //select the section for it to appear under
                'settings'   => 'bt_woo_message_color' //pick the setting it applies to
                )
        ) );

}

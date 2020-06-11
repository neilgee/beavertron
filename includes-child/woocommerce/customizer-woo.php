<?php
/**
 * Adding all Customizer Stuff Here.
 * @since 1.0.0
 * @package beavertron
 */

 /**
  * Set Up Default Colors - so if not changed in Customizer no CSS mark up is output
  * @since 1.0.0
  */
 
 function  bt_woo_button_text_color_default() {
 return '#ffffff';
 }

 function  bt_woo_button_text_hover_color_default() {
 return '#999999';
 }

 function  bt_woo_button_color_default() {
 return '#ebe9eb';
 }
 
 function  bt_woo_button_hover_color_default() {
  return '#dad8da';
 }

 function  bt_woo_button_border_color_default() {
        return '#ebe9eb';
}

function  bt_woo_button_border_hover_color_default() {
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
 * @since 1.0.0
 */
function bt_register_theme_customizer_woo( $wp_customize ) {

        /**
         * Uncommenting as WooCommerce has own panel & section
         * @since 2.0.0
         */
	// $wp_customize->add_section( 'woocommerce' , array(
	// 	'title'      => __( 'WooCommerce','beavertron' ),
	// 	//'panel'      => 'woocommerce',
	// 	'priority'   => 520,
	// ) );

        // Add buttons foreground color
        // Add setting.
	$wp_customize->add_setting( 'bt_woo_button_text_color', array(
		'default' => bt_woo_button_text_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_text_color', array(
		'label'      => __( 'Button Color', 'beavertron' ), //set the label to appear in the Customizer
		'section'    => 'woocommerce_colors', //select the section for it to appear under
		'settings'   => 'bt_woo_button_text_color' //pick the setting it applies to
		)
        ) );

	// Add buttons hover - focus foreground color
	// Add setting.
	$wp_customize->add_setting( 'bt_woo_button_text_hover_color', array(
		'default' => bt_woo_button_text_hover_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_text_hover_color', array(
		'label'      => __( 'Button Hover Color', 'beavertron' ), //set the label to appear in the Customizer
		'section'    => 'woocommerce_colors', //select the section for it to appear under
		'settings'   => 'bt_woo_button_text_hover_color' //pick the setting it applies to
		)
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
		'section'    => 'woocommerce_colors', //select the section for it to appear under
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
		'section'    => 'woocommerce_colors', //select the section for it to appear under
		'settings'   => 'bt_woo_button_hover_color' //pick the setting it applies to
		)
        ) );

        /* *
	 * Adding in a Border Color and Border Hover Control for Woo Buttons to the Woo panel
	 * Also can be done with fl_theme_add_panel_data filter - see 2 examples in customizer-filtered.php
	 * @since 1.7.0
	 */
        $wp_customize->add_setting( 'bt_woo_border_color', array(
                'default' => bt_woo_button_border_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );
        
	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'bt_woo_border_color', array(
                'label'      => __( 'Border Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'woocommerce_colors', //select the section for it to appear under  
                'settings'   => 'bt_woo_border_color', //pick the setting it applies to
		)
        ) );
        
	$wp_customize->add_setting( 'bt_woo_border_color_hover', array(
                'default' => bt_woo_button_border_hover_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );
        
	$wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'bt_woo_border_color_hover', array(
                'label'      => __( 'Border Hover Color', 'beavertron' ), //set the label to appear in the Customizer
                'section'    => 'woocommerce_colors', //select the section for it to appear under  
                'settings'   => 'bt_woo_border_color_hover', //pick the setting it applies to
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
                'section'    => 'woocommerce_colors', //select the section for it to appear under
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
                'section'    => 'woocommerce_colors', //select the section for it to appear under
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
                'section'    => 'woocommerce_colors', //select the section for it to appear under
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
                'section'    => 'woocommerce_colors', //select the section for it to appear under
                'settings'   => 'bt_woo_button_dis_hover_color' //pick the setting it applies to
                )
        ) );

        // Add price color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_price_color', array(
                'default' => bt_woo_price_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        /* Adding in a Padding Controls for Woo Buttons to the 'woocommerce_colors' panel
        * Also can be done with fl_theme_add_panel_data filter - see 2 examples in customizer-filtered.php
        * @since 1.7.0
        */
        $wp_customize->add_setting(
                'bt_button_woo_padding_left_right', //give it an ID
                array(
                        'default' => '7', // Give it a default
                        //'transport' => 'postMessage',
                )
        );
        
        $wp_customize->add_control(
                new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_padding_leftright', //give it an ID
                        array(
                                'label'    => __( 'Button Padding Left/Right', 'beavertron' ),   //set the label to appear in the Customizer
                                'section'  => 'woocommerce_colors',                                      //select the section for it to appear under  
                                'settings' => 'bt_button_woo_padding_left_right',                    //pick the setting it applies to
                                'priority' => 15,
                                'type'     => 'slider',
                                'choices'  => array(
                                        'min'  => 0,
                                        'max'  => 100,
                                        'step' => 1,
                                ),
                        )
                )
        );
        $wp_customize->add_setting(
                'bt_button_woo_padding_top_bottom', //give it an ID
                array(
                        'default' => '28', // Give it a default
                        //'transport' => 'postMessage',
                )
        );
        $wp_customize->add_control(
                new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_padding_topbottom', //give it an ID
                        array(
                                'label'    => __( 'Button Padding Top/Bottom', 'beavertron' ),   //set the label to appear in the Customizer
                                'section'  => 'woocommerce_colors',                              //select the section for it to appear under  
                                'settings' => 'bt_button_woo_padding_top_bottom',                //pick the setting it applies to
                                'priority' => 15,
                                'type'     => 'slider',
                                'choices'  => array(
                                        'min'  => 0,
                                        'max'  => 100,
                                        'step' => 1,
                                ),
                        )
                )
        );

         // Add control
         $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize, 'bt_woo_price_color', array(
                        'label'    => __( 'Price Color', 'beavertron' ),   //set the label to appear in the Customizer
                        'section'  => 'woocommerce_colors',                //select the section for it to appear under
                        'settings' => 'bt_woo_price_color',                //pick the setting it applies to
                        'priority' => 20
                        )
                ) );
        
        // Add sale price color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_sale_price_color', array(
                'default'           => bt_woo_sale_price_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_sale_price_color', array(
                'label'    => __( 'SALE Price Color', 'beavertron' ),   //set the label to appear in the Customizer
                'section'  => 'woocommerce_colors',                     //select the section for it to appear under
                'settings' => 'bt_woo_sale_price_color',                //pick the setting it applies to
                'priority' => 20
                )
        ) );



        // Add INFO color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_info_color', array(
                'default'           => bt_woo_info_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_info_color', array(
                'label'    => __( 'Info Color', 'beavertron' ),   //set the label to appear in the Customizer
                'section'  => 'woocommerce_colors',               //select the section for it to appear under
                'settings' => 'bt_woo_info_color',                //pick the setting it applies to
                'priority' => 20
                )
        ) );

        // Add Error color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_error_color', array(
                'default'           => bt_woo_error_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_error_color', array(
                'label'    => __( 'Error Color', 'beavertron' ),   //set the label to appear in the Customizer
                'section'  => 'woocommerce_colors',                //select the section for it to appear under
                'settings' => 'bt_woo_error_color',                //pick the setting it applies to
                'priority' => 20
                )
        ) );

        // Add Message color
        // Add setting.
        $wp_customize->add_setting( 'bt_woo_message_color', array(
                'default'           => bt_woo_message_color_default(),
                'sanitize_callback' => 'sanitize_hex_color',
        ) );

        // Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_message_color', array(
                'label'    => __( 'Message Color', 'beavertron' ),   //set the label to appear in the Customizer
                'section'  => 'woocommerce_colors',                  //select the section for it to appear under
                'settings' => 'bt_woo_message_color',                //pick the setting it applies to
                'priority' => 20
                )
        ) );



}

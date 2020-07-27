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
        
        // Change WooCommerce Panel Title
        $wp_customize->get_section('woocommerce_colors')->title = __( 'Buttons & Colors' );

        // Add buttons foreground color
        // Add setting.
	$wp_customize->add_setting( 'bt_woo_button_text_color', array(
		'default' => bt_woo_button_text_color_default(),
		'sanitize_callback' => 'sanitize_hex_color',
        ) );

	// Add control
        $wp_customize->add_control( new WP_Customize_Color_Control(
        $wp_customize, 'bt_woo_button_text_color', array(
		'label'      => __( 'Button Text Color', 'beavertron' ), //set the label to appear in the Customizer
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
		'label'      => __( 'Button Text Hover Color', 'beavertron' ), //set the label to appear in the Customizer
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
                        'default' => '30', // Give it a default
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
                        'default' => '5', // Give it a default
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
        // Add Woo button font family
        $wp_customize->add_setting(
                'bt_button_woo_font_family', //give it an ID
                    array(
                        'default' => 'Helvetica', // Give it a default
                        //'transport' => 'postMessage',
                    )
        );
            
        $wp_customize->add_control(
        new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_font_family', //give it an ID
                        array(
                                'class'   => 'FLCustomizerControl',
                                'label'   => __( 'Font Family', 'beavertron' ),
                                'type'    => 'font',
                                'connect' => 'bt_button_woo_font_weight',  //set the label to appear in the Customizer
                                'section'  => 'woocommerce_colors',  //select the section for it to appear under  
                                'settings' => 'bt_button_woo_font_family',  //pick the setting it applies to
                                'priority' => 15,
                        ),
        ) );

        // Add Woo button font weight
        $wp_customize->add_setting(
                'bt_button_woo_font_weight', //give it an ID
                    array(
                        'default' => '400', // Give it a default
                        //'transport' => 'postMessage',
                    )
        );
            
        $wp_customize->add_control(
        new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_font_weight', //give it an ID
                        array(
                                'class'   => 'FLCustomizerControl',
                                'label'   => __( 'Font Weight', 'beavertron' ),
                                'type'    => 'font-weight',
                                'connect' => 'bt_button_woo_font_family',  //set the label to appear in the Customizer
                                'section'  => 'woocommerce_colors',       //select the section for it to appear under  
                                'settings' => 'bt_button_woo_font_weight',   //pick the setting it applies to
                                'priority' => 15,
                        ),
        ) );

         // Add control
         $wp_customize->add_control( new WP_Customize_Color_Control(
                $wp_customize, 'bt_woo_price_color', array(
                        'label'    => __( 'Price Color', 'beavertron' ),   //set the label to appear in the Customizer
                        'section'  => 'woocommerce_colors',                //select the section for it to appear under
                        'settings' => 'bt_woo_price_color',                //pick the setting it applies to
                        'priority' => 20
                        )
        ) );


        // Add font size
        $wp_customize->add_setting(
                'bt_button_woo_font_size', //give it an ID
                array(
                        'default' => '16', // Give it a default
                        'transport' => 'postMessage',
                )
        );
        
        $wp_customize->add_control(
                new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_font_size', //give it an ID
                        array(
                                'class'   => 'FLCustomizerControl',
                                'label'   => __( 'Font Size', 'Font size for buttons.', 'beavertron' ),
                                'type'       => 'slider',
                                'choices'    => get_font_size_limits(),
                                'responsive' => true,
                                'section'  => 'woocommerce_colors',       //select the section for it to appear under  
                                'settings' => 'bt_button_woo_font_size',   //pick the setting it applies to
                                'priority' => 15,
                        ),
        ) );

        // Add line-height
        $wp_customize->add_setting(
                'bt_button_woo_line_height', //give it an ID
                array(
                        'default'   => '1.2',
                        'transport' => 'postMessage',
                )
        );
        
        $wp_customize->add_control(
                new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_font_weight', //give it an ID
                        array(
                                'class'      => 'FLCustomizerControl',
                                'label'      => __( 'Line Height', 'beavertron' ),
                                'type'       => 'slider',
                                'choices'    => array(
                                        'min'  => 1,
                                        'max'  => 2.5,
                                        'step' => 0.05,
                                ),
                                'responsive' => true,
                                'section'  => 'woocommerce_colors',       //select the section for it to appear under  
                                'settings' => 'bt_button_woo_line_height',   //pick the setting it applies to
                                'priority' => 15,
                        ),
        ));


        // Add text transform
        $wp_customize->add_setting(
                'bt_button_woo_text_transform', //give it an ID
                array(
                        'default'   => 'none',
                        'transport' => 'postMessage',
                )
        );
        
        $wp_customize->add_control(
                new WP_Customize_Control(
                $wp_customize,
                'bt_button_woo_text_transform', //give it an ID
                        array(
                        'class'   => 'WP_Customize_Control',
                        'label'   => _x( 'Text Transform', 'Text transform for buttons.', 'beavertron' ),
                        'type'    => 'select',
                        'choices' => array(
                                'none'       => __( 'Regular', 'beavertron' ),
                                'capitalize' => __( 'Capitalize', 'beavertron' ),
                                'uppercase'  => __( 'Uppercase', 'beavertron' ),
                                'lowercase'  => __( 'Lowercase', 'beavertron' ),
                        ),
                        'section'  => 'woocommerce_colors',       //select the section for it to appear under  
                        'settings' => 'bt_button_woo_text_transform',   //pick the setting it applies to
                        'priority' => 15,
                        ),
        ));

        // Add border style
        $wp_customize->add_setting(
                'bt_button_woo_border_style', //give it an ID
                array(
                        'default'   => 'none',
                        'transport' => 'postMessage',
                )
        );
        
        $wp_customize->add_control(
                new WP_Customize_Control(
                $wp_customize,
                'bt_button_woo_border_style', //give it an ID
                        array(
                        'class'   => 'WP_Customize_Control',
                        'label'   => _x( 'Border Style', 'Border style for buttons.', 'beavertron' ),
                        'type'    => 'select',
                        'choices' => array(
                                'none'    => __( 'None', 'beavertron' ),
                                'solid'   => __( 'Solid', 'beavertron' ),
                                'dotted'  => __( 'Dotted', 'beavertron' ),
                                'dashed'  => __( 'Dashed', 'beavertron' ),
                                'double'  => __( 'Double', 'beavertron' ),
                                'groove'  => __( 'Groove', 'beavertron' ),
                                'ridge'   => __( 'Ridge', 'beavertron' ),
                                'inset'   => __( 'Inset', 'beavertron' ),
                                'outset'  => __( 'Outset', 'beavertron' ),
                                'initial' => __( 'Initial', 'beavertron' ),
                                'inherit' => __( 'Inherit', 'beavertron' ),
                        ),
                        'section'  => 'woocommerce_colors',       //select the section for it to appear under  
                        'settings' => 'bt_button_woo_border_style',   //pick the setting it applies to
                        'priority' => 15,
                        ),
        ));

        // Add border width
        $wp_customize->add_setting(
                'bt_button_woo_border_width', //give it an ID
                array(
                        'default'   => '0',
                        'transport' => 'postMessage',
                )
        );
        
        $wp_customize->add_control(
                new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_border_width', //give it an ID
                        array(
                        'class'   => 'FLCustomizerControl',
                        'label'   => _x( 'Border Width', 'Border width for buttons.', 'beavertron' ),
                        'type'    => 'slider',
                        'choices' => array(
                                'min'  => 0,
                                'max'  => 10,
                                'step' => 1,
                        ),
                        'section'  => 'woocommerce_colors',       //select the section for it to appear under  
                        'settings' => 'bt_button_woo_border_width',   //pick the setting it applies to
                        'priority' => 15,
                        ),
        ));
        
        
        
        // Add border radius
        $wp_customize->add_setting(
                'bt_button_woo_border_radius', //give it an ID
                array(
                        'default'   => '0',
                        'transport' => 'postMessage',
                )
        );
        
        $wp_customize->add_control(
                new FLCustomizerControl(
                $wp_customize,
                'bt_button_woo_border_radius', //give it an ID
                        array(
                        'class'   => 'FLCustomizerControl',
                        'label'   => _x( 'Border Radius', 'Font size for buttons.', 'beavertron' ),
                        'type'    => 'slider',
                        'choices' => array(
                                'min'  => 0,
                                'max'  => 25,
                                'step' => 1,
                        ),
                        'section'  => 'woocommerce_colors',       //select the section for it to appear under  
                        'settings' => 'bt_button_woo_border_radius',   //pick the setting it applies to
                        'priority' => 15,
                        ),
        ));
        
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

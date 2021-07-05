<?php
/**
 * Adding all Customizer Stuff Here.
 * @since 1.0.0
 * @package Beavertron
 */


add_action( 'customize_register', 'bt_register_theme_customizer', 20 );
/**
 * Register for the Customizer
 * @since 1.0.0
 */
function bt_register_theme_customizer( $wp_customize ) {

	global $wp_customize;

	/* *
	 * Adding in a Padding Controls for Buttons to the 'fl-buttons' panel
	 * Also can be done with fl_theme_add_panel_data filter - see 2 examples in customizer-filtered.php
	 * @since 1.7.0
	 */
	$wp_customize->add_setting(
		'bt_button_padding_left_right', //give it an ID
			array(
				'default' => '30', // Give it a default
				//'transport' => 'postMessage',
			)
	);

	$wp_customize->add_control(
	   new FLCustomizerControl(
		   $wp_customize,
		   'bt_button_padding_leftright', //give it an ID
			array(
				'label'    => __( 'Button Padding Left/Right', 'beavertron' ),   //set the label to appear in the Customizer
				'section'  => 'fl-buttons',                                      //select the section for it to appear under  
				'settings' => 'bt_button_padding_left_right',                    //pick the setting it applies to
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
		'bt_button_padding_top_bottom', //give it an ID
			array(
				'default' => '5', // Give it a default
				//'transport' => 'postMessage',
			)
	);

	$wp_customize->add_control(
	   new FLCustomizerControl(
		   $wp_customize,
		   'bt_button_padding_topbottom', //give it an ID
			array(
				'label'    => __( 'Button Padding Top/Bottom', 'beavertron' ),   //set the label to appear in the Customizer
				'section'  => 'fl-buttons',                                      //select the section for it to appear under  
				'settings' => 'bt_button_padding_top_bottom',                    //pick the setting it applies to
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

	/**
	 * Add Enable/Disable Additional Notes
	 * @since 1.0.0
	 */
	$wp_customize->add_setting(
		'bt_woo_additional', //give it an ID
			array(
			'default'   => 'enabled',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bt_woo_additional_notes', //give it an ID
			 array (
				'label'       => __( 'WooCommerce Additional Notes', 'beavertron' ),
				'section'     => 'fl-content-woo',
				'settings'    => 'bt_woo_additional',                                                                //pick the setting it applies to
				'description' => __( 'Enable or disable Woo Additional/Order Notes on Checkout', 'fl-automator' ),
				'type'        => 'select',
				'choices'     => array(
					'enabled'           => __( 'Enabled', 'beavertron' ),
					'disabled'          => __( 'Disabled', 'beavertron' ),
				),
		 	)
	   	)
	);


	/**
	 * Add Enable/Disable Woo Sort
	 * @since 1.0.0
	 */
	$wp_customize->add_setting(
		'bt_woo_sort', //give it an ID
			array(
			'default'   => 'enabled',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bt_woo_sort', //give it an ID
			 array (
				'label'       => __( 'WooCommerce Default Sort', 'beavertron' ),
				'section'     => 'fl-content-woo',
				'settings'    => 'bt_woo_sort',                                                                //pick the setting it applies to
				'description' => __( 'Enable or disable Woo Default Sort', 'beavertron' ),
				'type'        => 'select',
				'choices'     => array(
					'enabled'           => __( 'Enabled', 'beavertron' ),
					'disabled'          => __( 'Disabled', 'beavertron' ),
				),
		 	)
	   	)
	);

	/**
	 * Enable/Disable Woo Display Results
	 * @since 1.0.0
	 */
	$wp_customize->add_setting(
		'bt_woo_results', //give it an ID
			array(
			'default'   => 'enabled',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bt_woo_results', //give it an ID
			 array (
				'label'       => __( 'WooCommerce Display Results', 'beavertron' ),
				'section'     => 'fl-content-woo',
				'settings'    => 'bt_woo_results',                                                                //pick the setting it applies to
				'description' => __( 'Enable or disable Woo Display Results Notice', 'beavertron' ),
				'type'        => 'select',
				'choices'     => array(
					'enabled'           => __( 'Enabled', 'beavertron' ),
					'disabled'          => __( 'Disabled', 'beavertron' ),
				),
		 	)
	   	)
	);

	/**
	 * Enable/Disable Woo SKU
	 * Now enabled due to Woo PDF Voucher issue I found
	 * @link https://github.com/woocommerce/woocommerce/issues/21906
	 * Have hidden SKU with CSS in includes-child/woocommerce/woo.css
	 * @since 1.7.0
	 */
	$wp_customize->add_setting(
		'bt_woo_sku', //give it an ID
			array(
			'default'   => 'enabled',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bt_woo_sku', //give it an ID
			 array (
				'label'       => __( 'WooCommerce Display SKU', 'beavertron' ),
				'section'     => 'fl-content-woo',
				'settings'    => 'bt_woo_sku',                                                                //pick the setting it applies to
				'description' => __( 'Enable or disable Woo SKU', 'beavertron' ),
				'type'        => 'select',
				'choices'     => array(
					'enabled'           => __( 'Enabled', 'beavertron' ),
					'disabled'          => __( 'Disabled', 'beavertron' ),
				),
		 	)
	   	)
	);

	/**
	 * Remove related products on a WooCommerce product page
	 * @since 1.7.0
	 */
	$wp_customize->add_setting(
		'bt_woo_related', //give it an ID
			array(
			'default'   => 'disabled',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bt_woo_related', //give it an ID
			 array (
				'label'       => __( 'WooCommerce Remove Related', 'beavertron' ),
				'section'     => 'fl-content-woo',
				'settings'    => 'bt_woo_related',   //pick the setting it applies to
				'description' => __( 'Remove Related Products on Product Page', 'beavertron' ),
				'type'        => 'select',
				'choices'     => array(
					'enabled'           => __( 'Enabled', 'beavertron' ),
					'disabled'          => __( 'Disabled', 'beavertron' ),
				),
		 	)
	   	)
	);


	/**
	 * Remove Category Meta on WooCommerce product page
	 * @since 1.7.0
	 */
	$wp_customize->add_setting(
		'bt_woo_meta', //give it an ID
			array(
			'default'   => 'disabled',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bt_woo_meta', //give it an ID
			 array (
				'label'       => __( 'WooCommerce Remove Meta', 'beavertron' ),
				'section'     => 'fl-content-woo',
				'settings'    => 'bt_woo_meta',   //pick the setting it applies to
				'description' => __( 'Remove Post Category Meta on Product Page', 'beavertron' ),
				'type'        => 'select',
				'choices'     => array(
					'enabled'           => __( 'Enabled', 'beavertron' ),
					'disabled'          => __( 'Disabled', 'beavertron' ),
				),
		 	)
	   	)
	);

	/**
	 * Remove the WooCommerce breadcrumbs
	 * @since 1.7.0
	 */
	$wp_customize->add_setting(
		'bt_woo_breadcrumbs', //give it an ID
			array(
			'default'   => 'disabled',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'bt_woo_breadcrumbs', //give it an ID
			 array (
				'label'       => __( 'WooCommerce Remove Breadcrumbs', 'beavertron' ),
				'section'     => 'fl-content-woo',
				'settings'    => 'bt_woo_breadcrumbs',   //pick the setting it applies to
				'description' => __( 'Remove the WooCommerce breadcrumbs', 'beavertron' ),
				'type'        => 'select',
				'choices'     => array(
					'enabled'           => __( 'Enabled', 'beavertron' ),
					'disabled'          => __( 'Disabled', 'beavertron' ),
				),
		 	)
	   	)
	);

	/**
	 * Change WooCommerce Order Received Text
	 * @since 1.7.0
	 */
	// Add section.
	$wp_customize->add_section( 'bt_woo_order_section' , array(
		'title'    => __('Order Received Text','beavertron'),
		'panel'    => 'woocommerce',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'bt_woo_order_received', array(
		 'default'           => __( 'Thank you. Your order has been received.', 'beavertron' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'bt_woo_order_received',
		    array(
		        'label'    => __( 'Order Received Text', 'beavertron' ),
		        'section'  => 'bt_woo_order_section',
		        'settings' => 'bt_woo_order_received',
		        'type'     => 'textarea'
		    )
	    )
	);


	/**
	 * Change WooCommerce Variation Dropdown Text
	 * @since 1.7.0
	 */
	// Add section.
	$wp_customize->add_section( 'bt_woo_vary_dropdown_section' , array(
		'title'    => __('Variation Dropdown Text','beavertron'),
		'panel'    => 'woocommerce',
		'priority' => 10
	) );
	// Add setting
	$wp_customize->add_setting( 'bt_woo_dropdown_variation', array(
		 'default'           => __( 'Choose an option', 'beavertron' ),
		 'sanitize_callback' => 'sanitize_text'
	) );
	// Add control
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'bt_woo_dropdown_variation',
		    array(
		        'label'    => __( 'Variation Dropdown Text', 'beavertron' ),
		        'section'  => 'bt_woo_vary_dropdown_section',
		        'settings' => 'bt_woo_dropdown_variation',
		        'type'     => 'textarea'
		    )
	    )
	);
	
	// Sanitize text
	function sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}
		
	/**
	 * Change number of WooCommerce Products Shop & Archive
	 * @since 1.7.0
	 */
	$wp_customize->add_setting(
		'bt_number_products', //give it an ID
			array(
				'default' => '12', // Give it a default
				//'transport' => 'postMessage',
			)
	);
	$wp_customize->add_control(
		new FLCustomizerControl(
			$wp_customize,
			'bt_number_products', //give it an ID
			array(
				'label'    => __( 'Number of WooCommerce Products Shop & Archive', 'beavertron' ),   //set the label to appear in the Customizer
				'section'  => 'fl-content-woo',                                      //select the section for it to appear under  
				'settings' => 'bt_number_products',                    //pick the setting it applies to
				'priority' => 5,
				'type'     => 'slider',
				'choices'  => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			)
		)
	);

	/**
	 * WooTabs Removalists
	 * @since 1.7.0
	 */
	
	$wp_customize->add_setting( 'bt_woo_tabs_review',
	   array(
	      'default' => 0,
	   )
	);
	 
	$wp_customize->add_control( 'bt_woo_tabs_review',
	   array(
	      'label' => __( 'Remove Woo Tabs Review' ),
	      'section' => 'fl-content-woo',
	      'priority' => 10, // Optional. Order priority to load the control. Default: 10
	      'type' => 'checkbox',
	   )
	);

	$wp_customize->add_setting( 'bt_woo_tabs_description',
	   array(
	      'default' => 0,
	   )
	);
	 
	$wp_customize->add_control( 'bt_woo_tabs_description',
	   array(
	      'label' => __( 'Remove Woo Tabs Description' ),
	      'section' => 'fl-content-woo',
	      'priority' => 10, // Optional. Order priority to load the control. Default: 10
	      'type' => 'checkbox',
	   )
	);
	
	$wp_customize->add_setting( 'bt_woo_tabs_information',
	   array(
	      'default' => 0,
	   )
	);
	 
	$wp_customize->add_control( 'bt_woo_tabs_information',
	   array(
	      'label' => __( 'Remove Woo Tabs Information' ),
	      'section' => 'fl-content-woo',
	      'priority' => 10, // Optional. Order priority to load the control. Default: 10
	      'type' => 'checkbox',
	   )
	);

	/**
	 * Change Customizer Heading Section
	 * @since 1.0.0
	 */
	//$wp_customize->get_section( 'background_image' )->title = __( 'Background Styles', 'beavertron' );

	/**
	 *  Add WooCommerce Colors Section
	 * @since 2.0.0
	 */
	$wp_customize->add_section( 'woocommerce_colors' , array(
		'title'      => __( 'WooCommerce Colors','beavertron' ),
		'panel'      => 'woocommerce',
		'priority'   => 20,
	) );

	/**
	 *  Move BB WooCommerce layout Section to native WooCommerce panel
	 * @since 2.0.0
	 */
	if ( class_exists( 'WooCommerce' ) ) {
	$wp_customize->get_section('fl-content-woo')->panel ='woocommerce';
	}

	


	/**
	 * Create login panel
	 * Add setting
	 * Add control
	 * Also can be done with FLCustomizer::add_panel - see example commented further down
	 * @since 1.0.0
	 */
	// Add Panel
	// $wp_customize->add_panel( 'login_page', array(
	// 	'priority'       => 70,
	// 	'theme_supports' => '',
	// 	'title'          => __( 'Login', 'beavertron' ),
	// 	'description'    => __( 'Set login page styles', 'beavertron' ),
	// ) );

	// Add Login Styles
	// Add in Settings section with 'fl-settings'.
	$wp_customize->add_section( 'bt_login_styles' , array(
		'title'      => __( 'Login Styles','beavertron' ),
		'panel'      => 'fl-settings',
		'priority'   => 120,
		) 
	);

	$wp_customize->add_setting( 'bt_login_accent_color', array(
			'default' => '#007cba', // Give it a default
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bt_login_custom_accent_color', //give it an ID
		   array(
			   'label'      => __( 'Login accent color', 'beavertron' ), //set the label to appear in the Customizer
			   'section'    => 'bt_login_styles', //select the section for it to appear under  
			   'settings'   => 'bt_login_accent_color' //pick the setting it applies to
		   )
	   )
	);

	$wp_customize->add_setting( 'bt_login_accent_hover_color', array(
			'default' => '#0071a1', // Give it a default
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bt_login_custom_accent_hover_color', //give it an ID
			array(
					'label'      => __( 'Login accent hover color', 'beavertron' ), //set the label to appear in the Customizer
					'section'    => 'bt_login_styles', //select the section for it to appear under  
					'settings'   => 'bt_login_accent_hover_color' //pick the setting it applies to
				)
			)
	);

	$wp_customize->add_setting( 'bt_login_link_color', array(
		'default' => '#555d66', // Give it a default
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bt_login_custom_link_color', //give it an ID
			array(
				'label'      => __( 'Login link color', 'beavertron' ), //set the label to appear in the Customizer
				'section'    => 'bt_login_styles', //select the section for it to appear under  
				'settings'   => 'bt_login_link_color' //pick the setting it applies to
			)
		)
	);

	$wp_customize->add_setting( 'bt_login_link_hover_color', array(
			'default' => '#00a0d2', // Give it a default
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bt_login_custom_link_hover_color', //give it an ID
			array(
				'label'      => __( 'Login link hover color', 'beavertron' ), //set the label to appear in the Customizer
				'section'    => 'bt_login_styles', //select the section for it to appear under  
				'settings'   => 'bt_login_link_hover_color' //pick the setting it applies to
			)
		)
	);

	$wp_customize->add_setting( 'bt_login_background_color', array(
		'default' => '#f1f1f1', // Give it a default
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bt_login_custom_background_color', //give it an ID
			array(
				'label'      => __( 'Login background color', 'beavertron' ), //set the label to appear in the Customizer
				'section'    => 'bt_login_styles', //select the section for it to appear under  
				'settings'   => 'bt_login_background_color' //pick the setting it applies to
			)
		)
	);	

	$wp_customize->add_setting( 'bt_login_form_color', array(
		'default' => '#ffffff', // Give it a default
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bt_login_form_color', //give it an ID
			array(
				'label'      => __( 'Login form background color', 'beavertron' ), //set the label to appear in the Customizer
				'section'    => 'bt_login_styles', //select the section for it to appear under  
				'settings'   => 'bt_login_form_color' //pick the setting it applies to
			)
		)
	);

	$wp_customize->add_setting( 'bt_login_form_text', array(
		'default' => '#444444', // Give it a default
		)
	);

	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize,
		'bt_login_form_text', //give it an ID
			array(
				'label'      => __( 'Login form text color', 'beavertron' ), //set the label to appear in the Customizer
				'section'    => 'bt_login_styles', //select the section for it to appear under  
				'settings'   => 'bt_login_form_text' //pick the setting it applies to
			)
		)
	);

	// Getting the default WP custom logo - 4 keys in the array - url[0], width[1], height[2] and a boolean[3]
	$custom_logo_id  = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	if(!empty($custom_logo_id )) {
		$custom_logo_url = $custom_logo_id [0];
		$custom_logo_width = $custom_logo_id [1];
		$custom_logo_height = $custom_logo_id [2];
	}	
	else {
		$custom_logo_url = '';
	}

	// Add setting.
	$wp_customize->add_setting( 'bt_login_logo', array(
		'default'     => $custom_logo_url,
	) );

	// Add control.
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'bt_login_logo', array(
			'label'      => __( 'Add alternative login logo here,', 'beavertron' ),
			'section'    => 'bt_login_styles',
			'settings'   => 'bt_login_logo',
			)
	) );

	$wp_customize->add_setting( 'bt_admin_font',
		array(
		'default' => 0,
		)
	);
	
	$wp_customize->add_control( 'bt_admin_font',
		array(
		'label' => __( 'Make WP Dashboard font same as frontend' ),
		'section' => 'bt_login_styles',
		'priority' => 10, // Optional. Order priority to load the control. Default: 10
		'type' => 'checkbox',
		)
	);



	/**
	 * Beaver Builder Script Removalists
	 * @since 1.7.0
	 */

	// Add section.
	$wp_customize->add_section( 'bt_scripts_section' , array(
		'title'    => __('BB Scripts','beavertron'),
		'panel'    => 'fl-general',
		'priority' => 10
	) );
	
	$wp_customize->add_setting( 'bt_fitvids_script',
	   array(
	      'default' => 0,
	   )
	);
	 
	$wp_customize->add_control( 'bt_fitvids_script',
	   array(
	      'label' => __( 'Remove BB FitVids Script' ),
	      'section' => 'bt_scripts_section',
	      'priority' => 10, // Optional. Order priority to load the control. Default: 10
	      'type' => 'checkbox',
	   )
	);

	$wp_customize->add_setting( 'bt_waypoints_script',
		array(
		'default' => 0,
		)
	);
	
	$wp_customize->add_control( 'bt_waypoints_script',
		array(
		'label' => __( 'Remove BB Waypoints Script' ),
		'section' => 'bt_scripts_section',
		'priority' => 10, // Optional. Order priority to load the control. Default: 10
		'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting( 'bt_throttle_script',
		array(
		'default' => 0,
		)
	);

	$wp_customize->add_control( 'bt_throttle_script',
		array(
		'label' => __( 'Remove BB Throttle Script' ),
		'section' => 'bt_scripts_section',
		'priority' => 10, // Optional. Order priority to load the control. Default: 10
		'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting( 'bt_imagesloaded_script',
		array(
		'default' => 0,
		)
	);

	$wp_customize->add_control( 'bt_imagesloaded_script',
		array(
		'label' => __( 'Remove BB Imagesloaded Script' ),
		'section' => 'bt_scripts_section',
		'priority' => 10, // Optional. Order priority to load the control. Default: 10
		'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting( 'bt_magnificpopup_script',
		array(
		'default' => 0,
		)
	);

	$wp_customize->add_control( 'bt_magnificpopup_script',
		array(
		'label' => __( 'Remove BB Magnificpopup Script' ),
		'section' => 'bt_scripts_section',
		'priority' => 10, // Optional. Order priority to load the control. Default: 10
		'type' => 'checkbox',
		)
	);

	$wp_customize->add_setting( 'bt_magnificpopup_style',
		array(
		'default' => 0,
		)
	);

	$wp_customize->add_control( 'bt_magnificpopup_style',
		array(
		'label' => __( 'Remove BB Magnificpopup Style' ),
		'section' => 'bt_scripts_section',
		'priority' => 10, // Optional. Order priority to load the control. Default: 10
		'type' => 'checkbox',
		)
	);


	/**
	 * Remove Panels and Sections by uncommenting.
	 * Create Custom Section
	 * @since 1.0.0
	 */

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


/** 
 *  Adding a custom preset with some default values.
 *  @since 1.0.0
 */
FLCustomizer::add_preset( 'bt-preset', array(
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
		'fl-body-font-size'			     => '17',
		'fl-body-line-height'			 => '1.3',

		'fl-archive-readmore-text' 	  => 'See More',

		'fl-button-style'                  => 'custom',
		'fl-button-color'                  => '#ffffff',
		'fl-button-hover-color'            => '#000000',
		'fl-button-background-color'       => '#000000',
		'fl-button-background-hover-color' => '#ffffff',
		// 'fl-button-font-line'              => '',
		'fl-button-font-family'            => 'system-ui',
		'fl-button-font-weight'            => '400',
		// 'fl-button-font-size'              => '',
		'fl-button-line-height'            => '1.5',
		'fl-button-text-transform'         => 'uppercase',
		// 'fl-button-border-line'            => '',
		'fl-button-border-style'           => 'solid',
		'fl-button-border-width'           => '1',
		'fl-button-border-color'           => '#000000',
		'fl-button-border-radius'          => 3,

		// Thesea are other key pairs that you can use
		// 'fl-header-nav-search'      => 'hidden',
		// 'fl-header-content-layout'  => 'social-text',
		// 'fl-header-content-text'    => '¡Llámanos! 5555-555',
		// 'fl-logo-type'              => 'text',
		// 'fl-logo-text'              => 'Centro de Salud',
		// 'fl-blog-layout'            => 'sidebar-right',
		// 'fl-blog-sidebar-size'      => '3',
		// 'fl-blog-sidebar-display'   => 'desktop',
		// 'fl-blog-post-author'       => 'hidden',
		// 'fl-blog-post-date'         => 'visible',
		// 'fl-archive-show-full'      => '0',
		// 'fl-archive-show-thumbs'    => 'beside',
		// 'fl-posts-show-thumbs'      => '',
		// 'fl-posts-show-cats'        => 'visible',
		// 'fl-posts-show-tags'        => 'visible',
		// 'fl-posts-show-nav'         => 'hidden',
		// 'fl-lightbox'               => 'enabled',
		// 'fl-footer-widgets-display' => 'disabled',
		// 'fl-footer-widgets-bg-type' => 'content',
		// 'fl-footer-layout'          => '2-cols',
		// 'fl-footer-col1-layout'     => 'text',
		// 'fl-footer-col2-layout'     => 'social',
		// 'fl-social-facebook'        => 'http: //facebook.com',
		// 'fl-social-twitter'         => 'http: //twitter.com',
		// 'fl-social-google'          => 'http: //google.com',
		// 'fl-social-linkedin'        => 'http: //linkedin.com',

	)
));

/** 
 * Remove all the builtin presets.
 * @since 1.0.0
 */

FLCustomizer::remove_preset( 
	array('default-dark' , 'classic' , 'modern' , 'bold' , 
		'stripe' , 'deluxe' , 'premier' , 'dusk' , 'midnight'
	)
);

/** 
 *  Set Theme Preset
 *  @since 1.7.0
 */
set_theme_mod( 'fl-preset', 'bt-preset' );


add_filter( 'fl_default_theme_mods', 'bt_default_theme_preset');
/** 
 *  Set Active Preset Theme Mods
 *  @since 1.0.0
 */
function bt_default_theme_preset( $mods ) {
	$mods2 = array(
		'fl-layout-width'				=> 'full-width',
		'fl-content-width'				=> '1200', // Container width
		'fl-scroll-to-top'				=> 'enable', 

		'fl-body-bg-color'             	=> '#ffffff',
		
		'fl-accent'                 	=> '#555555',
		'fl-accent-hover'           	=> '#666666',

		'fl-heading-text-color'     	=> '#333333',
		'fl-topbar-bg-color'        	=> '#333333',
		'fl-topbar-text-color'			=> '#cccccc',
		'fl-topbar-link-color'			=> '#999999',
		'fl-topbar-hover-color'			=> '#ffffff',


		'fl-header-bg-color'        	=> '#000000',
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
		'fl-h3-font-size'			     => '26',
		'fl-h4-font-size'			     => '22',
		'fl-h5-font-size'			     => '20',
		'fl-h6-font-size'			     => '18',

		'fl-body-text-color'			 => '#333333',
		'fl-body-font-family'			 => 'system-ui',
		'fl-body-font-weight'			 => '400',
		'fl-body-font-size'			     => '18',
		'fl-body-line-height'			 => '1.6',
		//'fl-body-font-size_mobile'		=> '12',

		'fl-archive-readmore-text' 	     => 'Read More',

		'fl-blog-layout' 		         => 'sidebar-right',
		'fl-blog-sidebar-size' 		     => '3',
		'fl-blog-sidebar-display' 	     => 'desktop',
		'fl-blog-post-author' 		     => 'hidden',
		'fl-blog-post-date' 		     => 'visible',
		'fl-archive-show-full' 		     => '0',

		'fl-lightbox' 			         => 'enabled',
		
		'fl-button-style'                  => 'custom',
		'fl-button-color'                  => '#ffffff',
		'fl-button-hover-color'            => '#000000',
		'fl-button-background-color'       => '#000000',
		'fl-button-background-hover-color' => '#ffffff',
		// 'fl-button-font-line'              => '',
		'fl-button-font-family'            => 'system-ui',
		'fl-button-font-weight'            => '400',
		// 'fl-button-font-size'              => '',
		'fl-button-line-height'            => '1.5',
		'fl-button-text-transform'         => 'uppercase',
		// 'fl-button-border-line'            => '',
		'fl-button-border-style'           => 'solid',
		'fl-button-border-width'           => '1',
		'fl-button-border-color'           => '#000000',
		'fl-button-border-radius'          => 3,


		// These are other key pairs that you can use
		// 'fl-header-nav-search'     => 'hidden',
		// 'fl-header-content-layout' => 'social-text',
		// 'fl-header-content-text'   => '¡Llámanos! 5555-555',
		// 'fl-logo-type'             => 'text',
		// 'fl-logo-text'             => 'Centro de Salud',
	
		
		// 'fl-archive-show-thumbs'    => 'beside',
		// 'fl-posts-show-thumbs'      => '',
		// 'fl-posts-show-cats'        => 'visible',
		// 'fl-posts-show-tags'        => 'visible',
		// 'fl-posts-show-nav'         => 'hidden',
		// 'fl-footer-widgets-display' => 'disabled',
		// 'fl-footer-widgets-bg-type' => 'content',
		// 'fl-footer-layout'          => '2-cols',
		// 'fl-footer-col1-layout'     => 'text',
		// 'fl-footer-col2-layout'     => 'social',

		// 'fl-social-facebook' => 'http://facebook.com/beavertron'
		// 'fl-social-twitter'  => 'http://twitter.com',
		// 'fl-social-google'   => 'http://google.com',
		// 'fl-social-linkedin' => 'http://linkedin.com',
	);
	
	
	$mods3 = array_merge($mods, $mods2); 

	return $mods3;

}





//add_action( 'after_setup_theme', 'bt_add_customizer_panel', 35 );
/**
 * Create Custom Customizer Panel with FLCustomizer::add_panel
 * 7 Panel Examples with a range of controls ... informational
 * @since 1.7.0
 */
function bt_add_customizer_panel() {
    /* Body Background Section */
        FLCustomizer::add_panel('bt_bg_image', array(
                'title'   => _x( 'Beavertron Stuff', 'Customizer panel title.', 'beavertron' ),
                'sections'=> array (
                    'beaver-section1'=> array(
                        'title'=>_x('Beavertron Panel 1', 'Customizer section title.', 'beavertron' ),
                        'options'=>array(
                            /* Background Color */
                            'bt-body-bg-color' => array(
                                'setting'   => array(
                                    'default'   => '#f2f2f2',
                                ),
                                'control'   => array(
                                    'class'     => 'WP_Customize_Color_Control',
                                    'label'     => __( 'Background Color', 'beavertron' ),
                                ),
                            ),
                            
                            /* Background Image */
                            'bt-body-bg-image' => array(
                                'setting'   => array(
                                    'default'   => '',
                                    'transport' => 'postMessage',
                                ),
                                'control'   => array(
                                    'class'     => 'WP_Customize_Image_Control',
                                    'label'     => __( 'Background Image', 'beavertron' ),
                                ),
                            ),
            
                            /* Background Repeat */
                            'bt-body-bg-repeat' => array(
                                'setting'   => array(
                                    'default'   => 'no-repeat',
                                    'transport' => 'postMessage',
                                ),
                                'control'   => array(
                                    'class'     => 'WP_Customize_Control',
                                    'label'     => __( 'Background Repeat', 'beavertron' ),
                                    'type'      => 'select',
                                    'choices'   => array(
                                        'no-repeat'  => __( 'None', 'beavertron' ),
                                        'repeat'     => __( 'Tile', 'beavertron' ),
                                        'repeat-x'   => __( 'Horizontal', 'beavertron' ),
                                        'repeat-y'   => __( 'Vertical', 'beavertron' ),
                                    ),
                                ),
                            ),
            
                            /* Background Position */
                            'bt-body-bg-position' => array(
                                'setting'   => array(
                                    'default'   => 'center top',
                                    'transport' => 'postMessage',
                                ),
                                'control'   => array(
                                    'class'     => 'WP_Customize_Control',
                                    'label'     => __( 'Background Position', 'beavertron' ),
                                    'type'      => 'select',
                                    'choices'   => array(
                                        'left top'      => __( 'Left Top', 'beavertron' ),
                                        'left center'   => __( 'Left Center', 'beavertron' ),
                                        'left bottom'   => __( 'Left Bottom', 'beavertron' ),
                                        'right top'     => __( 'Right Top', 'beavertron' ),
                                        'right center'  => __( 'Right Center', 'beavertron' ),
                                        'right bottom'  => __( 'Right Bottom', 'beavertron' ),
                                        'center top'    => __( 'Center Top', 'beavertron' ),
                                        'center center' => __( 'Center', 'beavertron' ),
                                        'center bottom' => __( 'Center Bottom', 'beavertron' ),
                                    ),
                                ),
                            ),
            
                            /* Background Attachment */
                            'bt-body-bg-attachment' => array(
                                'setting'   => array(
                                    'default'   => 'scroll',
                                    'transport' => 'postMessage',
                                ),
                                'control'   => array(
                                    'class'     => 'WP_Customize_Control',
                                    'label'     => __( 'Background Attachment', 'beavertron' ),
                                    'type'      => 'select',
                                    'choices'   => array(
                                        'scroll'    => __( 'Scroll', 'beavertron' ),
                                        'fixed'     => __( 'Fixed', 'beavertron' ),
                                    ),
                                ),
                            ),
            
                            /* Background Size */
                            'bt-body-bg-size' => array(
                                'setting'   => array(
                                    'default'   => 'auto',
                                    'transport' => 'postMessage',
                                ),
                                'control'   => array(
                                    'class'     => 'WP_Customize_Control',
                                    'label'     => __( 'Background Scale', 'beavertron' ),
                                    'type'      => 'select',
                                    'choices'   => array(
                                        'auto'      => __( 'None', 'beavertron' ),
                                        'contain'   => __( 'Fit', 'beavertron' ),
                                        'cover'     => __( 'Fill', 'beavertron' ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'beaver-section2'=> array(
                        'title'=>_x('Beavertron Text Field', 'Customizer section title.', 'beavertron' ),
                        'options'=>array(
                            /* Text Field */
                            'bt-text-field' => array(
                                'setting'   => array(
                                    'default'   => '',
                                    'transport' => 'postMessage'
                                ),
                                'control'   => array(
                                    'class' => 'WP_Customize_Control',
                                    'label' => __( 'Text Field', 'beavertron' ),
                                    'type'  => 'text'
                                )
                            )

                        ),
                    ),
                    'beaver-section3'=> array(
                        'title'=>_x('Beavertron TextArea Field', 'Customizer section title.', 'beavertron' ),
                        'options'=>array(
                        /* Textarea Field */
                            'bt-text-area-field' => array(
                                'setting'   => array(
                                    'default'   => '',
                                    'transport' => 'postMessage'
                                ),
                                'control'   => array(
                                    'class' => 'WP_Customize_Control',
                                    'label' => __( 'Text Area Field', 'beavertron' ),
                                    'type'  => 'textarea'
                                )
                            )

                        ),
                    ),
                    'beaver-section4'=> array(
                        'title'=>_x('Beavertron Select Field', 'Customizer section title.', 'beavertron' ),
                        'options'=>array(
                            /* Select Field */
                            'bt-select-field' => array(
                                'setting'   => array(
                                'default'   => 'index-2', //* By default option 2 will be selected
                                'transport' => 'postMessage'
                                ),
                                'control'   => array(
                                'class'   => 'WP_Customize_Control',
                                'label'   => _x( 'Select Field', 'Testing select field.', 'beavertron' ),
                                'type'    => 'select',
                                'choices' => array(
                                    'index-1' => __('Option 1', 'beavertron'),
                                    'index-2' => __('Option 2', 'beavertron'),
                                    'index-3' => __('Option 3', 'beavertron')
                                )
                              )
                            )

                        ),
                    ),
                    'beaver-section5'=> array(
                        'title'=>_x('Beavertron Color Field', 'Customizer section title.', 'beavertron' ),
                        'options'=>array(
                            /* Color Field */
                            'bt-color-field' => array(
                                'setting'   => array(
                                'default'   => '#ffffff',
                                'transport' => 'postMessage'
                                ),
                                
                                'control'   => array(
                                'class'     => 'WP_Customize_Color_Control',
                                'label'     => __('Color Field', 'beavertron')
                                )
                            )
                        ),
                    ),
                    'beaver-section6'=> array(
                        'title'=>_x('Beavertron Slider Field', 'Customizer section title.', 'beavertron' ),
                        'options'=>array(
                            /* Slider Field */
                            'bt-slide-type' => array(
                                'setting'   => array(
                                  'default'   => '100',
                                  'transport' => 'postMessage'
                                ),
                                'control'   => array(
                                  'class'     => 'FLCustomizerControl',
                                  'label'     => __('Color Opacity', 'beavertron'),
                                  'type'      => 'slider',
                                  'choices'   => array(
                                    'min'  => 0,
                                    'max'  => 100,
                                    'step' => 1
                                  ),
                                )
                              )
                        ),
                    ),
                    'beaver-section7'=> array(
                        'title'=>_x('Beavertron Fonts Field', 'Customizer section title.', 'beavertron' ),
                        'options'=>array(
                            /* Font Family, Size and Weight Fields */
                            'bt-font-family' => array(
                                'setting'   => array(
                                    'default'   => 'Helvetica',
                                    'transport' => 'postMessage'
                                ),
                                'control'   => array(
                                    'class'     => 'FLCustomizerControl',
                                    'label'     => __('Font Family', 'beavertron'),
                                    'type'      => 'font',
                                    'connect'   => 'font-weight'
                                )
                            ),

                            /* Font Weight */
                            'font-weight' => array(
                                'setting'   => array(
                                    'default'   => '400',
                                'transport' => 'postMessage'
                                ),
                                'control'   => array(
                                    'class'     => 'FLCustomizerControl',
                                    'label'     => __('Font Weight', 'beavertron'),
                                    'type'      => 'font-weight',
                                    'connect'   => 'font-family'
                                )
                            ),

                            /* Font Size */
                            'font-size' => array(
                                'setting'   => array(
                                    'default'   => '30',
                                    'transport' => 'postMessage'
                                ),
                                'control'   => array(
                                    'class'     => 'FLCustomizerControl',
                                    'label'     => __('Font Size', 'beavertron'),
                                    'type'  => 'slider',
                                    'choices'     => array(
                                        'min'  => 16,
                                        'max'  => 72,
                                        'step' => 1
                                    ),
                                )
                            )
                        ),
                    ),
            
                )
                

            ));
            $data = FLTheme::get_setting('bt-body-bg-color');


          //  var_dump ($data);   
}
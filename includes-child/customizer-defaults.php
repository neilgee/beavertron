<?php

add_filter('fl_theme_add_panel_data','bt_customizer_options_filtered', 10, 2 ); 
/**
 *  Overiding Beaver Theme Defaults
 *  Filtering the Customizer
 *  Not working for theme if inside after_setup_theme function - so thats why it is here. Called from functions.php
 *  Changing the defaults on the live preset.
 *  @since 2.0.0
 */
function bt_customizer_options_filtered( $data, $key ) {
    if ( 'fl-general' == $key ) {
        // Do something with the $data.

        // Layout
        $data['sections']['fl-layout']['options']['fl-content-width']['setting']['default']='1200';
        $data['sections']['fl-layout']['options']['fl-medium-breakpoint']['setting']['default']='1080';
        $data['sections']['fl-layout']['options']['fl-mobile-breakpoint']['setting']['default']='768';

        $data['sections']['fl-layout']['options']['fl-framework']['setting']['default']='base-4';


        $data['sections']['fl-layout']['options']['fl-scroll-to-top']['setting']['default']='enable';
        $data['sections']['fl-layout']['options']['fl-awesome']['setting']['default']='fa5';
        // Background
        $data['sections']['fl-body-bg']['options']['fl-body-bg-color']['setting']['default']='#ffffff';
        // Accent Color
        $data['sections']['fl-accent-color']['options']['fl-accent']['setting']['default']='#EB5D50';
        $data['sections']['fl-accent-color']['options']['fl-accent-hover']['setting']['default']='#2C848D';
        // Fonts
        $data['sections']['fl-heading-font']['options']['fl-title-font-family']['setting']['default']='system-ui';
        $data['sections']['fl-heading-font']['options']['fl-heading-font-family']['setting']['default']='system-ui';

        $data['sections']['fl-heading-font']['options']['fl-h1-font-size']['setting']['default']='38';
        $data['sections']['fl-heading-font']['options']['fl-h1-font-size']['control']['responsive'] = array(
            'default' => array(
                'medium' => 38,
                'mobile' => 33,
            ),
        );
        $data['sections']['fl-heading-font']['options']['fl-h2-font-size']['setting']['default']='32';
        $data['sections']['fl-heading-font']['options']['fl-h2-font-size']['control']['responsive'] = array(
            'default' => array(
                'medium' => 32,
                'mobile' => 27,
            ),
        );
        $data['sections']['fl-heading-font']['options']['fl-h3-font-size']['setting']['default']='29';
        $data['sections']['fl-heading-font']['options']['fl-h3-font-size']['control']['responsive'] = array(
            'default' => array(
                'medium' => 29,
                'mobile' => 24,
            ),
        );
        $data['sections']['fl-heading-font']['options']['fl-h4-font-size']['setting']['default']='26';
        $data['sections']['fl-heading-font']['options']['fl-h4-font-size']['control']['responsive'] = array(
            'default' => array(
                'medium' => 26,
                'mobile' => 21,
            ),
        );
        $data['sections']['fl-heading-font']['options']['fl-h5-font-size']['setting']['default']='23';
        $data['sections']['fl-heading-font']['options']['fl-h5-font-size']['control']['responsive'] = array(
            'default' => array(
                'medium' => 23,
                'mobile' => 18,
            ),
        );
        $data['sections']['fl-heading-font']['options']['fl-h6-font-size']['setting']['default']='20';
        $data['sections']['fl-heading-font']['options']['fl-h6-font-size']['control']['responsive'] = array(
            'default' => array(
                'medium' => 20,
                'mobile' => 15,
            ),
        );
        $data['sections']['fl-body-font']['options']['fl-body-text-color']['setting']['default']='#333333';
        $data['sections']['fl-body-font']['options']['fl-body-font-family']['setting']['default']='system-ui';
        $data['sections']['fl-body-font']['options']['fl-body-font-size']['setting']['default']='18';
        $data['sections']['fl-body-font']['options']['fl-body-font-size']['control']['responsive'] = array(
            'default' => array(
                'medium' => 18,
                'mobile' => 16,
            ),
        );

       // $data['sections']['fl-body-font-size_mobile']['options']['fl-body-font-size_mobile']['setting']['default']='12';


        // Buttons
        $data['sections']['fl-buttons']['options']['fl-button-style']['setting']['default']='custom';
        $data['sections']['fl-buttons']['options']['fl-button-color']['setting']['default']='#ffffff';
        $data['sections']['fl-buttons']['options']['fl-button-hover-color']['setting']['default']='#000000';
        $data['sections']['fl-buttons']['options']['fl-button-background-color']['setting']['default']='#000000';
        $data['sections']['fl-buttons']['options']['fl-button-background-hover-color']['setting']['default']='#ffffff';
        $data['sections']['fl-buttons']['options']['fl-button-border-color']['setting']['default']='#000000';
        $data['sections']['fl-buttons']['options']['fl-button-border-style']['setting']['default']='solid';
        $data['sections']['fl-buttons']['options']['fl-button-border-radius']['setting']['default']='3';
        $data['sections']['fl-buttons']['options']['fl-button-border-width']['setting']['default']='1';


        // Add Settings and Controls - 1 way
        // $data['sections']['fl-buttons']['options']['bt_border-hover']['setting']['default']='#666666';

        // Add Settings and Controls - 2nd way
        $mynewsetting = array(
            'setting' => array(
                'default' => '#999999',
                'transport' => 'postMessage',
            ),
            'control' => array(
                'class'     => 'WP_Customize_Color_Control',
                'label'     => __( 'Border Hover Colour', 'beavertron' ),
                'priority'  => 0,
            ),
        );

     //  $data['sections']['fl-buttons']['options']['bt_border-hover'] = $mynewsetting;
    }

    

    if ( 'fl-header' == $key ) {

        $data['sections']['fl-header-logo']['options']['fl-logo-font-family']['setting']['default']='system-ui';
        $data['sections']['fl-nav-style']['options']['fl-nav-font-family']['setting']['default']='system-ui';
        $data['sections']['fl-nav-style']['options']['fl-nav-hover-color']['setting']['default']='#999999';

    }

    if ( 'fl-content' == $key ) {

      //  $data['sections']['fl-header-logo']['options']['fl-logo-font-family']['setting']['default']='system-ui';

    }

 
    return $data;  
}
<?php

/**
 * Beavertron Theme
 *
 * @package beavertron
 * @author  NeilGee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com/
 *
 * Functions for the actual BB Plugin
 */


/**
 * Remove BB Plugin LightBox
 * @since 1.0.0
 */
 //add_filter( 'fl_builder_override_lightbox', '__return_true' );


 add_filter( 'fl_module_upload_regex', 'bt_upload_image_formats', 10, 4 );
/**
 * Add SVG to allowed regex for BB module uploads
 * @since 1.0.0
 */
 function bt_upload_image_formats( $regex, $type, $ext, $file ) {
    $regex[ 'photo' ] = '#(jpe?g|png|gif|bmp|tiff|svg?)#i';

    return $regex;
}

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

// add_filter( 'fl_builder_font_families_system', 'bt_added_webfonts' );
// add_filter( 'fl_theme_system_fonts', 'bt_added_webfonts' );
/**
 * Add fonts to BB Theme & Builder
 * https://kb.wpbeaverbuilder.com/article/234-add-web-fonts-to-your-theme-and-the-beaver-builder-plugin
 * Adding Fonts to Customizer - example below
 * @since 1.0.0
 */
function bt_added_webfonts( $system ) {
    $system[ 'Avenir Book' ] = array(
			"fallback" => "BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",			
            "weights"  => array(
                "300",
            )
    );
    
    $system[ 'Avenir Roman' ] = array(
            "fallback" => "BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",			
            "weights"  => array(
                "400",
            )
    );

    $system[ 'Avenir Bold' ] = array(
            "fallback" => "BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",			
            "weights"  => array(
                "700",
            )
    );

    $system[ 'Avenir Black' ] = array(
            "fallback" => "BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",			
            "weights"  => array(
                "900",
            )
    );
    return $system;
}


add_filter( 'fl_builder_register_settings_form', 'wb_builder_register_settings_form_short', 10, 2 );
/** 
 * Filter the Global Settings Options BB Plugin.
 * Media breakpoints and form title have been changed.
 * @since 1.0.0
 */
function wb_builder_register_settings_form_short( $form, $id ) {
	if ( 'global' == $id ) {
    // Modify the row settings $form config array.
    $form['title'] = 'Beavertron Global Settings';
    $form['tabs']['general']['sections']['rows']['fields']['row_width']['default'] = '1200';    
    $form['tabs']['general']['sections']['rows']['fields']['row_width_default']['default'] = 'full';
	$form['tabs']['general']['sections']['responsive']['fields']['responsive_breakpoint']['default'] = '767';
    $form['tabs']['general']['sections']['responsive']['fields']['medium_breakpoint']['default'] = '1023';
    $form['tabs']['general']['sections']['responsive']['fields']['responsive_col_max_width']['default'] = '0';
   } 
   
   return $form;
}


add_filter( 'fl_theme_breakpoint_opts', 'bt_custom_breakpoints');
/**
 * Return array of theme breakpoints for BB Theme
 * @since 1.7.3
 */
function bt_custom_breakpoints() {

    $args = array(
        'medium_breakpoint' =>  1023,
        'mobile_breakpoint' =>  767,
    );

    return  $args;
}


add_filter( 'fl_builder_is_node_visible', 'bt_check_field_connections', 10, 2 );
/** 
 * Dont output empty custom field connections
 * @since 1.0.0
 */
function bt_check_field_connections( $is_visible, $node ) {

    if ( isset( $node->settings->connections ) ) {
        foreach ( $node->settings->connections as $key => $connection ) {
            if ( ! empty( $connection ) && empty( $node->settings->$key ) ) {
                return false;
            }
        }
    }
    
    return $is_visible;
}


/** 
 * Enable for development so module CSS files are not combined
 * @since 1.0.0
 */
//add_filter( 'fl_is_debug', '__return_true' ); 


add_filter( 'fl_theme_builder_assets_expire', 'bt_builder_expire' );
/** 
 * Delay Themer Builder Assets to Expire for 10 years ~ default is 30 days
 * @since 1.0.0
 */
function bt_builder_expire() {
    $expire_bundle = strtotime( '+3650 days' );

return $expire_bundle;
}

/** 
 * Turn off BB notifications
 * @since 1.0.0
 */
add_filter ('fl_disable_notifications', '__return_true' );

/** 
 * Turn off BB inline editing
 * @since 1.0.0
 */
add_filter ('fl_inline_editing_enabled', '__return_false' );


add_filter( 'fl_builder_color_presets', 'bt_builder_color_presets' );
/** 
 * Add color presets for Beaver Builder
 * @since 1.0.0
 */
function bt_builder_color_presets( $colors ) {
    $colors = array();
        
        $colors[] = 'c3251d';
        $colors[] = '222f3e';
        $colors[] = 'ffffff';
        $colors[] = '000000';
        $colors[] = '333333';
        $colors[] = '999999';
  
    return $colors;
}


add_action( 'customize_controls_print_footer_scripts', 'bt_customize_color_presets' );
/** 
 * Add color presets for Beaver Builder Customizer Theme
 * @since 1.0.0
 */
function bt_customize_color_presets() {
    ?>
  <script>
    jQuery(document).ready(function($){
      $('.wp-picker-container').iris({
        mode: 'hsl',
        controls: { 
          horiz: 'h', // square horizontal displays hue
          vert: 's', // square vertical displays saturdation
          strip: 'l' // slider displays lightness
        },
        palettes: ['#c3251d', '#222f3e', '#ffffff', '#000000', '#333333', '#999999']
      })
    });
  </script>
  <?php
};

/** 
 * See BB Module Usage
 * @since 1.0.0
 */
add_filter( 'is_module_disable_enabled','__return_true' );


add_action( 'admin_head', 'bb_full_canvas' );
/**
 *  Honey I unshrunk the icon canvas
 */
function bb_full_canvas() {
	
	if ( ! current_user_can( 'activate_plugins' )) {
		echo '
				<style type="text/css">
					.fl-icon-selector .fl-lightbox {
						height: 100%;
						width: 100%;
						margin-top: 0 !important;
					}
				</style>
			';
	}
}
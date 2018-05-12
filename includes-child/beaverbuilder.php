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
 * 
 * Remove BB Plugin LightBox
 * @since 1.0.0
 */
 //add_filter( 'fl_builder_override_lightbox', __return_true );


 /**
  * Add SVG to allowed regex for BB module uploads
  */
add_filter( 'fl_module_upload_regex', function( $regex, $type, $ext, $file ) {
    $regex[ 'photo' ] = '#(jpe?g|png|gif|bmp|tiff|svg?)#i';

    return $regex;
}, 10, 4 );


add_filter( 'fl_builder_font_families_system', 'bt_added_fonts_plugin' );
/**
 * Add fonts to BB Module font dropdown selection
 * Adding  System Font UI Stack
 * @since 1.0.0
 */
function bt_added_fonts_plugin( $system ) {
    $system[ '-apple-system' ] = array(
			"fallback" => "BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif",			
            "weights"  => array(
                "300",
                "400",
				"700",
				"900"
            )
	);
	
    return $system;
}

add_filter( 'fl_builder_register_settings_form', 'wb_builder_register_settings_form_short', 10, 2 );
/** 
 * Filter the Global Settings Options.
 * Media breakpoints and form title have been changed.
 */
function wb_builder_register_settings_form_short( $form, $id ) {
	if ( 'global' == $id ) {
    // Modify the row settings $form config array.
    $form['title'] = 'Beavertron Global Settings';
    $form['tabs']['general']['sections']['rows']['fields']['row_width']['default'] = '1200';    
	$form['tabs']['general']['sections']['responsive']['fields']['responsive_breakpoint']['default'] = '767';
	$form['tabs']['general']['sections']['responsive']['fields']['medium_breakpoint']['default'] = '1024';
	   
   } 
   
   return $form;
}


add_filter( 'fl_builder_is_node_visible', 'bt_check_field_connections', 10, 2 );
/* Dont output empty custom field connections */
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
 * 
 */
//add_filter( 'fl_is_debug', '__return_true' ); 

/* Turn off BB notifications */
add_filter ('fl_disable_notifications', '__return_true' );

/* Turn off BB inline editing */
add_filter ('fl_inline_editing_enabled', '__return_false' );
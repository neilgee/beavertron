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
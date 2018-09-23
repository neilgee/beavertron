<?php

add_action( 'wp_enqueue_scripts', 'bt_menu_scripts_styles', 1001 );
/**
 * Remove Default BB Mobile Menu
 * @since 1.0.0
 */
function bt_menu_scripts_styles() {
	wp_enqueue_script( 'remove-mobile', FL_CHILD_THEME_URL . '/js/remove-mobile.js', array(), '1.6.1', true );
	wp_enqueue_style( 'remove-mobile-inbuilt' , FL_CHILD_THEME_URL . '/css/remove-mobile.css', array() , '1.6.1', 'all' );
}

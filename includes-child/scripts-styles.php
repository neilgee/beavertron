<?php
/**
 * Load and order all scripts and styles in the head.
 *
 * @package beavertron
 */


 // Load BB Child theme style sheet later so we beat out all the other guys.
//add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );
add_action( 'wp_enqueue_scripts', 'bt_scripts_styles', 1000 ); // All the rest load before.
/**
 * Script-tac-ulous -> All the Scripts and Styles Enqueued, scripts first - then styles.
 */
function bt_scripts_styles() {
	// wp_enqueue_style( 'googlefonts' , '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,300,800', array(), '2', 'all' );
	wp_enqueue_style( CHILD_THEME_NAME, FL_CHILD_THEME_URL . '/style.css' );	
	// wp_dequeue_style( 'foundation-icons' );
	// wp_dequeue_style( 'font-awesome' );
	// wp_dequeue_style( 'dashicons' );

}

// add_action( 'wp_enqueue_scripts', 'bt_backstretch_background_scripts' );
/**
 * Backstretch for Custom Background Image
 */
 function bt_backstretch_background_scripts() {
	//* Load scripts only if custom background is being used
	if ( ! get_background_image() )
		return;

	wp_enqueue_script( 'backstretch', get_stylesheet_directory_uri() . '/js/backstretch.min.js', array( 'jquery' ), '2.0.4', true );
	wp_enqueue_script( 'backstretch-image', get_stylesheet_directory_uri().'/js/backstretch-initialise.js' , array( 'jquery', 'backstretch' ), '1', true );
	wp_localize_script( 'backstretch-image', 'BackStretchImage', array( 'src' => get_background_image() ) );
}



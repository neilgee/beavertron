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
	wp_enqueue_script( 'remove-mobile', FL_CHILD_THEME_URL . '/js/remove-mobile.js', array(), '1.6', true );
	wp_enqueue_style( 'remove-mobile-inbuilt' , FL_CHILD_THEME_URL . '/css/remove-mobile.css', array() , '1.6.1', 'all' );
	
	// wp_dequeue_style( 'foundation-icons' );
	// wp_dequeue_style( 'font-awesome' );
	// wp_dequeue_style( 'dashicons' );

}

// add_action( 'wp_enqueue_scripts', 'bt_jquery_enqueue' );
// Disabled as causes issue with Beaver Themer // Add later jQuery
 function bt_jquery_enqueue() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js' ),  array(), '2.2.4', true );
	wp_enqueue_script( 'jquery' );
}


//add_action( 'wp_enqueue_scripts', 'bt_ie_styles', 999 );	//IE conditional styles load last
/**
 * IE Conditional Styles - gotta load very last.
 */
function bt_ie_styles() {
	wp_register_style( 'ieall', get_stylesheet_directory_uri() . '/css/ieall.css' );//target IE9 and lower
	$GLOBALS['wp_styles']->add_data( 'ieall', 'conditional', 'IE' );

	wp_enqueue_style( 'ieall' );
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

//add_action( 'wp_enqueue_scripts', 'bt_fitvids_responsive_video' );
/**
 * Fitvids
 */
 function bt_fitvids_responsive_video() {
	wp_enqueue_script( 'fitvids', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
 	wp_enqueue_script( 'fitvids-init', get_bloginfo( 'stylesheet_directory' ) . '/js/fitvids-init.js', array( 'fitvids' ), '1.1', true );
}





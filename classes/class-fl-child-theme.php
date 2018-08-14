<?php

/**
 * Helper class for child theme functions.
 *
 * @class FLChildTheme
 */
final class FLChildTheme {
    
    /**
	 * Enqueues scripts and styles.
	 *
     * @return void
     */
    static public function enqueue_scripts()
    {
        wp_enqueue_style( CHILD_THEME_NAME, FL_CHILD_THEME_URL . '/style.css' , array(), '1.0.0', 'all' );
        wp_enqueue_style( 'dashicons' );
       
        // Webfonts Example
        // wp_enqueue_style( 'webfonts', FL_CHILD_THEME_URL . '/webfonts/stylesheet.css' , array(), '1.0.0', 'all' );

        // Google Fonts Example
        // wp_enqueue_style( 'googlefonts' , '//fonts.googleapis.com/css?family=PT+Serif:400i,700i', array(), '2', 'all' );

        // Remove Icon Styles
        // wp_dequeue_style( 'foundation-icons' );
        // wp_dequeue_style( 'font-awesome' );
        
        // Take out the default lightbox
        // wp_dequeue_script('jquery-magnificpopup');
        // wp_dequeue_style('jquery-magnificpopup');

        // Set Up Global JS
        // wp_enqueue_script( 'global', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery' ), '1.0.0', true );

        // Select2 JS - CSS & JS files filed and init is commented out in global
        // if( is_shop() || is_product_category() ) {

        // wp_enqueue_script( 'select2js', get_stylesheet_directory_uri() . '/js/select2.min.js', array( 'jquery' ), '4.0.6', true );
        // wp_enqueue_style( 'select2css', get_stylesheet_directory_uri() . '/css/select2.min.css' , array(), '4.0.6', 'all' );
        // wp_enqueue_script( 'selectinit', get_stylesheet_directory_uri() . '/js/global.js', array( 'select2js' ), '1.0.0', true );       
    
        // }

    }
    
}
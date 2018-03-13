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
        // wp_dequeue_style( 'foundation-icons' );
        // wp_dequeue_style( 'font-awesome' );
        
        // Take out the default lightbox
        // wp_dequeue_script('jquery-magnificpopup');
        // wp_dequeue_style('jquery-magnificpopup');

        // Set Up Global JS
        // wp_enqueue_script( 'global', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery' ), '1.0.0', true );

        // Selctize JS - CSS & JS files filed and init is commented out in global
        // if( is_shop() || is_product_category() ) {

        // wp_enqueue_script( 'selectjs', get_stylesheet_directory_uri() . '/js/selectize.min.js', array( 'jquery' ), '2.2.0', true );
        // wp_enqueue_style( 'selectcss', get_stylesheet_directory_uri() . '/css/selectize.css' , array(), '2.2.0', 'all' );
        // wp_enqueue_script( 'selectinit', get_stylesheet_directory_uri() . '/js/global.js', array( 'selectjs' ), '2.0.4', true );       

        // }


    }
    
}
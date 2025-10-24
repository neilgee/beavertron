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
        wp_enqueue_style( CHILD_THEME_NAME, FL_CHILD_THEME_URL . '/style.css' , array(), '1.7.0', 'all' );
        wp_enqueue_style( 'dashicons' );
       
        // Webfonts Example
        //wp_enqueue_style( 'webfonts', FL_CHILD_THEME_URL . '/webfonts/stylesheet.css' , array(), '1.0.0', 'all' );

        // Google Fonts Example
        // wp_enqueue_style( 'googlefonts' , '//fonts.googleapis.com/css?family=PT+Serif:400i,700i', array(), '2', 'all' );

        // Remove Icon Styles
        // wp_dequeue_style( 'foundation-icons' );

        // Fontawesome
        // Remove FA 4
        wp_dequeue_style( 'font-awesome' );
		wp_deregister_style( 'font-awesome' );
        // If we need external
		//wp_enqueue_style( 'font-awesome-5', get_stylesheet_directory_uri() . '/fonts/fontawesome/css/fontawesome-all.min.css' );
		// Load FA 5 Everywhere
		wp_enqueue_style( 'font-awesome-6' );

        // Take out the default BB Scripts if not used
        // wp_dequeue_script( 'bootstrap' );

        $bt_fitvids_script = get_theme_mod( 'bt_fitvids_script');
        $bt_waypoints_script = get_theme_mod( 'bt_waypoints_script');
        $bt_throttle_script = get_theme_mod( 'bt_throttle_script');
        $bt_imagesloaded_script = get_theme_mod( 'bt_imagesloaded_script');
        $bt_magnificpopup_script = get_theme_mod( 'bt_magnificpopup_script');
        $bt_magnificpopup_style = get_theme_mod( 'bt_magnificpopup_style');

        if( $bt_magnificpopup_script == 1)  {
            wp_dequeue_script('jquery-magnificpopup');
        }
  
        if( $bt_magnificpopup_style == 1)  {
            wp_dequeue_style('jquery-magnificpopup');
        }

        if( $bt_imagesloaded_script == 1)  {
            wp_dequeue_script( 'imagesloaded' );
        }
        if( $bt_fitvids_script == 1)  {
            wp_dequeue_script( 'jquery-fitvids' );
        }

        if( $bt_throttle_script == 1)  {
            wp_dequeue_script( 'jquery-throttle' );
        }

        if( $bt_waypoints_script == 1)  {
             wp_dequeue_script( 'jquery-waypoints' );
        }
        
       

        // Set Up Global JS
        //wp_enqueue_script( 'global', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery' ), '1.0.0', true );

        // Select2 JS - CSS & JS files filed and init is commented out in global
        // if( is_shop() || is_product_category() ) {

        // wooSelect
        // wp_enqueue_script( 'selectinit', get_stylesheet_directory_uri() . '/js/global.js', array( 'selectWoo' ), '1.0.0', true );   
        // wp_enqueue_style( 'select2');

        // Actual select2 scripts and styles
        // wp_enqueue_script( 'select2js', get_stylesheet_directory_uri() . '/js/select2.min.js', array( 'jquery' ), '4.0.13', true );
        // wp_enqueue_style( 'select2css', get_stylesheet_directory_uri() . '/css/select2.min.css' , array(), '4.0.13', 'all' );
        // wp_enqueue_script( 'selectinit', get_stylesheet_directory_uri() . '/js/global.js', array( 'select2js' ), '1.0.0', true );       
    
        // }

    }
    
}
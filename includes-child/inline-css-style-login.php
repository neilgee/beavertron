<?php

add_action( 'login_enqueue_scripts', 'bt_css_inline_login', 1009 );
/**
 * Inline Style for login css
 *
 * @since 1.7.1
 */
function bt_css_inline_login() {
	// Passing inline CSS straight after the login CSS
	$handle  = 'login';
	// $handle  = 'fl-automator-skin';
	/* Our Customiser settings, stored as variables */
	$hero_bg_image = get_theme_mod( 'hero_bg');
	$login_color = get_theme_mod( 'bt_login_accent_color');
	$login_hover_color = get_theme_mod( 'bt_login_accent_hover_color');
	$login_background_color = get_theme_mod( 'bt_login_background_color');
	$login_link_color = get_theme_mod( 'bt_login_link_color');
	$login_link_hover_color = get_theme_mod( 'bt_login_link_hover_color');
	$login_form_color = get_theme_mod( 'bt_login_form_color');
	$login_form_text_color = get_theme_mod( 'bt_login_form_text');
	
	// Getting the default WP custom logo - 4 keys in the array - url[0], width[1], height[2] and a boolean[3]
	$custom_logo_id  = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
	$custom_logo_url = $custom_logo_id [0];
	$custom_logo_width = $custom_logo_id [1];
	$custom_logo_height = $custom_logo_id [2];
	$font_login = FLTheme::get_setting( 'fl-body-font-family' );
	
	/* Start off with •nuffink */
	$css = '';

	$css .= ( !empty($custom_logo_url) ) ? sprintf('
	.login h1 a { 
		background-image: url(%s);
		width: 300px !important;
		height: 100px !important;
		background-size: contain;
		background-position: center;
	}

	.login .message, 
	.login .success, 
	.login #login_error {
		line-height: 1.8;
    	padding-bottom: 10px;
	}
	', $custom_logo_url) : '';
	

	$css .= ( !empty($login_color) ) ? sprintf('
		body {
			background: %3$s;
			font-family: %4$s;
		}

		.wp-core-ui .button-primary {
			background: %1$s;
			border-color: %1$s;
		}
	
		.wp-core-ui .button-primary.focus, 
		.wp-core-ui .button-primary.hover, 
		.wp-core-ui .button-primary:focus, 
		.wp-core-ui .button-primary:hover {
			background: %2$s;
			border-color: %2$s;
			color: #fff;
			opacity: .8;
		}

		.wp-core-ui .button, 
		.wp-core-ui .button-secondary {
			color: #fff;
			border-color: %1$s;
			background: %1$s;
		}

		.wp-core-ui .button-secondary:hover, 
		.wp-core-ui .button.hover
		.wp-core-ui .button-secondary:focus, 
		.wp-core-ui .button.focus {
			border-color: %2$s;
			color: #fff;
		}

		.login .button.wp-hide-pw {
			color: %1$s;
		}

		.login .button.wp-hide-pw:hover,
		.login .button.wp-hide-pw:focus {
			color: %2$s;
			border-color: %2$s;
			box-shadow: 0 0 0 1px %2$s;
		}

		input[type="text"], 
		input[type="password"], 
		input[type="color"], 
		input[type="date"], 
		input[type="datetime"], 
		input[type="datetime-local"], 
		input[type="email"], 
		input[type="month"], 
		input[type="number"], 
		input[type="search"], 
		input[type="tel"], 
		input[type="time"], 
		input[type="url"], 
		input[type="week"], 
		select, 
		textarea {
		    border: 1px solid %1$s;
		}

		input[type=checkbox]:focus, 
		input[type=color]:focus, 
		input[type=date]:focus, 
		input[type=datetime-local]:focus, 
		input[type=datetime]:focus, 
		input[type=email]:focus, 
		input[type=month]:focus, 
		input[type=number]:focus, 
		input[type=password]:focus, 
		input[type=radio]:focus, 
		input[type=search]:focus, 
		input[type=tel]:focus, 
		input[type=text]:focus, 
		input[type=time]:focus, 
		input[type=url]:focus, 
		input[type=week]:focus, 
		select:focus, 
		textarea:focus {
			border-color: %1$s;
			box-shadow: 0 0 0 1px %1$s;
			border: 1px solid %1$s;
		}

		.login .message,
		.login .success,
		.login #login_error {
			border-left: 4px solid %1$s;
		}

		.login form {
			color: %5$s;
			background: %6$s;
		}
	', $login_color, $login_hover_color, $login_background_color, $font_login, $login_form_text_color, $login_form_color ) : '';


	$css .= ( !empty($login_link_color) ) ? sprintf('
		a {
			color: %1$s;
		}
		a:hover {
			color: %1$s;
			opacity: .8;
		}

		.login #nav a, 
		.login #backtoblog a {
			color: %1$s;
		}

		.login #backtoblog a:hover, 
		.login #nav a:hover, 
		.login h1 a:hover {
			color:%2$s;
			opacity: .8;
		}
	', $login_link_color, $login_link_hover_color ) : '';

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}
}




add_action( 'admin_enqueue_scripts', 'bt_css_inline_admin_common', 1009 );
/**
 * Inline Style for admin css Common
 *
 * @since 1.7.1
 */

function bt_css_inline_admin_common() {

	$admin_font = get_theme_mod( 'bt_admin_font');

	/* Start off with •nuffink */
	$css = '';

	if ($admin_font == 1) {
	
		// Passing inline CSS straight after the login CSS
		$handle  = 'common';

		$font_login = FLTheme::get_setting( 'fl-body-font-family' );
		
		$css .= ( !empty($font_login) ) ? sprintf('
			body {
				font-family: %s;
			}
		', $font_login ) : '';

	}

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}
}



add_action( 'admin_enqueue_scripts', 'bt_css_inline_admin_bar', 1009 );
/**
 * Inline Style for admin css Common
 *
 * @since 1.7.1
 */

function bt_css_inline_admin_bar() {

	$admin_font = get_theme_mod( 'bt_admin_font');

	/* Start off with •nuffink */
	$css = '';

	if ($admin_font == 1) {
		// Passing inline CSS straight after the login CSS
		$handle  = 'admin-bar';

		$font_login = FLTheme::get_setting( 'fl-body-font-family' );

		/* Start off with •nuffink */
		$css = '';
		
		$css .= ( !empty($font_login) ) ? sprintf('
		#wpadminbar * {
				font-family: %s;
			}
		', $font_login ) : '';
	}

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}
}
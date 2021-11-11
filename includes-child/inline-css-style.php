<?php
/**
 * Beavertron Inline CSS
 *
 * This file adds the required CSS to the front end of Beavertron theme.
 *
 * @package beavertron
 * @author  @_neilgee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com
 */

add_action( 'wp_enqueue_scripts', 'bt_css', 1001 );
/**
 * Checks the settings for the images and background colors for each image
 * If any of these value are set the appropriate CSS is output
 * Enqueued with a 1001 priority as the main style sheet is at 1000
 *
 * @since 1.0
 */

function bt_css() {
	
	// Choice here of passing inline CSS straight after the BB Skin CSS or the Child Theme CSS
	$handle  = defined( 'CHILD_THEME_NAME' ) && CHILD_THEME_NAME ? sanitize_title_with_dashes( CHILD_THEME_NAME ) : 'child-theme';
	// $handle  = 'fl-automator-skin';
	/* Our Customiser settings, stored as variables */
	
	// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {

	$bt_woo_button_text_color        = get_theme_mod( 'bt_woo_button_text_color', bt_woo_button_text_color_default() );
	$bt_woo_button_text_hover_color  = get_theme_mod( 'bt_woo_button_text_hover_color', bt_woo_button_text_hover_color_default() );

	$bt_woo_button_color           	= get_theme_mod( 'bt_woo_button_color', bt_woo_button_color_default() );
	$bt_woo_button_hover_color     	= get_theme_mod( 'bt_woo_button_hover_color', bt_woo_button_hover_color_default() );
	$bt_woo_border_color     		= get_theme_mod( 'bt_woo_border_color', bt_woo_button_border_color_default() );
	$bt_woo_border_hover_color		= get_theme_mod( 'bt_woo_border_color_hover', bt_woo_button_border_hover_color_default() );

	$bt_button_woo_padding_top_bottom = get_theme_mod( 'bt_button_woo_padding_top_bottom');
	$bt_button_woo_padding_left_right = get_theme_mod( 'bt_button_woo_padding_left_right');
	$bt_button_woo_font_family        = get_theme_mod( 'bt_button_woo_font_family');
	$bt_button_woo_font_weight        = get_theme_mod( 'bt_button_woo_font_weight');
	$bt_button_woo_font_size          = get_theme_mod( 'bt_button_woo_font_size');
	$bt_button_woo_line_height        = get_theme_mod( 'bt_button_woo_line_height');
	$bt_button_woo_text_transform     = get_theme_mod( 'bt_button_woo_text_transform');
	$bt_button_woo_border_style       = get_theme_mod( 'bt_button_woo_border_style');

	$bt_button_woo_border_width  = get_theme_mod( 'bt_button_woo_border_width');
	$bt_button_woo_border_radius = get_theme_mod( 'bt_button_woo_border_radius');

	$bt_woo_button_dis_color       = get_theme_mod( 'bt_woo_button_dis_color', bt_woo_button_dis_color_default() );
	$bt_woo_button_dis_hover_color = get_theme_mod( 'bt_woo_button_dis_hover_color', bt_woo_button_dis_hover_color_default() );

	$bt_woo_price_color      = get_theme_mod( 'bt_woo_price_color', bt_woo_price_color_default() );
	$bt_woo_sale_price_color = get_theme_mod( 'bt_woo_sale_price_color', bt_woo_sale_price_color_default() );

	$bt_woo_error_color   = get_theme_mod( 'bt_woo_error_color', bt_woo_error_color_default() );
	$bt_woo_info_color    = get_theme_mod( 'bt_woo_info_color', bt_woo_info_color_default() );
	$bt_woo_message_color = get_theme_mod( 'bt_woo_message_color', bt_woo_message_color_default() );
	}

	//* Calculate Color Contrast
	function bt_color_contrast( $color ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );
		// Changed from 128 to give more white text against darker backgrounds
		return ( $luminosity > 155 ) ? '#333333' : '#ffffff';
	}

	//* Calculate Color Brightness
	function bt_color_brightness( $color, $change ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$red   = max( 0, min( 255, $red + $change ) );
		$green = max( 0, min( 255, $green + $change ) );
		$blue  = max( 0, min( 255, $blue + $change ) );

		return '#'.dechex( $red ).dechex( $green ).dechex( $blue );
	}

	/* Start off with •nuffink*/
	$css = '';
	
	// Button Border Hover Color
	$border_color = FLTheme::get_setting( 'fl-button-border-hover-color' );
	$css .= ( $border_color ) ? sprintf('
		.fl-page button:hover, 
		.fl-responsive-preview-content button:hover, 
		.fl-page input[type=button]:hover, 
		.fl-responsive-preview-content input[type=button]:hover, 
		.fl-page input[type=submit]:hover, 
		.fl-responsive-preview-content input[type=submit]:hover, 
		.fl-page a.fl-button:hover, 
		.fl-responsive-preview-content a.fl-button:hover {
			border-color: %s;	
		}
	', $border_color ) : '';

	// All the buttons
	$button_col = FLTheme::get_setting( 'fl-button-color' );
	$button_col_hover = FLTheme::get_setting( 'fl-button-hover-color' );
	$button_col_bg = FLTheme::get_setting( 'fl-button-background-color' );
	$button_col_bg_hover = FLTheme::get_setting( 'fl-button-background-hover-color' );
	$button_font = FLTheme::get_setting( 'fl-button-font-family' );
	$button_weight = FLTheme::get_setting( 'fl-button-font-weight' );
	$button_size = FLTheme::get_setting( 'fl-button-font-size' );
	$button_line_height = FLTheme::get_setting( 'fl-button-line-height' );
	$button_transform = FLTheme::get_setting( 'fl-button-text-transform' );
	$button_border = FLTheme::get_setting( 'fl-button-border-style' );
	$button_border_width = FLTheme::get_setting( 'fl-button-border-width' );
	$button_border_color = FLTheme::get_setting( 'fl-button-border-color' );
	$button_border_radius = FLTheme::get_setting( 'fl-button-border-radius' );
	$button_border_hover = FLTheme::get_setting( 'fl-button-border-hover-color' );
	$button_padding_width = FLTheme::get_setting( 'bt_button_padding_left_right' );
	$button_padding_height = FLTheme::get_setting( 'bt_button_padding_top_bottom' ); // Assigning it to a variable to keep the markup clean.

	$css .= ( $button_col ) ? sprintf('	
		a.more-link,
		.fl-post-grid-content a.fl-post-grid-more,
		a.fl-post-more-link,
		a.fl-post-feed-more,
		a.fl-post-slider-feed-more,
		a.button,
		.fl-page a.button,
		.fl-builder-content a.fl-button, 
		.fl-builder-content a.fl-button:visited,
		.gform_wrapper .gform_footer input.button, 
		.gform_wrapper .gform_footer input[type="submit"] {
			font-family:%5$s, Arial;
			font-weight: %6$s;
			font-size:%7$spx;
			line-height:%8$s;
			text-transform: %9$s;
			border-style:%10$s;
			border-width: %11$spx;
			border-radius:%13$spx;
			border-color:%12$s;
			color:%1$s;
			background-color:%3$s;
			padding: %16$spx %15$spx;
		}

		a.more-link:hover,
		.fl-post-grid-content a.fl-post-grid-more:hover,
		a.fl-post-more-link:hover,
		a.fl-post-feed-more:hover,
		a.fl-post-slider-feed-more:hover,
		a.button:hover,
		.fl-page a.button:hover,
		.fl-builder-content a.fl-button:hover,
		.gform_wrapper .gform_footer:hover input.button, 
		.gform_wrapper .gform_footer input[type="submit"]:hover {
			color:%2$s;
			background-color:%4$s;
			border-color:%14$s;
		}
	', $button_col, $button_col_hover, $button_col_bg, $button_col_bg_hover, $button_font, $button_weight, $button_size, $button_line_height, $button_transform, $button_border, $button_border_width, $button_border_color, $button_border_radius, $button_border_hover, $button_padding_width, $button_padding_height) : '';


// WooCommerce
	if ( class_exists( 'WooCommerce' ) ) {

		$css .= ( bt_woo_button_color_default() !== $bt_woo_button_color ) ? sprintf( '
		
		.woocommerce .fl-page a.button,
		.woocommerce .fl-page #respond input#submit,
		.woocommerce .fl-page button.button,
		.woocommerce .fl-page input.button,
		.woocommerce-page ul.products li.product a.button,
		.woocommerce-page .woocommerce-message a.button,
		.woocommerce-page a.button,
		.woocommerce-page button.button,
		.woocommerce-page .woocommerce button[type=submit],
		.woocommerce-page .woocommerce a.button.wc-forward,
		/* Alt Selectors */
		.woocommerce #respond input#submit.alt.disabled,
		.woocommerce #respond input#submit.alt.disabled:hover,
		.woocommerce #respond input#submit.alt:disabled,
		.woocommerce #respond input#submit.alt:disabled:hover,
		.woocommerce #respond input#submit.alt:disabled[disabled],
		.woocommerce #respond input#submit.alt:disabled[disabled]:hover,
		.woocommerce a.button.alt.disabled,
		.woocommerce a.button.alt.disabled:hover,
		.woocommerce a.button.alt:disabled,
		.woocommerce a.button.alt:disabled:hover,
		.woocommerce a.button.alt:disabled[disabled],
		.woocommerce a.button.alt:disabled[disabled]:hover,
		.woocommerce button.button.alt.disabled,
		.woocommerce button.button.alt.disabled:hover,
		.woocommerce button.button.alt:disabled,
		.woocommerce button.button.alt:disabled:hover,
		.woocommerce button.button.alt:disabled[disabled],
		.woocommerce button.button.alt:disabled[disabled]:hover,
		.woocommerce input.button.alt.disabled,
		.woocommerce input.button.alt.disabled:hover,
		.woocommerce input.button.alt:disabled,
		.woocommerce input.button.alt:disabled:hover,
		.woocommerce input.button.alt:disabled[disabled],
		.woocommerce input.button.alt:disabled[disabled]:hover,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce-page button.button, 
		.woocommerce-page .woocommerce button[type=submit],
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle  {
			background-color: %1$s;
			color: %2$s;
			padding: %4$spx %5$spx;
			font-family: %6$s, Arial;
			font-weight: %7$s;
			font-size: %8$spx;
			line-height: %9$s;
			text-transform: %10$s;
			border: %12$spx %11$s %14$s;
			border-radius: %13$spx;
		}
		', $bt_woo_button_color, $bt_woo_button_text_color , $bt_woo_border_color, $bt_button_woo_padding_top_bottom,
		$bt_button_woo_padding_left_right, $bt_button_woo_font_family, $bt_button_woo_font_weight, 
		$bt_button_woo_font_size,$bt_button_woo_line_height, $bt_button_woo_text_transform, $bt_button_woo_border_style, 
		$bt_button_woo_border_width, $bt_button_woo_border_radius, $bt_woo_border_color  ) : '';

		
		$css .= ( bt_woo_button_hover_color_default() !== $bt_woo_button_hover_color ) ? sprintf( '
		.woocommerce .fl-page #respond input#submit:hover,
		.woocommerce .fl-page a.button:hover,
		.woocommerce .fl-page button.button:hover,
		.woocommerce .fl-page input.button:hover,
		.woocommerce-page ul.products li.product a.button:hover,
		.woocommerce-page a.button:hover,
		.woocommerce-page button.button:hover,
		.woocommerce-page .woocommerce button[type=submit]:hover,
		/* ALt Selectors */
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt:hover,
		.woocommerce-page ul.products li.product a.button:hover, 
		.woocommerce-page .woocommerce-message a.button:hover, 
		.woocommerce-page button.button:hover, 
		.woocommerce-page button.button.alt:hover, 
		.woocommerce-page a.button.alt:hover, 
		.woocommerce-page a.button:hover, 
		.woocommerce-page .woocommerce button[type=submit]:hover,
		.woocommerce-page .woocommerce a.button.wc-forward:hover  {
			background-color: %1$s;
			color: %2$s;
			border: %4$spx %5$s %3$s;
		}
		', $bt_woo_button_hover_color, $bt_woo_button_text_hover_color, $bt_woo_border_hover_color, $bt_button_woo_border_width, $bt_button_woo_border_style ) : '';



		$css .= ( bt_woo_button_dis_color_default() !== $bt_woo_button_dis_color ) ? sprintf( '
		.woocommerce #respond input#submit.disabled,
		.woocommerce #respond input#submit:disabled,
		.woocommerce #respond input#submit:disabled[disabled],
		.woocommerce a.button.disabled, .woocommerce a.button:disabled,
		.woocommerce a.button:disabled[disabled],
		.woocommerce button.button.disabled,
		.woocommerce button.button:disabled,
		.woocommerce button.button:disabled[disabled],
		.woocommerce input.button.disabled,
		.woocommerce input.button:disabled,
		.woocommerce input.button:disabled[disabled] {
			background-color: %1$s;
			border: %3$spx %4$s %1$s;
			color: %2$s;
		}
		', $bt_woo_button_dis_color, bt_color_contrast( $bt_woo_button_dis_color ), $bt_button_woo_border_width, $bt_button_woo_border_style  ) : '';


		$css .= ( bt_woo_button_dis_hover_color_default() !== $bt_woo_button_dis_hover_color ) ? sprintf( '
		.woocommerce #respond input#submit.disabled:hover,
		.woocommerce #respond input#submit:disabled:hover,
		.woocommerce #respond input#submit:disabled[disabled]:hover,
		.woocommerce a.button.disabled:hover,
		.woocommerce a.button:disabled:hover,
		.woocommerce a.button:disabled[disabled]:hover,
		.woocommerce button.button.disabled:hover,
		.woocommerce button.button:disabled:hover,
		.woocommerce button.button:disabled[disabled]:hover,
		.woocommerce input.button.disabled:hover,
		.woocommerce input.button:disabled:hover,
		.woocommerce input.button:disabled[disabled]:hover {
			background-color: %1$s;
			border: %3$spx %4$s %1$s;
			color: %2$s;
		}
		', $bt_woo_button_dis_hover_color, bt_color_contrast( $bt_woo_button_dis_hover_color ), $bt_button_woo_border_width, $bt_button_woo_border_style ) : '';


		$css .= ( bt_woo_price_color_default() !== $bt_woo_price_color ) ? sprintf( '
		.woocommerce div.product p.price,
		.woocommerce div.product span.price,
		.woocommerce ul.products li.product .price {
			color: %s;
		}
		', $bt_woo_price_color, bt_color_contrast( $bt_woo_price_color ) ) : '';


		$css .= ( bt_woo_sale_price_color_default() !== $bt_woo_sale_price_color ) ? sprintf( '
		.woocommerce span.onsale {
			background-color: %s;
		}
		', $bt_woo_sale_price_color, bt_color_contrast( $bt_woo_sale_price_color ) ) : '';


		$css .= ( bt_woo_info_color_default() !== $bt_woo_info_color  ) ? sprintf( '
		.woocommerce-info {
			border-top-color: %s;
		}
		', $bt_woo_info_color ) : '';


		$css .= ( bt_woo_info_color_default() !== $bt_woo_info_color  ) ? sprintf( '
		.woocommerce-info:before {
		    color:%s;
		}
		', $bt_woo_info_color ) : '';


		$css .= ( bt_woo_error_color_default() !== $bt_woo_error_color  ) ? sprintf( '
		.woocommerce-error {
			border-top-color: %s;
		}
		', $bt_woo_error_color ) : '';


		$css .= ( bt_woo_error_color_default() !== $bt_woo_error_color  ) ? sprintf( '
		.woocommerce-error:before,
		.woocommerce form .form-row.woocommerce-invalid label,
		.woocommerce form .form-row .required,
		.woocommerce a.remove {
		    color:%s !important;
		}
		', $bt_woo_error_color ) : '';


		$css .= ( bt_woo_error_color_default() !== $bt_woo_error_color  ) ? sprintf( '
		.woocommerce form .form-row.woocommerce-invalid .select2-container,
		.woocommerce form .form-row.woocommerce-invalid input.input-text,
		.woocommerce form .form-row.woocommerce-invalid select {
		    border-color: %s;
		}
		', $bt_woo_error_color ) : '';


		$css .= ( bt_woo_error_color_default() !== $bt_woo_error_color  ) ? sprintf( '
		.woocommerce a.remove:hover {
		    background-color: %s;
		}
		', $bt_woo_error_color ) : '';

		
		$css .= ( bt_woo_message_color_default() !== $bt_woo_message_color  ) ? sprintf( '
		.woocommerce-message {
			border-top-color: %s;
		}
		', $bt_woo_message_color ) : '';


		$css .= ( bt_woo_message_color_default() !== $bt_woo_message_color  ) ? sprintf( '
		.woocommerce-message:before {
		    color:%s;
		}
		', $bt_woo_message_color ) : '';

	}

	if ( $css ) {
		wp_add_inline_style( $handle, $css );
	}


}
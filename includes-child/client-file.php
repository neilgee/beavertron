<?php
/**
 * Client File - Custom Login and Dashboard Settings
 *
 * @package beavertron
 * @author  NeilGee
 * @license GPL-2.0+
 * @link    http://wpbeaches.com/
 */



add_action( 'login_head', 'bt_custom_login_logo' );
/**
 * Client Logo for Backend Login - Home link and Image Description
 *
 * @since 1.0.0
 */
function bt_custom_login_logo() {
	echo '<style type="text/css">
            .login h1 a { background-image:url(' . get_stylesheet_directory_uri() . '/images/logo.png) !important; width: 260px; !important; height: 60px !important; background-size: 100% 100% !important; margin-bottom: 60px !important;}
            .login form {margin-top: -50px;}
        </style>';
}

add_filter( 'login_headerurl', 'bt_custom_login_url', 10, 4 );
/**
 * Logo Backend Home link
 *
 * @since 1.0.0
 */
function bt_custom_login_url() {
	return site_url();
}

add_filter( 'login_headertext', 'bt_login_header_title' );
/**
 *  Logo Title Attribute uses Site Name
 *
 * @since 1.7.0
 */
function bt_login_header_title() {
	return get_bloginfo( 'name' );
}


add_action('after_setup_theme', 'bt_remove_admin_bar');
/**
 *  Remove admin bar for subscribers.
 *
 * @since 1.0.0
 */
function bt_remove_admin_bar() {
		if ( ! current_user_can( 'edit_posts' ) && ! is_admin() ) {
				show_admin_bar( false );
		}
}


add_action('wp_dashboard_setup', 'bt_remove_dashboard_widgets' );
/**
 *  Remove Dashboard Widgets
 *
 * @since 1.0.0
 */
function bt_remove_dashboard_widgets() {
	// remove_meta_box('dashboard_quick_press','dashboard','side'); //Quick Press widget
	// remove_meta_box('dashboard_recent_drafts','dashboard','side'); //Recent Drafts
	remove_meta_box( 'dashboard_primary','dashboard','side' ); //WordPress.com Blog
	// remove_meta_box('dashboard_secondary','dashboard','side'); //Other WordPress News
	// remove_meta_box('dashboard_incoming_links','dashboard','normal'); //Incoming Links
	remove_meta_box( 'dashboard_plugins','dashboard','normal' ); //Plugins
	remove_meta_box( 'dashboard_right_now','dashboard', 'normal' ); //Right Now
	// remove_meta_box('rg_forms_dashboard','dashboard','normal'); //Gravity Forms
	// remove_meta_box('dashboard_recent_comments','dashboard','normal'); //Recent Comments
	// remove_meta_box('icl_dashboard_widget','dashboard','normal'); //Multi Language Plugin
	// remove_meta_box('dashboard_activity','dashboard', 'normal'); //Activity
	remove_action( 'welcome_panel','wp_welcome_panel' );
	remove_action( 'try_gutenberg_panel', 'wp_try_gutenberg_panel'); // Try Gutenberg

}


add_action( 'admin_head', 'bt_hide_tabs' );
/**
 *  Hide 'Screen Option' and 'Help' tab for non-Admins
 *
 * @since 1.0.0
 */
function bt_hide_tabs() {
	
	if ( ! current_user_can( 'activate_plugins' )) {
		echo '
				<style type="text/css">
					#wp-admin-bar-wp-logo,
					#wp-admin-bar-comments,
					#wp-admin-bar-new-content,
					#contextual-help-link-wrap,
					#screen-options-link-wrap {
							display: none !important;
					}
				</style>
			';
	}
}

add_action( 'admin_init', 'wsl_add_footer' );
/**
 *  Add credit and contact deats
 *
 * @since 1.0.0
 */
function wsl_add_footer() {
    add_filter( 'admin_footer_text', 'wsl_edit_text', 11 );
}

function wsl_edit_text() {
    return "<em>Site by <a href='https://websitelove.com.au' rel='nofollow'>WebsiteLove</a>, contact <a href='mailto:support@websitelove.com.au' rel='nofollow'>us</a></em>";
}

/**
 * Roles & Capabilities
 * @link  https://wordpress.stackexchange.com/questions/4191/allow-editors-to-edit-menus
 * Add editor the privilege to edit theme & menu
 * @since 1.0.0
 */
// get the the role object
// $role_object = get_role( 'editor' );

// add $cap capability to this role object
// $role_object->add_cap( 'edit_theme_options' );
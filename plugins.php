<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for child theme Beavertron
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_stylesheet_directory() . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'gsm_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function gsm_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	 $plugins = array(
			 // This is an example of how to include a plugin pre-packaged with a theme.
			 array(
					 'name'               => 'ACF', // The plugin name.
					 'slug'               => 'advanced-custom-fields', // The plugin slug (typically the folder name).
					 'source'             => get_theme_root() . '/lib/plugins/advanced-custom-fields-pro.zip', // The plugin source.
					 'required'           => false, // If false, the plugin is only 'recommended' instead of required.
					 'version'            => '5.6.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
					 'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
					 'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
					 'external_url'       => '', // If set, overrides default API URL and points to an external URL.
					 'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			 ),
			 // This is an example of how to include a plugin pre-packaged with a theme.
			 array(
					 'name'               => 'Beaver Builder Plugin (Pro Version)', // The plugin name.
					 'slug'               => 'bb-plugin-pro', // The plugin slug (typically the folder name).
					 'source'             => get_theme_root() . '/lib/plugins/bb-plugin-pro.zip', // The plugin source.
					 'required'           => false, // If false, the plugin is only 'recommended' instead of required.
					 'version'            => '2.0.6.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
					 'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
					 'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
					 'external_url'       => '', // If set, overrides default API URL and points to an external URL.
					 'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			 ),

			 array(
				'name'               => 'Ultimate Addon for Beaver Builder', // The plugin name.
				'slug'               => 'bb-ultimate-addon', // The plugin slug (typically the folder name).
				'source'             => get_theme_root() . '/lib/plugins/bb-ultimate-addon.zip', // The plugin source.
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '1.6.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),

				// This is an example of how to include a plugin pre-packaged with a theme.
			array(
				'name'               => 'Beaver Themer', // The plugin name.
				'slug'               => 'bb-theme-builder', // The plugin slug (typically the folder name).
				'source'             => get_theme_root() . '/lib/plugins/bb-theme-builder.zip', // The plugin source.
				'required'           => false, // If false, the plugin is only 'recommended' instead of required.
				'version'            => '1.1.0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
				'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
				'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
				'external_url'       => '', // If set, overrides default API URL and points to an external URL.
				'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			),   

			 // This is an example of how to include a plugin pre-packaged with a theme.
			 array(
					 'name'               => 'Gravity Forms', // The plugin name.
					 'slug'               => 'gravityforms', // The plugin slug (typically the folder name).
					 'source'             => get_theme_root() . '/lib/plugins/gravityforms_2.2.6.1.zip', // The plugin source.
					 'required'           => false, // If false, the plugin is only 'recommended' instead of required.
					 'version'            => '2.2.6.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
					 'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
					 'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
					 'external_url'       => '', // If set, overrides default API URL and points to an external URL.
					 'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			 ),

			 array(
					 'name'               => 'Woocommerce Memberships', // The plugin name.
					 'slug'               => 'woocommerce-memberships', // The plugin slug (typically the folder name).
					 'source'             => get_theme_root() . '/lib/plugins/woocommerce-memberships.zip', // The plugin source.
					 'required'           => false, // If false, the plugin is only 'recommended' instead of required.
					 'version'            => '1.7.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
					 'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
					 'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
					 'external_url'       => '', // If set, overrides default API URL and points to an external URL.
					 'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			 ),
			 array(
					 'name'               => 'Woocommerce Subscriptions', // The plugin name.
					 'slug'               => 'woocommerce-subscriptions', // The plugin slug (typically the folder name).
					 'source'             => get_theme_root() . '/lib/plugins/woocommerce-subscriptions.zip', // The plugin source.
					 'required'           => false, // If false, the plugin is only 'recommended' instead of required.
					 'version'            => '2.0.20', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
					 'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
					 'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
					 'external_url'       => '', // If set, overrides default API URL and points to an external URL.
					 'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
			 ),


			 // This is an example of how to include a plugin from a private repo in your theme.
			 array(
					 'name'               => 'WP Sync DB Master', // The plugin name.
					 'slug'               => 'wp-sync-db-master', // The plugin slug (typically the folder name).
					 'source'             => 'https://github.com/neilgee/wp-sync-db/archive/master.zip', // The plugin source.
					 'required'           => false, // If false, the plugin is only 'recommended' instead of required.
					 'external_url'       => 'https://github.com/neilgee/wp-sync-db/', // If set, overrides default API URL and points to an external URL.
			 ),

			 array(
					 'name'      => 'Adminimize',
					 'slug'      => 'adminimize',
					 'required'  => false,
			 ),
			 array(
					'name'      => 'Admin Page Spider',
					'slug'      => 'admin-page-spider',
					'required'  => false,
			),
			 array(
					 'name'      => 'Akismet',
					 'slug'      => 'akismet',
					 'required'  => false,
			 ),
			 array(
					'name'      => 'WPD Beaver Popups',
					'slug'      => 'wpd-beaver-popups',
					'required'  => false,
			),
			 array(
					'name'      => 'Better Search Replace',
					'slug'      => 'better-search-replace',
					'required'  => false,
			),
			 array(
					 'name'      => 'BuddyPress',
					 'slug'      => 'buddypress',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Bootstrap Modals',
					 'slug'      => 'bootstrap-modals',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Business Profile',
					 'slug'      => 'business-profile',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Content Aware Sidebars',
					 'slug'      => 'content-aware-sidebars',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Duplicate Post',
					 'slug'      => 'duplicate-post',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Duplicator',
					 'slug'      => 'duplicator',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Dynamic Widgets',
					 'slug'      => 'dynamic-widgets',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Easy Updates Manager',
					 'slug'      => 'stops-core-theme-and-plugin-updates',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'EWWW Image Optimizer',
					 'slug'      => 'ewww-image-optimizer',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Members',
					 'slug'      => 'members',
					 'required'  => false,
			 ),
			 array(
					'name'      => 'No Page Comment',
					'slug'      => 'no_page_comment',
					'required'  => false,
			),
			 array(
					 'name'      => 'Post Types Order',
					 'slug'      => 'post-types-Order',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Post Type Switcher',
					 'slug'      => 'post-type-switcher',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Simply Show Hooks',
					 'slug'      => 'simply-show-hooks',
					 'required'  => false,
			 ),	
			 array(
					'name'      => 'SOGO Add Script Header Footer',
					'slug'      => 'oh-add-script-header-footer',
					'required'  => false,
			),
			 array(
					 'name'      => 'Testimonial Rotator',
					 'slug'      => 'testimonial-rotator',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Google Analytics by Yoast',
					 'slug'      => 'google-analytics-for-wordpress',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Imsanity',
					 'slug'      => 'imsanity',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Jetpack',
					 'slug'      => 'jetpack',
					 'required'  => false,
			 ),
			 array(
					'name'     => 'LiteSpeed Cache',
					'slug'     => 'liteSpeed-cache',
					'required' => false,
			),
			 array(
					 'name'      => 'ManageWP Worker',
					 'slug'      => 'worker',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'MapPress Easy Google Maps',
					 'slug'      => 'mappress-google-maps-for-wordpress',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'matchHeight',
					 'slug'      => 'matchheight',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'SlickNav Mobile Menu',
					 'slug'      => 'slicknav-mobile-menu',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Force Regenerate Thumbnails',
					 'slug'      => 'force-regenerate-thumbnails',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Smoothscroller',
					 'slug'      => 'smoothscroller',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'The Events Calendar',
					 'slug'      => 'the-events-calendar',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Venobox Lightbox',
					 'slug'      => 'venobox-lightbox',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Widget CSS Classes',
					 'slug'      => 'widget-css-classes',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Woocommerce',
					 'slug'      => 'woocommerce',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'Wordfence',
					 'slug'      => 'wordfence',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'WordPress SEO',
					 'slug'      => 'wordpress-seo',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'WP Super Cache',
					 'slug'      => 'wp-super-cache',
					 'required'  => false,
			 ),
			 array(
					 'name'      => 'WP Sweep',
					 'slug'      => 'wp-sweep',
					 'required'  => false,
			 ),
			 // This is an example of the use of 'is_callable' functionality. A user could - for instance -
			 // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
			 // 'wordpress-seo-premium'.
			 // By setting 'is_callable' to either a function from that plugin or a class method
			 // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
			 // recognize the plugin as being installed.
			 //array(
			 //    'name'        => 'WordPress SEO by Yoast',
			 //    'slug'        => 'wordpress-seo',
			 //    'is_callable' => 'wpseo_init',
			 //),



	 );

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'beavertron',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}

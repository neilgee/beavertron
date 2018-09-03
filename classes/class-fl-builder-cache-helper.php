<?php
namespace FLCache;
/**
 * Helper class for clearing those caches.
 *
 * @since 2.1.5
 */
class CacheHelper {

	function define( $define, $setting = true ) {
		if ( ! defined( $define ) ) {
			define( $define, $setting );
		}
	}
}

/**
 * Swift performance plugin
 */
class Swift extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\Swift_Performance_Cache' ) ) {
			\Swift_Performance_Cache::clear_all_cache();
		}
	}
}
new Swift;

/**
 * Breeze plugin
 */
class Breeze extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\Breeze_PurgeCache' ) ) {
			\Breeze_PurgeCache::breeze_cache_flush();
		}
	}
}
new Breeze;

/**
 * Varnish
 */
class Varnish extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( defined( 'FL_CACHE_HELPER_VARNISH' ) ) {
			// @codingStandardsIgnoreLine
			@wp_remote_request( get_site_url(), array(
				'method' => 'BAN',
			) );
		}
	}
}
new Varnish;

/**
 * Comet Cache Plugin
 */
class Comet extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\comet_cache' ) ) {
			\comet_cache::clear();
		}
	}
}
new Comet;

/**
 * WP Fastest Cache Plugin
 */
class Fastest extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\WpFastestCache' ) ) {
			global $wp_fastest_cache;
			$wp_fastest_cache->deleteCache( true );
		}
	}
}
new Fastest;

/**
 * Pagely
 */
class Pagely extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\PagelyCachePurge' ) ) {
			\PagelyCachePurge::purgeAll();
		}
	}
}
new Pagely;

/**
 * Cache Enabler Plugin
 */
class CacheEnabler extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\Cache_Enabler' ) ) {
			\Cache_Enabler::clear_total_cache();
		}
	}
}
new CacheEnabler;

/**
 * LiteSpeed Plugin
 */
class LiteSpeed extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\LiteSpeed_Cache_API' ) ) {
			\LiteSpeed_Cache_API::purge_all();
		}
	}
}
new LiteSpeed;

/**
 * Siteground autoptimizer
 */
class SiteGround extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( function_exists( 'sg_cachepress_purge_cache' ) ) {
			sg_cachepress_purge_cache();
		}
	}
}
new SiteGround;


/**
 * W3 Total Cache
 */
class W3TC extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( function_exists( 'w3tc_pgcache_flush' ) ) {
			w3tc_pgcache_flush();
		}
	}
}
new W3TC;

/**
 * WPEngine
 */
class WPE extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\WpeCommon' ) ) {
			\WpeCommon::purge_memcached();
			\WpeCommon::clear_maxcdn_cache();
			\WpeCommon::purge_varnish_cache();
		}
	}
}
new WPE;

/**
 * wp-super-cache
 */
class SuperCache extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( function_exists( 'wp_cache_clear_cache' ) ) {
			wp_cache_clear_cache();
		}
	}
}
new SuperCache;

/**
 * Autooptimixze plugin.
 */
class AutoOptimize extends CacheHelper {

	function __construct() {
		add_action( 'fl_builder_init_ui',                  array( $this, 'filters' ) );
		add_action( 'fl_builder_cache_cleared',            array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_layout',        array( $this, 'clear_cache' ) );
		add_action( 'fl_builder_after_save_user_template', array( $this, 'clear_cache' ) );
		add_action( 'upgrader_process_complete',           array( $this, 'clear_cache' ) );
	}

	function clear_cache() {
		if ( class_exists( '\autoptimizeCache' ) ) {
			\autoptimizeCache::clearall();
		}
	}

	function filters() {
		add_filter( 'autoptimize_filter_noptimize', '__return_true' );
	}
}
new AutoOptimize;

/**
 * Defines for various cache plugins that respect them.
 */
class Defines extends CacheHelper {
	function __construct() {
		add_action( 'fl_builder_init_ui', array( $this, 'defines' ) );
	}

	function defines() {
		$this->define( 'DONOTMINIFY' );
		$this->define( 'DONOTCACHEPAGE' );
	}

}
new Defines;

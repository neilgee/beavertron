<?php

/**
 * Plugin Name:       Cache Purge Helper
 * Plugin URI:        https://github.com/jordantrizz/cache-purge-helper/blob/main/cache-purge-helper.php
 * Description:       Adding additional hooks to trigger nginx-helper or lscache plugin purges
 * Version:           0.1e
 * Author:            Paul Stoute, Jordan Trask, Jeff Cleverly
 * Author URI:        https://wpinfo.net
 * Text Domain:       cache-purge-helper
 * Domain Path:       /languages
 * Requires at least: 3.0
 * Tested up to:      5.4
 *
 * @link              https://wpinfo.net
 * @since             0.1
 * @package           cache-purge-helper
 */

/* Purge Cache Function
*
* If both nginx-helper and litespeed-cache plugin exist, purges will happen for both.
* This is cover instances where nginx-helper is used for server cache but litespeed-cache
* is used for other functions, or there is a mis-configuration.
*
* A better idea would be to check what server is being used and warn that the wrong plugin
* is activated for purging server cache.
*/

function cache_purge_helper() {
  // Purge WordPress Cache
  $called_action_hook = current_filter();
  write_log('cph - initiated');
  write_log('cph - running on'. $called_action_hook );
  write_log('cph - flusing WordPress Cache first');
  wp_cache_flush();
  
  // If nginx-helper plugins is enabled, purge cache.
  write_log('cph - checking for nginx-helper plugin');
  if ( is_plugin_active('nginx-helper/nginx-helper.php') ) {
    write_log('cph - nginx-helper plugin installed, running $nginx_purger->purge_all();');
    global $nginx_purger;
    $nginx_purger->purge_all();
  } else {
    write_log('cph - nginx-helper plugin not installed or detected');
  }
 
  // If litespeed-cache plugins is enabled, purge cache.
  write_log('cph - checking for litespeed-cache plugin');
  if ( is_plugin_active('litespeed-cache/litespeed-cache.php') ) {
    write_log('cph - litespeed-cache plugin installed, running do_action(\'litespeed_purge_all\');');
    do_action( 'litespeed_purge_all' );
  }  else {
    write_log('cph - litespeed-cache plugin not installed or detected');
  }
  write_log('cph - end of cache_purge_helper function');
}

/* Log to WordPress Debug Log */
if ( ! function_exists('write_log')) {
  function write_log ( $log )  {
    if ( is_array( $log ) || is_object( $log ) ) {
      error_log( print_r( $log, true ) );
    } else {
      error_log( $log );
    }
  }
} 

// Plugin Update Hooks
add_action( 'upgrader_process_complete', 'cache_purge_helper', 10, 0 ); // After plugins have been updated
add_action( 'activated_plugin', 'cache_purge_helper', 10, 0); // After a plugin has been activated
add_action( 'deactivated_plugin', 'cache_purge_helper', 10, 0); // After a plugin has been deactivated
add_action( 'switch_theme', 'cache_purge_helper', 10, 0); // After a theme has been changed

// Beaver Builder
add_action( 'fl_builder_cache_cleared', 'cache_purge_helper', 10, 3 );
add_action( 'fl_builder_after_save_layout', 'cache_purge_helper', 10, 3 );
add_action( 'fl_builder_after_save_user_template', 'cache_purge_helper', 10, 3 );
add_action( 'upgrader_process_complete', 'cache_purge_helper', 10, 3 );


// AutoOptimizer
add_action( 'autoptimize_action_cachepurged','cache_purge_helper', 10, 3 ); // Need to document this.
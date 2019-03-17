<?php
/**
 * Add ACF functions
 * @since 1.7.0
 */



add_action('after_switch_theme', 'bt_acf_auto_set_license_keys');
/**
 * ACF License - via constant defined in wp-config.php
 * @link  https://gist.github.com/mattradford/6d5b8f3cd11ce1f62480
 *
 * @since 1.0.0
 */
function bt_acf_auto_set_license_keys() {

	if ( !get_option('acf_pro_license') && defined('ACF_PRO_KEY') ) {
  
	  $save = array(
			  'key'	=> ACF_PRO_KEY,
			  'url'	=> home_url()
		  );
  
		  $save = maybe_serialize($save);
		  $save = base64_encode($save);
  
	  update_option('acf_pro_license', $save);
	}
}
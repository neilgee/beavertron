<?php
/**
 * Option for Hiding Gravity Forms Sub Labels
 * @since 1.0.0
 */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/**
 * Filters for returning user to same place on page to see form submission notification
 * Either for all or for specific form
 * @since 1.0.0
 */

/*The following example enables the confirmation anchor on all forms. */
//add_filter( 'gform_confirmation_anchor', '__return_true' );


/* The following example enables the confirmation anchor for form with ID 5. */
//add_filter( 'gform_confirmation_anchor_5', '__return_true' );
<?php

// Only show if we're showing the full post.
if($show_full || is_single()) {

	// Wrapper
	if($show_cats || $show_tags || $comments) {

		echo '<div class="fl-post-meta fl-post-meta-bottom">';

		do_action( 'fl_post_bottom_meta_open' );
	}

	// Categories and Tags
	if($show_cats || $show_tags) {

		$tags = get_the_tag_list( '', ', ' );
		$cats = get_the_category_list( ', ' );

		echo '<div class="fl-post-cats-tags">';

		if ( $show_cats && $cats ) {
			printf( _x( 'Posted in %s', 'Post meta info: category.', 'fl-automator' ), $cats );
		}

		if ( $show_tags && $tags ) {
			if ( $show_cats && $cats ) {
				printf( _x( ' and tagged %s', 'Post meta info: tags. Continuing of the sentence started with "Posted in Category".', 'fl-automator' ), $tags );
			} else {
				printf( _x( 'Tagged %s', 'Post meta info: tags.', 'fl-automator' ), $tags );
			}
		}

		echo '</div>';
	}

	// Comments
	if ( $comments && ! is_single() ) {
		comments_popup_link( _x( 'Leave a comment', 'Comments popup link title.', 'fl-automator' ), __( '1 Comment', 'fl-automator' ), _nx( '1 Comment', '% Comments', get_comments_number(), 'Comments popup link title.', 'fl-automator' ) );
	}

	// Close Wrapper
	if($show_cats || $show_tags || $comments) {

		do_action( 'fl_post_bottom_meta_close' );

		echo '</div>';
	}
}

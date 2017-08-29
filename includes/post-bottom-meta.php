<?php

// Only show if we're showing the full post.
if( $show_full || is_single() || is_archive() || is_home() || is_search() ) {
	
	// Wrapper
	if( $show_cats || $show_tags || $comments ) {

		echo '<div class="fl-post-meta fl-post-meta-bottom">';

		do_action( 'fl_post_bottom_meta_open' );
	}

	// Categories and Tags.
	if( $show_cats || $show_tags ) {

		$tags = get_the_tag_list( '', ', ' );
		$cats = get_the_category_list( ', ' );
        // Add spans around so can display block. Add CSS classes to style
		echo '<div class="fl-post-cats-tags">';

		if ( $show_cats && $cats ) {

		echo '<span class="fl-entry-categories">';
			
			printf( _x( 'Categorized %s', 'Post meta info: category.', 'fl-automator' ), $cats );
		}
                echo '</span>';
		if ( $show_tags && $tags ) {
				echo '<span class="fl-entry-tags">';
			if ( $show_cats && $cats ) {
				printf( _x( ' Tagged %s', 'Post meta info: tags. Continuing of the sentence started with "Posted in Category".', 'fl-automator' ), $tags );
			} else {
				printf( _x( 'Tagged %s', 'Post meta info: tags.', 'fl-automator' ), $tags );
			}

			echo '</span>';
		}

		echo '</div>';
		
		
	}

	// Comments disabled here as already enabled in top post meta
	// if ( $comments && ! is_single() ) {
	// 	comments_popup_link( _x( 'Leave a comment', 'Comments popup link title.', 'fl-automator' ), __( '1 Comment', 'fl-automator' ), _nx( '1 Comment', '% Comments', get_comments_number(), 'Comments popup link title.', 'fl-automator' ) );
	// }

	// Close Wrapper.
	if( $show_cats || $show_tags || $comments ) {

		do_action( 'fl_post_bottom_meta_close' );

		echo '</div>';
	}
}

<?php get_header(); ?>

<div class="fl-archive container">
	<div class="row">

		<?php FLTheme::sidebar('left'); ?>

		<div class="fl-content <?php FLTheme::content_class(); ?>" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php FLTheme::archive_page_header(); ?>

			<?php if(have_posts()) : ?>

				<?php while(have_posts()) : the_post(); ?>
					<?php get_template_part('content', get_post_format()); ?>
				<?php endwhile; ?>

				<?php	
				the_posts_pagination( array(

					'prev_text'          => '&laquo; Previous' . '<span class="screen-reader-text">' . __( 'Previous page', 'themename' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'themename' ) . '</span>' . 'Next &raquo;',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'themename' ) . ' </span>',

				) ); ?>

			<?php else : ?>

				<?php get_template_part('content', 'no-results'); ?>

			<?php endif; ?>

		</div>

		<?php FLTheme::sidebar('right'); ?>

	</div>
</div>

<?php get_footer(); ?>
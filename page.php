<?php
/**
 * The template for displaying all pages.
 */
?>

<?php get_header(); ?>
<?php do_action( 'sp_start_content_wrap_html' ); ?>
    <div class="main">
    	<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( SP_TEMPLATES . '/posts/content', 'page' );
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>
	</div><!-- #main -->
	<?php get_sidebar();?>
<?php do_action( 'sp_end_content_wrap_html' ); ?>
	
<?php get_footer(); ?>
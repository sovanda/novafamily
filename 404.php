<?php
/**
 * 404 pages.
 */
?>

<?php get_header(); ?>

	<?php do_action( 'sp_start_content_wrap_html' ); ?>
	    <div id="main" class="main">
			<?php get_template_part( 'templates/no-results' ); ?>		
	    </div>
	    <?php get_sidebar();?>
    <?php do_action( 'sp_end_content_wrap_html' ); ?>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying posts in the Image post format
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		
		<?php get_template_part( 'templates/posts/post-thumbnail' ); ?>

		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )
					sp_meta_posted_on();
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	

	<?php if ( is_search() || is_archive() || is_category() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', SP_TEXT_DOMAIN ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

</article><!-- #post-## -->

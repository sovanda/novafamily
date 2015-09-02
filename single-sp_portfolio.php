<?php
/**
 * The template for displaying all pages.
 */
?>

<?php get_header(); ?>

<div id="content">
	<div class="container clearfix">
		<div class="entry-content">
		<?php 
			$gallery = explode( ',', get_post_meta( $post->ID, 'sp_project_gallery', true ) );
			if ( $gallery ) :
				foreach ($gallery as $image ) {
					$thumb_url = wp_get_attachment_image_src($image, 'full'); 
					$img_attached = sp_get_post_attachment($image); ?>
					<div class="project-detail">
					<h3><?php echo $img_attached['title'] ?></h3>
					<span class="separator"></span>
					<p><?php echo $img_attached['description']; ?></p>
					<img class="wow fadeIn"  src="<?php echo $thumb_url[0]; ?>">
					</div>
		<?php	}
			endif;
		?>
		</div>
		<div class="related-post">
			<?php
				$args = array(
					'post_type' 		=> 'sp_portfolio',
					'posts_per_page'	=> 4,
					'orderby'			=> 'rand',
					'post__not_in'		=> array( $post->ID )
				);

				$custom_query = new WP_Query($args);
			?>
			<?php if ( $custom_query->have_posts() ): ?>
				<h4>Other Work</h4>
				
				<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
					$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
					
					<article><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb_url[0]; ?>"></a></article>
				
				<?php endwhile; wp_reset_postdata(); ?>

				<!-- <a href="#" class="more">More work</a> -->
			<?php endif; ?>
		</div>
	</div>
</div> <!-- #content -->


<?php get_footer(); ?>
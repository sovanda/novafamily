<?php
/*
Template Name: Work page
*/?>

<?php get_header(); ?>
	
	
	<section id="work" class="related-post">	
		<div class="container clearfix">
			<?php
				$args = array(
					'post_type' 		=> 'sp_portfolio'
				);

				$custom_query = new WP_Query($args);
			?>
			<?php if ( $custom_query->have_posts() ): ?>
			<h3><?php the_title(); ?></h3>	
				<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();
					$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
					
					<article><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb_url[0]; ?>"></a></article>
				
				<?php endwhile; wp_reset_postdata(); ?>

				<!-- <a href="#" class="more">More work</a> -->
			<?php endif; ?>
		</div> <!-- .container .clearfix -->
	</section>
	
<?php get_footer(); ?>
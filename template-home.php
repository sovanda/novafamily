<?php
/*
Template Name: Homepage
*/?>

<?php get_header(); ?>
	
	<?php // get all home meta
		$home_meta  = get_post_meta( $post->ID ); ?>

	
	<!-- Start Welcome message or slogan -->
	<section id="welcome">	
		<div class="container clearfix">
			<div class="inner-table">
				<div class="inner-table-cell">
					<div class="wow zoomIn heart">
					<?php the_post_thumbnail('large'); ?>
					</div>
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="wow fadeInLeft desc">		
							<?php the_content(); ?>
						</div>		
					<?php endwhile; ?>
					<a href="#" id="scroll-down-work" class="icon-down-open-big wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.5s"></a>
				</div>	
			</div>
		</div> <!-- .container .clearfix -->
	</section> <!-- .welcome -->

	<!-- Start Portfolio -->
	<section id="work">
		<div class="container clearfix">
			<div class="inner-table">
				<div class="inner-table-cell">
					<script type="text/javascript">
						jQuery(document).ready(function($){
						 	
						 	$('#carousel').flexslider({
								animation: "slide",
								controlNav: false,
								//animationLoop: false,
								slideshow: false,
								itemWidth: 75,
								itemMargin: 30,
								asNavFor: '#work-slider'
							});

							$('#work-slider').flexslider({
								animation: "<?php echo $home_meta['sp_slide_effect'][0]; ?>",
								slideshowSpeed: 5000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
								animationDuration: 600,         //Integer: Set the speed of animations, in milliseconds
								animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
								pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
								pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
								controlNav: false,
								//animationLoop: false,
								//slideshow: false,
								sync: "#carousel",
								before: function(slider) {
								    $('.flex-caption').delay(100).fadeOut(100);
								},
								after: function(slider) {
								  	$('.flex-active-slide').find('.flex-caption').delay(200).fadeIn(400);
								}
							});
						});
					</script>
					<?php
						$post_num = $home_meta['sp_slide_num'][0];
						$args = array(
							'post_type' 		=> 'sp_portfolio',
							'posts_per_page'	=> $post_num
						);

						$custom_query = new WP_Query($args);
					?>
					<?php if ( $custom_query->have_posts() ): ?>
					<div id="work-slider" class="flexslider">
						<ul class="slides">
						<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

							<?php $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
							<li data-thumb="<?php echo $thumb_url[0]; ?>">
								<img src="<?php echo get_post_meta( $post->ID, 'sp_project_slide', true ); ?>">
								<div class="flex-caption">
									<h2><?php the_title(); ?></h2>
									<?php the_content(); ?>
									<span class="separator"></span>
									<a href="<?php the_permalink(); ?>" class="more">View Project</a>
								</div>
							</li>
						<?php endwhile; wp_reset_postdata(); ?>	
						</ul>
					</div> <!-- #work-slider -->	
					<div id="carousel" class="flexslider">
						<ul class="slides">
						<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

							<?php $thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
							<li>
								<img src="<?php echo $thumb_url[0]; ?>">
							</li>
						<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					</div>
					<!-- <a href="#" class="all-works">View All Works<span class="icon-plus-1"></span></a> -->
				<?php endif; ?>
				<a href="#" id="scroll-down-clients" class="icon-down-open-big wow fadeout" data-wow-duration="1.2s" data-wow-delay="0.5s"></a>
				</div>
			</div>	
		</div> <!-- .container .clearfix -->
	</section>

	<section id="clients">	
		<div class="container clearfix">	
		<?php
			$post_num = $home_meta['sp_client_num'][0];
			$args = array(
				'post_type' 		=> 'sp_client',
				'posts_per_page'	=> $post_num
			);

			$custom_query = new WP_Query($args);
		?>
		<?php if ( $custom_query->have_posts() ): ?>

		<h2><?php echo $home_meta['sp_client_title'][0]; ?></h2>

		<?php 
			while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
			
				$thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
		?>
			<div class="wow zoomIn client-item ngo"> 
				<a href="<?php echo get_post_meta( $post->ID, 'sp_link_client', true ); ?>"><img src="<?php echo $thumb_url[0]; ?>"></a>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>	
		<?php endif; ?>
		</div> <!-- .container .clearfix -->
	</section>
	
<?php get_footer(); ?>
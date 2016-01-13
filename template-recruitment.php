<?php
/*
Template Name: Recruitment page
*/?>

<?php get_header(); ?>
	
	<div id="content">
		<div class="container clearfix">
			<div class="entry-content entry-about">

					<?php while ( have_posts() ) : the_post(); ?>
						<div class="wow fadeInLeft" data-wow-delay="1s">
							<h3><?php the_title(); ?></h3>		
							<?php the_content(); ?>
						</div>		
					<?php endwhile; ?>
				
			</div> <!-- .entry-content .entry-about -->
		</div>
	</div> <!-- #content -->
	
<?php get_footer(); ?>
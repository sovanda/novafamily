<?php $meta = get_post_custom($post->ID); ?>

<?php if ( has_post_format( 'audio' ) ): // Audio ?>
	
	<div class="post-format">		
		<?php
			$embed_url = get_post_meta( $post->ID, 'sp_audio_url', true ); 
			echo sp_soundcloud($embed_url); 
		?>	
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'gallery' ) ): // Gallery ?>
	
	<div class="post-format">
		<?php $gallery = explode( ',', get_post_meta( $post->ID, 'sp_post_gallery', true ) ); if ( !empty($gallery) ): ?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
			 	/* Single Post slider */
				$('#post-slider-<?php echo the_ID(); ?>').flexslider({
					animation: "slide",
					slideshowSpeed: 5000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
					animationDuration: 200,         //Integer: Set the speed of animations, in milliseconds
					animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
					pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
					pauseOnHover: true,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
					before: function(slider) {
					    $('.flex-caption').delay(100).fadeOut(100);
					},
					after: function(slider) {
					  $('.flex-active-slide').find('.flex-caption').delay(200).fadeIn(400);
					}
				});
			});
		</script>
		<div class="post-slider-container">
			<div class="flexslider" id="post-slider-<?php the_ID(); ?>">
				<ul class="slides">
					<?php foreach ( $gallery as $image ): ?>
						<li>
							<?php 
								$images = sp_get_post_attachment( $image );
								$image_url = aq_resize( $images['src'], '640', '372', true );
							?>
							<img src="<?php echo $image_url; ?>" alt="<?php echo $images['caption']; ?>">
							<?php if ( $images['caption'] ): ?>
								<p class="flex-caption"><?php echo $images['caption']; ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'image' ) || !has_post_format() ): // Image ?>

	<div class="post-format">
		<div class="wp-caption">
			<?php if ( has_post_thumbnail() ) {	
				$attache_id = get_post_thumbnail_id( get_the_ID() );
				$images = sp_get_post_attachment( $attache_id );
				$image_url = aq_resize( $images['src'], '640', '372', true );
				echo '<img src="' . $image_url . '" alt="' . $images['caption'] . '">';
				
				if ( $images['caption'] && is_singular() ) echo '<p class="wp-caption-text">'.$images['caption'].'</p>';
			} ?>
		</div>
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'video' ) ): // Video ?>

	<div class="post-format">
		<?php 
			if ( isset($meta['sp_video_url'][0]) && !empty($meta['sp_video_url'][0]) ) {
				global $wp_embed;
				$video = $wp_embed->run_shortcode('[embed]'.$meta['sp_video_url'][0].'[/embed]');
				echo $video;
			} 
		?>	
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'quote' ) ): // Quote ?>

	<div class="post-format">
		<div class="format-container">
			<blockquote><p><?php echo isset($meta['sp_quote'][0])?wpautop($meta['sp_quote'][0]):''; ?></p></blockquote>
			<cite><?php echo (isset($meta['sp_quote_author'][0])?'&mdash; '.$meta['sp_quote_author'][0]:''); ?></cite>
		</div>
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'chat' ) ): // Chat ?>

	<div class="post-format">
		<div class="format-container">
			<blockquote>
				<?php echo (isset($meta['sp_chat'][0])?wpautop($meta['sp_chat'][0]):''); ?>
			</blockquote>
		</div>
	</div>
	
<?php endif; ?>

<?php if ( has_post_format( 'link' ) ): // Link ?>

	<div class="post-format">
		<div class="format-container">
			<h1 class="entry-title">
			<a target="_blank" href="<?php echo (isset($meta['sp_link_url'][0])?$meta['sp_link_url'][0]:'#'); ?>">
				<?php echo (isset($meta['sp_link_title'][0])?$meta['sp_link_title'][0]:get_the_title()); ?> &rarr;
			</a>
			</h1>
		</div>
	</div>
	
<?php endif; ?>

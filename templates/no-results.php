<header class="page-header <?php echo $header_style;?>">    <h1 class="page-title"><span><?php _e( 'Oops! That page can&rsquo;t be found.', SP_TEXT_DOMAIN ); ?></span></h1>                  </header><!-- .page-header -->             <p class="lead">    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>		<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', SP_TEXT_DOMAIN ), esc_url( admin_url( 'post-new.php' ) ) ); ?>	<?php elseif ( is_search() ) : ?>		<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', SP_TEXT_DOMAIN ); ?>	<?php elseif ( is_404() ) : ?>			<?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', SP_TEXT_DOMAIN ); ?>	<?php else : ?>		<?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', SP_TEXT_DOMAIN ); ?>	<?php endif; ?>    </p>    <?php get_search_form(); ?>
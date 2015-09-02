<?php
/**
 * The template for displaying Archive pages
 */
?>

<?php get_header(); ?>
    
    <?php global $wp_query; ?>

	<?php do_action( 'sp_start_content_wrap_html' ); ?>
    <div id="main" class="main">
        
    <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">
                    <?php _e('For the term', SP_TEXT_DOMAIN); ?> "<span><?php echo get_search_query(); ?></span>".
                </h1>
            </header><!-- .page-header --> 

            <?php 
                
                // Start the Loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'templates/posts/content', get_post_format() );

                endwhile;
            
                    // Pagination
                    if(function_exists('wp_pagenavi'))
                        wp_pagenavi();
                    else 
                        echo sp_pagination();
            ?> 
    <?php 
        else : 
            get_template_part( 'templates/contents/no-results' );
        endif; 
    ?>
    
    </div> <!-- #main -->
    <?php get_sidebar(); ?>
    <?php do_action( 'sp_end_content_wrap_html' ); ?>
<?php get_footer(); ?>
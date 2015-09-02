<?php

/**
 * ----------------------------------------------------------------------------------------
 * Load Post type and Toxonomy
 * ----------------------------------------------------------------------------------------
 */

//Custom post WordPress admin menu position - 30, 33, 39, 42, 45, 48
if ( ! isset( $cp_menu_position ) )
	$cp_menu_position = array(
			'menu_portfolio'	=> 30,
			'menu_gallery'		=> 33,
			'menu_client'		=> 39
		);

//All custom posts
load_template( SP_BASE_DIR . '/library/custom-posts/cp-portfolio.php' );
load_template( SP_BASE_DIR . '/library/custom-posts/cp-gallery.php' );
load_template( SP_BASE_DIR . '/library/custom-posts/cp-client.php' );

//Taxonomies
load_template( SP_BASE_DIR . '/library/custom-posts/taxonomy-portfolio.php' );
load_template( SP_BASE_DIR . '/library/custom-posts/taxonomy-gallery.php' );

/**
 * ----------------------------------------------------------------------------------------
 * Change title text when creating new post
 * ----------------------------------------------------------------------------------------
 */
if ( is_admin() )
	add_filter( 'enter_title_here', 'sp_change_new_post_title' );	
	
/*
* Changes "Enter title here" text when creating new post
*/
if ( ! function_exists( 'sp_change_new_post_title' ) ) {
	function sp_change_new_post_title( $title ){
		$screen = get_current_screen();

		if ( 'gallery' == $screen->post_type )
			$title = __( "Album name", 'sptheme_admin' );

		if ( 'faq' == $screen->post_type )
			$title = __( "Question title", 'sptheme_admin' );

		return $title;
	}
} 

/**
 * ----------------------------------------------------------------------------------------
 * Set Default Terms for your Custom Taxonomies
 * ----------------------------------------------------------------------------------------
 * @author    Michael Fields     http://wordpress.mfields.org/
 *
 * @since     2010-09-13
 * @alter     2010-09-14
 *
 * @license   GPLv2
 */
function sp_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            //'post_tag' => array( 'taco', 'banana' ),
            'portfolio_category' => array( 'General' ),
            'gallery_category' => array( 'General' )
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'sp_set_default_object_terms', 100, 2 );

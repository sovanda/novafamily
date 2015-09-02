<?php

/**
 * ----------------------------------------------------------------------------------------
 * Enqueue Custom Admin Styles and Scripts
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'sp_admin_scripts_styles' ) ) {

	function sp_admin_scripts_styles( $hook ) {
		if ( !in_array($hook, array('post.php','post-new.php')) )
			return;
		wp_enqueue_script('post-formats', SP_ASSETS . '/js/admin-post-formats.js', array( 'jquery' ));
	}

}	
add_action('admin_enqueue_scripts', 'sp_admin_scripts_styles');

/**
 * ----------------------------------------------------------------------------------------
 * Add Option Tree for theme option
 * ----------------------------------------------------------------------------------------
 */
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
load_template( SP_BASE_DIR . '/library/option-tree/ot-loader.php' );
load_template( SP_BASE_DIR . '/library/functions/theme-options.php');

if ( ! function_exists( 'option_tree_admin_bar_render' ) ) {

	function option_tree_admin_bar_render() {
	
		if ( current_user_can('edit_theme_options') ) {
		global $wp_admin_bar;
		$wp_admin_bar->add_menu( array(
			'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
			'id' => 'option_tree_admin_bar', // link ID, defaults to a sanitized title value
			'title' => 'Theme Options', // link title
			'href' => admin_url( 'themes.php?page=ot-theme-options'), // name of file
			'meta' => false // array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
		));
		}
	}

}	
add_action( 'wp_before_admin_bar_render', 'option_tree_admin_bar_render' );

/**
 * ----------------------------------------------------------------------------------------
 * Loaded meta boxes
 * ----------------------------------------------------------------------------------------
 */
load_template( SP_BASE_DIR . '/library/functions/meta-boxes.php');

/**
 * ----------------------------------------------------------------------------------------
 * Loaded Custom post type and Taxonomy
 * ----------------------------------------------------------------------------------------
 */
load_template( SP_BASE_DIR . '/library/custom-posts/custom-posts.php');


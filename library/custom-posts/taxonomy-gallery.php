<?php
add_action('init', 'sp_tax_gallery_type_init', 0);

function sp_tax_gallery_type_init() {
	register_taxonomy(
		'gallery_category',
		array( 'sp_gallery' ),
		array(
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Gallery category', 'sptheme_admin' ),
				'singular_name' => __( 'Gallery category', 'sptheme_admin' ),
				'search_items' =>  __( 'Search gallery category', 'sptheme_admin' ),
				'all_items' => __( 'All gallery categorys', 'sptheme_admin' ),
				'parent_item' => __( 'Parent gallery category', 'sptheme_admin' ),
				'parent_item_colon' => __( 'Parent gallery category:', 'sptheme_admin' ),
				'edit_item' => __( 'Edit gallery category', 'sptheme_admin' ),
				'update_item' => __( 'Update gallery category', 'sptheme_admin' ),
				'add_new_item' => __( 'Add New gallery category', 'sptheme_admin' ),
				'new_item_name' => __( 'gallery category', 'sptheme_admin' )
			),
			'sort' => true,
			'rewrite' => array( 'slug' => 'gallery-category' ),
			'show_in_nav_menus' => false
		)
	);
}
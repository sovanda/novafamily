<?php

/**
 * ----------------------------------------------------------------------------------------
 * Set up register menus
 * ----------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'sp_menus_setup' ) ) {
	function sp_menus_setup() {

		/**
		 * Register nav menus.
		 */
		register_nav_menus(
			array(
				'primary'	=> __( 'Main Navigation', SP_TEXT_DOMAIN )
			)
		);

	}

	add_action( 'after_setup_theme', 'sp_menus_setup' );
}

/**
 * ----------------------------------------------------------------------------------------
 * Main navigation
 * ----------------------------------------------------------------------------------------
 */
if( !function_exists('sp_main_navigation')) {

	function sp_main_navigation() {
		
		// set default main menu if wp_nav_menu not active
		if ( function_exists ( 'wp_nav_menu' ) )
			wp_nav_menu( array(
				'container'      => false,
				'menu_id'	 	 => 'menu-primary',
				'menu_class'	 => 'primary-nav',
				'theme_location' => 'primary',
				'fallback_cb' 	 => 'sp_main_nav_fallback'
				) );
		else
			sp_main_nav_fallback();	
	}
}

if (!function_exists('sp_main_nav_fallback')) {
	
	function sp_main_nav_fallback() {
    	
		$menu_html = '<ul class="primary-nav">';
		$menu_html .= '<li><a href="'.admin_url('nav-menus.php').'">'.esc_html__('Add Main menu', SP_TEXT_DOMAIN).'</a></li>';
		$menu_html .= '</ul>';
		echo $menu_html;
		
	}
	
}


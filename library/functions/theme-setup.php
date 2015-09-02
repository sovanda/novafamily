<?php	

/**
 * ----------------------------------------------------------------------------------------
 * Sets up the content width value based on the theme's design and stylesheet.
 * ----------------------------------------------------------------------------------------
 */
if ( ! isset( $content_width ) )
	$content_width = 640;
	
/**
 * ----------------------------------------------------------------------------------------
 * Setup theme support
 * ----------------------------------------------------------------------------------------
 */

if( !function_exists('sp_theme_setup') ) {
	
	function sp_theme_setup(){
		
		// Makes theme available for translation.
		load_theme_textdomain( SP_TEXT_DOMAIN, SP_BASE_DIR . '/languages' );

		// Add visual editor stylesheet support
		add_editor_style( SP_ASSETS . '/css/base.css');
	
		// Adds RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Add post formats
		add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'video', 'quote', 'chat', 'link', 'aside', 'status' ) );
	
		// Add suport for post thumbnails and set default sizes
		add_theme_support( 'post-thumbnails' );

		//Add custom thumbnail sizes: base size 1280x768
		set_post_thumbnail_size( 940, 564, true );

		// And HTML5 support
		add_theme_support( 'html5' );
		
	}
	add_action( 'after_setup_theme', 'sp_theme_setup' );

}

/**
 * ----------------------------------------------------------------------------------------
 * Customizable size of gallery thumbnail wp core
 * ----------------------------------------------------------------------------------------
 */
function sp_gallery_atts( $out, $pairs, $atts ) {
	$atts = shortcode_atts( array(
	'columns' => '3',
	'size' => 'medium',
	), $atts );
	 
	$out['columns'] = $atts['columns'];
	$out['size'] = $atts['size'];
	 
	return $out;
 
}
add_filter( 'shortcode_atts_gallery', 'sp_gallery_atts', 10, 3 );

/**
 * ----------------------------------------------------------------------------------------
 * Customizable login screen and WordPress admin area
 * ----------------------------------------------------------------------------------------
 */
 // Custom logo login
add_action('login_head', 'sp_custom_login_logo');
function sp_custom_login_logo() {
	
	$out = '';
	$out .='<style type="text/css">';
	$out .='body.login{ background-color:#ffffff; }';
	if ( ot_get_option('custom-logo') ) {	
	    $out .='.login h1 a { background-image:url('. ot_get_option('custom-logo') .') !important; height: 90px!important; width: 100%!important; background-size: auto!important;}';
	} else {
		$out .='.login h1 a { background-image:url('. SP_BASE_URL .'/assets/images/logo.png) !important; height: 90px!important; width: 100%!important; background-size: auto!important;}';
	}
	$out .='</style>';
	echo $out;
}

// Set favicons Admin
add_action( 'admin_head', 'sp_adminfavicon' );
function sp_adminfavicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.ot_get_option('favicon').'" />'."\n"; 	
}

// Remove wordpress link on admin login logo
add_filter('login_headerurl', 'sp_remove_link_on_admin_login_info');
function sp_remove_link_on_admin_login_info() {
     return  get_bloginfo('url');
}

// Change login logo title
add_filter('login_headertitle', 'sp_change_loging_logo_title');
function sp_change_loging_logo_title(){
	return 'Go to '.get_bloginfo('name').' Homepage';
}

//	Remove logo and other items in Admin menu bar
add_action( 'wp_before_admin_bar_render', 'sp_remove_admin_bar_links' );
function sp_remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('wp-logo');
}

/**
 * ----------------------------------------------------------------------------------------
 * Customizable Apple touch icon and favicon
 * ----------------------------------------------------------------------------------------
 */
if( !function_exists('sp_apple_touch_icon') ) 
{
	function sp_apple_touch_icon() {

		$out = '';
		$favicon = ot_get_option('favicon');
		$iphone_icon = ot_get_option('custom-iphone-icon57');
		$ipad_icon = ot_get_option('custom-ipad-icon72');
		$iphone_retina_icon = ot_get_option('custom-iphone-icon114');
		$ipad_retina_icon = ot_get_option('custom-ipad-icon144');

		// Favicon
		if ( $favicon ) {
			$out .= '<link rel="shortcut icon" type="image/png" href="' . $favicon . '" />'."\n";
		} else {
			$out .= '<link rel="shortcut icon" type="image/png" href="' . SP_BASE_URL . '/favicon.png" />'."\n";
		}
		
		// Homescreen launch experience before Chrome 39
		$out .= '<meta name="mobile-web-app-capable" content="yes"/>'."\n";
		//$out .= '<link rel="icon" sizes="192x192" href="' . SP_BASE_URL . '/icon-192x192.png">'."\n";

		// Apple touch icon size
		$out .= '<meta name="apple-mobile-web-app-capable" content="yes"/>'."\n";
		$out .= '<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">'."\n";
		if ( $ipad_retina_icon ) {
			$out .= '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $ipad_retina_icon . '">'."\n";
		}
		if ( $iphone_retina_icon ) {
			$out .= '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $iphone_retina_icon . '">'."\n";
		}
		if ( $ipad_icon ) {
			$out .= '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $ipad_icon . '">'."\n";
		}
		if ( $iphone_icon ) {
			$out .= '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="' . $iphone_icon . '">'."\n";
		}

		echo $out;
	}
	add_filter( 'wp_head', 'sp_apple_touch_icon', 0 );
}


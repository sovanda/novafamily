<?php
/**
 * functions.php
 *
 * The theme's functions and definitions.
 */ 
 
/**
 * ----------------------------------------------------------------------------------------
 * Define constants.
 * ----------------------------------------------------------------------------------------
 */
$shortname 		= get_template(); 
$themeData     	= wp_get_theme( $shortname ); //WP 3.4+ only
$themeName 		= str_replace( ' ', '', $themeData->Name );

//Basic constants	
define( 'SP_THEME_NAME', $themeData->Name );
define ('SP_THEME_VERSION', $themeData->Version );
define( 'SP_TEXT_DOMAIN', strtolower($themeName) );

define( 'SP_BASE_DIR', get_template_directory() );
define( 'SP_BASE_URL', get_template_directory_uri() );
define( 'SP_ASSETS', get_template_directory_uri() . '/assets' );
define( 'SP_TEMPLATES', '/templates' );

/**
 * ----------------------------------------------------------------------------------------
 * Load some admin functions: theme option, metabox, custom post type and taxonomy
 * ----------------------------------------------------------------------------------------
 */
load_template( SP_BASE_DIR . '/library/functions/functions-admin.php' ); 

/**
 * ----------------------------------------------------------------------------------------
 * Theme setup and functions
 * ----------------------------------------------------------------------------------------
 */
load_template( SP_BASE_DIR . '/library/functions/theme-setup.php'); //Theme setup, theme support + branding + Apple touch icon and favicon
load_template( SP_BASE_DIR . '/library/functions/aq_resizer.php'); // small function to resize post image on fly
load_template( SP_BASE_DIR . '/library/functions/functions-wpml.php'); //wpml multiple language
load_template( SP_BASE_DIR . '/library/functions/functions-menu.php'); //Menu setup
load_template( SP_BASE_DIR . '/library/functions/functions-ss.php'); //Register style and script
load_template( SP_BASE_DIR . '/library/functions/functions-theme.php'); // General functions using within theme


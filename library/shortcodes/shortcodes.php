<?php
/*
Plugin Name: SP Shortcodes
Plugin URI: http://www.sptheme.com/sp-shortcodes
Description: A free shortcodes plugin
Author: Sopheak Peas
Author URI: http://www.sptheme.com
Version: 1.0
License: GNU General Public License version 2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

// Script version, used to add version for scripts and styles
define( 'SC_VER', '1.0' );

// Define plugin URLs, for fast enqueuing scripts and styles
if ( ! defined( 'SC_URL' ) )
define( 'SC_URL', get_template_directory_uri() . '/library/shortcodes/' );
define( 'SC_JS_URL', trailingslashit( SC_URL . 'inc/assets/js/' ) );
define( 'SC_CSS_URL', trailingslashit( SC_URL . 'inc/assets/css/' ) );
define( 'ED_JS_URL', trailingslashit( SC_URL . 'inc/tinymce/' ) );

// Plugin paths, for including files
if ( ! defined( 'SC_DIR' ) )
define( 'SC_DIR', get_template_directory() . '/library/shortcodes/' );
define( 'SC_INC_DIR', trailingslashit( SC_DIR . 'inc/' ) );


// Main shortcode functions
load_template( SC_INC_DIR . 'shortcodes-functions.php');

// Adds mce buttons to post editor
load_template( SC_INC_DIR . 'shortcodes-tinymce.php');
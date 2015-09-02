<?php
/**
 * Short codes in visual editor
 * Register short code buttons and add them to the visual mode of editor
 */

// Register Buttons row 3
function sp_shortcodes_register_mce_button_3( $buttons ) {

	array_unshift( $buttons, 'fontsizeselect' );
	array_unshift( $buttons, 'fontselect' );

	array_push( $buttons, 'col' );
	array_push( $buttons, 'btn' );
	array_push( $buttons, 'horz_rule' );
	array_push( $buttons, 'email_encoder' );
	array_push( $buttons, 'accordion' );
	array_push( $buttons, 'toggle' );
	array_push( $buttons, 'tab' );

    return $buttons;
}

// Customize mce editor font sizes and google font
if ( !function_exists( 'sp_customize_text_sizes' ) ) {
	function sp_customize_text_sizes( $initArray ){

		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
		$initArray['font_formats'] = 'Oxygen=oxygen;Lato=lato;Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats';
		
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'sp_customize_text_sizes' );

// add google scripts for use with the editor
if ( !function_exists( 'sp_mce_google_fonts_styles' ) ) {
	function sp_mce_google_fonts_styles() {

		$scripts[] = 'http://fonts.googleapis.com/css?family=Oxygen:400,700';
		$scripts[] = 'http://fonts.googleapis.com/css?family=Lato:900,700italic';
		foreach ( $scripts as $script ) {
			add_editor_style( str_replace( ',', '%2C', $script ) );
		}

	}
}
add_action( 'init', 'sp_mce_google_fonts_styles' );

// Register TinyMCE Plugin
function sp_shortcodes_add_tinymce_plugin($plugin_array) {

	$plugin_array['col'] 			= ED_JS_URL . 'ed-columns.js';
	$plugin_array['btn']			= ED_JS_URL . 'ed-button.js';
	$plugin_array['horz_rule']		= ED_JS_URL . 'ed-hr.js';
	$plugin_array['email_encoder']	= ED_JS_URL . 'ed-email-encoder.js';
	$plugin_array['accordion']		= ED_JS_URL . 'ed-accordion.js';
	$plugin_array['toggle']			= ED_JS_URL . 'ed-toggle.js';
	$plugin_array['tab']			= ED_JS_URL . 'ed-tab.js';
	
    return $plugin_array;
}

// Initialization Function
function sp_shortcodes_add_mce_button() {

	// check user permissions
    if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
    	return;
    }
	// check if WYSIWYG is enabled
    if ( 'true' == get_user_option( 'rich_editing' ) ) {
	  add_filter( 'mce_external_plugins', 'sp_shortcodes_add_tinymce_plugin' );
	  add_filter( 'mce_buttons_3', 'sp_shortcodes_register_mce_button_3' );
	}
 }
add_action( 'admin_head', 'sp_shortcodes_add_mce_button' );  

/*load_template( SC_INC_DIR . 'popup/ajax-slider-shortcode.php' );
load_template( SC_INC_DIR . 'popup/ajax-gallery-shortcode.php' );
load_template( SC_INC_DIR . 'popup/ajax-team-shortcode.php' );*/

?>
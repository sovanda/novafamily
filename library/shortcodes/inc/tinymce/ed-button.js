/**
 * Button Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.btn', {
        init : function( ed, url ) {
             ed.addButton( 'btn', {
                title : 'Insert Button',
                image : url + '/ed-icons/btn.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Button Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-button-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'btn', tinymce.plugins.btn );
	jQuery( function() {
		var form = jQuery( '<div id="sc-button-form"><table id="sc-button-table" class="form-table">\
							<tr>\
							<th><label for="sc-button-name">Button name</label></th>\
							<td><input type="text" name="sc-button-name" id="sc-button-name" value="" /></td>\
							</tr>\
							<tr>\
							<th><label for="sc-button-url">URL/Link</label></th>\
							<td><input type="text" name="sc-button-url" id="sc-button-url" value="" /> <small> ex: http://www.google.com</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-button-submit" class="button-primary" value="Insert Button" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-button-submit' ).click( function() {
			var btn_name = table.find( '#sc-button-name' ).val(),
			btn_url = table.find( '#sc-button-url' ).val(),
			shortcode = '[button url="' + btn_url + '"]';
			shortcode += btn_name;
			shortcode += '[/button]';


			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();
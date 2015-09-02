/**
 * testimonial Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.testimonial', {
        init : function( ed, url ) {
             ed.addButton( 'testimonial', {
                title : 'Insert testimonial',
                image : url + '/ed-icons/biography.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Testimonial Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-testimonial-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'testimonial', tinymce.plugins.testimonial );
	jQuery( function() {
		var form = jQuery( '<div id="sc-testimonial-form"><table id="sc-testimonial-table" class="form-table">\
							<tr>\
							<th><label for="sc-testimonial-style">Testimonial box style</label></th>\
							<td><select name="style" id="sc-testimonial-style">\
							<option value="light">Light</option>\
							<option value="dark">Dark</option>\
							</select><br />\
							<small>Select a style for testimonial.</small></td>\
							</tr>\
							<tr>\
							<th><label for="sc-testimonial-num">Number of testimonial</label></th>\
							<td><input type="text" name="sc-testimonial-num" id="sc-testimonial-num" value="10" /><small> (-1 to show all.)</small></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-testimonial-submit" class="button-primary" value="Insert Line" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-testimonial-submit' ).click( function() {
			var value = table.find( '#sc-testimonial-style' ).val(),
			numberposts = table.find( '#sc-testimonial-num' ).val(),
			shortcode = '[testimonial style="' + value + '"';
			shortcode += ' numberposts="' + numberposts + '"';
			shortcode += ']';

			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();
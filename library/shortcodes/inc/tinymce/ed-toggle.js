/**
 * Toggle Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.toggle', {
        init : function( ed, url ) {
             ed.addButton( 'toggle', {
                title : 'Insert an toggle',
                image : url + '/ed-icons/toggle.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Toggle Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-toggle-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'toggle', tinymce.plugins.toggle );
	jQuery( function() {
		var form = jQuery( '<div id="sc-toggle-form"><table id="sc-toggle-table" class="form-table">\
							<tr>\
							<th><label for="toggle-new">New toggle?</label></th>\
							<td>\
								<select id="toggle-new" name="toggle-new" size="1">\
									<option value="no" selected="selected">No</option>\
									<option value="yes">Yes</option>\
								</select>\
							</td>\
							</tr>\
							<tr>\
							<th><label for="toggle-style">Style</label></th>\
							<td>\
								<input type="radio" name="toggle-style" value="one">Light <input type="radio" name="toggle-style" value="two">Dark\
							</td>\
							</tr>\
							<tr>\
							<th><label for="section-title">Section title</label></th>\
							<td><input type="text" name="section-title" id="section-title" /></td>\
							</tr>\
							<tr>\
							<th><label for="section-content">Section content</label></th>\
							<td><textarea id="section-content" name="section-content" value="" rows="5"></textarea></td>\
							</tr>\
							</table>\
							<p class="submit">\
							<input type="button" id="sc-toggle-submit" class="button-primary" value="Insert toggles" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-toggle-submit' ).click( function() {

			var is_toggle = table.find( '#toggle-new' ).val(),
			style = table.find( 'input[name=toggle-style]:checked' ).val(),
			title = table.find('#section-title').val(),
			content = table.find('#section-content').val(),
			shortcode = '';
			
			if (is_toggle == 'yes'){
				shortcode += '[toggle style=\"' + style + '\"][toggle_section';
			} else{
				shortcode += '[toggle_section';
			}
			
			// Check if the title field is empty
			if (title) {
				shortcode += ' title=\"' + title + '\"]';
			}
			else {
				shortcode += ' title=\"Title Goes Here\"]';
			}
			
			// Check if the content field is empty
			if (content) {
				shortcode += content;
			}
			else {
				shortcode += 'Content Goes Here';
			}
			
			// Check if this is a new toggle
			if (is_toggle == 'yes') {
				shortcode += '[/toggle_section][/toggle]'; 
			}
			else {
				shortcode += '[/toggle_section]';
			}

			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();
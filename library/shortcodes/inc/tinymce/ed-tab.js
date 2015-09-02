/**
 * Tab Short code button
 */

( function() {
     tinymce.create( 'tinymce.plugins.tab', {
        init : function( ed, url ) {
             ed.addButton( 'tab', {
                title : 'Insert an tab',
                image : url + '/ed-icons/tabs.png',
                onclick : function() {
						var width = jQuery( window ).width(), H = jQuery( window ).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'Tab Options', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=sc-tab-form' );
                 }
             });
         },
         createControl : function( n, cm ) {
             return null;
         },
     });
	tinymce.PluginManager.add( 'tab', tinymce.plugins.tab );
	jQuery( function() {
		var form = jQuery( '<div id="sc-tab-form"><table id="sc-tab-table" class="form-table">\
							<tr>\
							<th><label for="tab-new">New tab?</label></th>\
							<td>\
								<select id="tab-new" name="tab-new" size="1">\
									<option value="no" selected="selected">No</option>\
									<option value="yes">Yes</option>\
								</select>\
							</td>\
							</tr>\
							<tr>\
							<th><label for="tab-style">Style</label></th>\
							<td>\
								<select id="tab-style" name="tab-style" size="1">\
									<option value="light" selected="selected">Light</option>\
									<option value="dark">Dark</option>\
								</select>\
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
							<input type="button" id="sc-tab-submit" class="button-primary" value="Insert tabs" name="submit" />\
							</p>\
							</div>' );
		var table = form.find( 'table' );
		form.appendTo( 'body' ).hide();
		form.find( '#sc-tab-submit' ).click( function() {

			var is_tab = table.find( '#tab-new' ).val(),
			style = table.find( '#tab-style' ).val(),
			title = table.find('#section-title').val(),
			content = table.find('#section-content').val(),
			shortcode = '';
			
			if (is_tab == 'yes'){
				shortcode += '[tabgroup style=\"' + style + '\"][tab';
			} else{
				shortcode += '[tab';
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
			
			// Check if this is a new tab
			if (is_tab == 'yes') {
				shortcode += '[/tab][/tabgroup]'; 
			}
			else {
				shortcode += '[/tab]';
			}

			tinyMCE.activeEditor.execCommand( 'mceInsertContent', 0, shortcode );
			tb_remove();
		} );
	} );
 } )();
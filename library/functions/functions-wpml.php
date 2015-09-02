<?php


/**
 * ----------------------------------------------------------------------------------------
 * Language switcher
 * ----------------------------------------------------------------------------------------
 */
if( !function_exists('languages_list_header')) {

	function languages_list_header(){
		if(function_exists('icl_get_languages')) {
			$languages = icl_get_languages('skip_missing=0&orderby=code');
			if(!empty($languages)){
				echo '<div class="language"><ul>';
				echo '<li>' . __('Language: ', 'sptheme') . '</li>';
				foreach($languages as $l){
					echo '<li class="'.$l['language_code'].'">';

					if(!$l['active']) echo '<a href="'.$l['url'].'" title="' . $l['native_name'] . '">';
					echo '<img src="' . $l['country_flag_url'] . '" alt="' . $l['native_name'] . '" />';
					if(!$l['active']) echo '</a>';

					echo '</li>';
				}
				echo '</ul></div>';
			}
		} else {
			return null; // Activate WMPL plugin
		}
	}

}


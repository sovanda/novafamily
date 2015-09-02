<form method="get" class="searchform" action="<?php echo home_url('/'); ?>">
	<div>
		<input type="text" class="search" name="s" onblur="if(this.value=='')this.value='<?php _e('To search type and hit enter',SP_TEXT_DOMAIN); ?>';" onfocus="if(this.value=='<?php _e('To search type and hit enter',SP_TEXT_DOMAIN); ?>')this.value='';" value="<?php _e('To search type and hit enter',SP_TEXT_DOMAIN); ?>" />
	</div>
</form>
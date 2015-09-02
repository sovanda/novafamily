<?php
/**
 * The sidebar containing the main widget area.
 */

global $post;
?>

<?php 
	$choice_sidebar = sp_sidebar_primary();
	$choice_layout = sp_layout_class();
	if ( $choice_layout != 'col-1c'):
?>

	<aside id="sidebar" class="sidebar" role="complementary">
	<?php if ( is_active_sidebar($choice_sidebar) ) :	
			dynamic_sidebar($choice_sidebar);
		else:?>	
			<div class="non-widget widget">
		     <h3><?php _e('Sidebar ', SP_TEXT_DOMAIN); ?></h3>
		    <p class="noside"><?php _e('To edit this sidebar, go to admin backend\'s <strong><em>Appearance -&gt; Widgets</em></strong> and place widgets into the <strong><em> sidebar </em></strong> Area', SP_TEXT_DOMAIN); ?></p>
		    </div>
	<?php endif; ?>
	</aside> <!--End #Sidebar-->

<?php endif; ?>
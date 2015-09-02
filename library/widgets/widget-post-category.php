<?php

add_action( 'widgets_init', 'sp_post_category_widget' );
function sp_post_category_widget() {
	register_widget( 'sp_widget_post_category' );
}

/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/

class sp_widget_post_category extends WP_Widget {
	/*
	*****************************************************
	* widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-widget-custom-posts';
		$prefix = SP_THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Post by category', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-widget-custom-posts',
			'description' => __( 'A widget to latest post with thumbnail by category','sptheme_widget' )
			);
		$control_ops = array();

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
		
	}
		
		
	function widget( $args, $instance) {
		extract ($args);
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title']);
		$category = $instance['category'];
		$thumb = $instance['thumb'];
		$post_num = $instance['post_num'];
		
		/* Before widget (defined by themes). */
		$out = $before_widget;
		
		/* Title of widget (before and after define by theme). */
		if ( $title )
			$out .= $before_title . $title . $after_title;

		$out .= sp_last_posts_cat( $post_num , $thumb , $category );
	
		/* After widget (defined by themes). */		
		$out .= $after_widget;

		echo $out;
	}	
	
	/**
	 * Update the widget settings.
	 */	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['category'] = implode(',' , $new_instance['category'] );
		$instance['thumb'] = strip_tags( $new_instance['thumb'] );
		$instance['post_num'] = strip_tags( $new_instance['post_num'] );
		
		return $instance;
	}
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */	
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 
			'title' => 'Recently posts', 
			'category' => '1', 
			'thumb' => 'true',
			'post_num' => '5');
		$instance = wp_parse_args( (array) $instance, $defaults); 

		$categories_obj = get_categories();
		$categories = array();

		foreach ($categories_obj as $pn_cat) {
			$categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
		}

		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'sptheme_widget') ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'post_num' ); ?>">Number of posts: </label>
			<input id="<?php echo $this->get_field_id( 'post_num' ); ?>" name="<?php echo $this->get_field_name( 'post_num' ); ?>" value="<?php echo $instance['post_num']; ?>" type="text" size="3" />
		</p>
		<p>
			<?php $category = explode ( ',' , $instance['category'] ) ; ?>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>">Category: </label>
			<select multiple="multiple" id="<?php echo $this->get_field_id( 'category' ); ?>[]" name="<?php echo $this->get_field_name( 'category' ); ?>[]">
				<?php foreach ($categories as $key => $option) { ?>
				<option value="<?php echo $key ?>" <?php if ( in_array( $key , $category ) ) { echo ' selected="selected"' ; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'thumb' ); ?>">Display Thumbinals: </label>
			<input id="<?php echo $this->get_field_id( 'thumb' ); ?>" name="<?php echo $this->get_field_name( 'thumb' ); ?>" value="<?php echo ( $instance['thumb'] ) ? 'true' : 'false'; ?>" <?php if( $instance['thumb'] ) echo 'checked="checked"'; ?> type="checkbox" />
		</p>

        
	   <?php 
    }
} //end class
?>
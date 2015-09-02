<?php

add_action( 'widgets_init', 'sp_assistant_widget' );
function sp_assistant_widget() {
	register_widget( 'sp_widget_assistant' );
}

/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/

class sp_widget_assistant extends WP_Widget {
	/*
	*****************************************************
	* widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-widget-assistant';
		$prefix = SP_THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Assistant', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-widget-assistant',
			'description' => __( 'A widget that allows to view assistant information','sptheme_widget' )
			);
		$control_ops = array();

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
		
	}
		
		
	function widget( $args, $instance) {
		extract ($args);
		
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title']);
		$desc = apply_filters( 'widget_textarea', empty( $instance['desc'] ) ? '' : $instance['desc'], $instance );
		$call_assistant_1 = $instance['call_assistant_1'];
		$call_assistant_2 = $instance['call_assistant_2'];
		
		/* Before widget (defined by themes). */
		$out = $before_widget;
		
		/* Title of widget (before and after define by theme). */
		if ( $title )
			$out .= $before_title . $title . $after_title;

		$out .= wpautop($desc);
		$out .= '<div class="call-assistant">' . $call_assistant_1 . '</div>';
		if ( $call_assistant_2 != '' )
			$out .= '<div class="call-assistant">' . $call_assistant_2 . '</div>';
	
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
		$instance['desc'] = strip_tags( $new_instance['desc'] );
		$instance['call_assistant_1'] = strip_tags( $new_instance['call_assistant_1'] );
		$instance['call_assistant_2'] = strip_tags( $new_instance['call_assistant_2'] );
		
		return $instance;
	}
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */	
	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Need Assistance?', 'desc' => 'Our team is 24/7 at your service to help you with your issues or answer any related questions.', 'call_assistant_1' => '023 990 225', 'call_assistant_2' => '010 888 876');
		$instance = wp_parse_args( (array) $instance, $defaults); ?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'sptheme_widget') ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  class="widefat">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Descriptoin:', 'sptheme_widget') ?></label>
		<textarea id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" class="widefat" rows="5"><?php echo $instance['desc']; ?></textarea> 
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'call_assistant_1' ); ?>"><?php _e('Call line 1:', 'sptheme_widget') ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'call_assistant_1' ); ?>" name="<?php echo $this->get_field_name( 'call_assistant_1' ); ?>" value="<?php echo $instance['call_assistant_1']; ?>" class="widefat">
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'call_assistant_2' ); ?>"><?php _e('Call line 2: (Optional)', 'sptheme_widget') ?></label>
		<input type="text" id="<?php echo $this->get_field_id( 'call_assistant_2' ); ?>" name="<?php echo $this->get_field_name( 'call_assistant_2' ); ?>" value="<?php echo $instance['call_assistant_2']; ?>" class="widefat">
		</p>

        
	   <?php 
    }
} //end class
?>
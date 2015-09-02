<?php

add_action( 'widgets_init', 'sp_image_link_widget' );
function sp_image_link_widget() {
    register_widget( 'sp_widget_image_link' );
}

/*
*****************************************************
*      WIDGET CLASS
*****************************************************
*/

class sp_widget_image_link extends WP_Widget {
	/*
	*****************************************************
	*      widget constructor
	*****************************************************
	*/
	function __construct() {
		$id     = 'sp-widget-image-link';
		$prefix = SP_THEME_NAME . ': ';
		$name   = '<span>' . $prefix . __( 'Image Link', 'sptheme_widget' ) . '</span>';
		$widget_ops = array(
			'classname'   => 'sp-widget-image-link',
			'description' => __( 'Arbitrary link with a simple image', 'sptheme_widget' )
			);
		$control_ops = array();

		//$this->WP_Widget( $id, $name, $widget_ops, $control_ops );
		parent::__construct( $id, $name, $widget_ops, $control_ops );
		
		wp_enqueue_style( 'thickbox' );
        wp_enqueue_script( 'media-upload' );
        wp_enqueue_script( 'thickbox' );
        // wp_enqueue_script('media_upload');
        add_action( 'admin_print_footer_scripts', array( &$this, 'add_script_image_link' ), 999 );
		
	} // /__construct
	
    
    function add_script_image_link()
    {
        ?>   
        <script type="text/javascript"> 

            /*jQuery(document).ready(function($){

                $('.upload-image').click(function(e) {
                    var send_attachment_bkp = wp.media.editor.send.attachment;
                    var button = $(this);
                    
                    wp.media.editor.send.attachment = function(props, attachment) {
                        button.siblings('input[type=text]').val(attachment.url);
                    }
             
                    wp.media.editor.open(button);
                    return false;     
                });

            });*/                

            jQuery(document).ready(function($){
                             
                 $('.upload-image').live('click', function(){
                    var sp_this_object = $(this).prev();
                    
                    tb_show('', 'media-upload.php?post_id=0&type=image&TB_iframe=true');    
                
                    window.send_to_editor = function(html) {
                        imgurl = $('img', html).attr('src');
                        sp_this_object.val(imgurl);
                        
                        tb_remove();
                    }          
                    
                    return false;
                });
  
            });  
        </script> 
        <?php
    }
    
    function form( $instance )
    {
        global $icons_name;
        
        /* Impostazioni di default del widget */
        $defaults = array( 
            'title' => '',
            'image' => '',
			'link'	=> ''
        );
        
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
       
       <p>
            <label>
                <strong><?php _e( 'Title', 'sptheme' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
            </label>
        </p>  
       <p>
            <label><?php _e( 'Image', 'sptheme_widget' ) ?>:
                <input type="text" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" value="<?php echo $instance['image']; ?>" />
                <a href="media-upload.php?type=image&TB_iframe=true" class="upload-image button-secondary">Upload</a><br />
                <small>Good size is 300px wide and unlimited of height</small>
            </label>
        </p>
        
        <p>
            <label>
                <strong><?php _e( 'Link', 'sptheme_widget' ) ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
            </label>
        </p>
        
        <?php
    }
    
    function widget( $args, $instance )
    {
        extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$link = esc_attr($instance['link']);
		$img_src = $instance['image'];
		
		echo $before_widget;                   
		
		/* Title of widget (before and after define by theme). */
		if ( $title )
			echo $before_title . $title . $after_title;
			
		$widget_body = '<a href="' . $link . '"><img src="' . $img_src . '" /></a>';
		echo apply_filters( 'widget_text', $widget_body );
		
        
        echo $after_widget;
    }                     

    function update( $new_instance, $old_instance ) 
    {
        $instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
        $instance['image'] = $new_instance['image'];
        $instance['link'] = $new_instance['link'];
        return $instance;
    }
    
}     
?>

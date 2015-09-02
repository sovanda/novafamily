<?php

/*  Initialize the meta boxes.
/* ------------------------------------ */
add_action( 'admin_init', '_custom_meta_boxes' );

function _custom_meta_boxes() {

	$prefix = 'sp_';
  
/*  Custom meta boxes
/* ------------------------------------ */
$page_layout_options = array(
	'id'          => 'page-options',
	'title'       => 'Page Options',
	'desc'        => '',
	'pages'       => array( 'page', 'post' ),
	'context'     => 'normal',
	'priority'    => 'default',
	'fields'      => array(
		array(
			'label'		=> 'Primary Sidebar',
			'id'		=> $prefix . 'sidebar_primary',
			'type'		=> 'sidebar-select',
			'desc'		=> 'Overrides default'
		),
		array(
			'label'		=> 'Layout',
			'id'		=> $prefix . 'layout',
			'type'		=> 'radio-image',
			'desc'		=> 'Overrides the default layout option',
			'std'		=> 'inherit',
			'choices'	=> array(
				array(
					'value'		=> 'inherit',
					'label'		=> 'Inherit Layout',
					'src'		=> SP_ASSETS . '/images/admin/layout-off.png'
				),
				array(
					'value'		=> 'col-1c',
					'label'		=> '1 Column',
					'src'		=> SP_ASSETS . '/images/admin/col-1c.png'
				),
				array(
					'value'		=> 'col-2cl',
					'label'		=> '2 Column Left',
					'src'		=> SP_ASSETS . '/images/admin/col-2cl.png'
				),
				array(
					'value'		=> 'col-2cr',
					'label'		=> '2 Column Right',
					'src'		=> SP_ASSETS . '/images/admin/col-2cr.png'
				)
			)
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: video
/* ---------------------------------------------------------------------- */
$post_format_video = array(
	'id'          => 'format-video',
	'title'       => 'Format: Video',
	'desc'        => 'These settings enable you to embed videos into your posts.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Video URL',
			'id'		=> $prefix . 'video_url',
			'type'		=> 'text',
			'desc'		=> 'Enter Video Embed URL from youtube, vimeo or dailymotion'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Audio
/* ---------------------------------------------------------------------- */
$post_format_audio = array(
	'id'          => 'format-audio',
	'title'       => 'Format: Audio',
	'desc'        => 'These settings enable you to embed audio into your posts. You must provide both .mp3 and .ogg/.oga file formats in order for self hosted audio to function accross all browsers.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Audio URL',
			'id'		=> $prefix . 'audio_url',
			'type'		=> 'upload',
			'desc'		=> 'You can get sound or audio URL from soundcloud'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Gallery
/* ---------------------------------------------------------------------- */
$post_format_gallery = array(
	'id'          => 'format-gallery',
	'title'       => 'Format: Gallery',
	'desc'        => 'Standard post galleries.</i>',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Upload photo',
			'id'		=> $prefix . 'post_gallery',
			'type'		=> 'gallery',
			'desc'		=> 'Upload photos'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: Chat
/* ---------------------------------------------------------------------- */
$post_format_chat = array(
	'id'          => 'format-chat',
	'title'       => 'Format: Chat',
	'desc'        => 'Input chat dialogue.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Chat Text',
			'id'		=> $prefix . 'chat',
			'type'		=> 'textarea',
			'rows'		=> '2'
		)
	)
);
/* ---------------------------------------------------------------------- */
/*	Post Format: Link
/* ---------------------------------------------------------------------- */
$post_format_link = array(
	'id'          => 'format-link',
	'title'       => 'Format: Link',
	'desc'        => 'Input your link.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Link Title',
			'id'		=> $prefix . 'link_title',
			'type'		=> 'text'
		),
		array(
			'label'		=> 'Link URL',
			'id'		=> $prefix . 'link_url',
			'type'		=> 'text'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Post Format: quote
/* ---------------------------------------------------------------------- */
$post_format_quote = array(
	'id'          => 'format-quote',
	'title'       => 'Format: Quote',
	'desc'        => 'Input your quote.',
	'pages'       => array( 'post' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Quote',
			'id'		=> $prefix . 'quote',
			'type'		=> 'textarea',
			'rows'		=> '2'
		),
		array(
			'label'		=> 'Quote Author',
			'id'		=> $prefix . 'quote_author',
			'type'		=> 'text'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Portfolio post type
/* ---------------------------------------------------------------------- */
$post_type_portfolio = array(
	'id'          => 'project-setting',
	'title'       => 'Project meta',
	'desc'        => '',
	'pages'       => array( 'sp_portfolio' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Project slide',
			'id'		=> $prefix . 'project_slide',
			'type'		=> 'upload',
			'desc'		=> 'Upload photo to show in project slideshow'
		),
		array(
			'label'		=> 'Project detail photos',
			'id'		=> $prefix . 'project_gallery',
			'type'		=> 'gallery',
			'desc'		=> 'Upload list of photos to show in project detail page'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Gallery post type
/* ---------------------------------------------------------------------- */
$post_type_gallery = array(
	'id'          => 'gallery-setting',
	'title'       => 'Gallery meta',
	'desc'        => '',
	'pages'       => array( 'sp_gallery' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(
		array(
			'label'		=> 'Upload photos',
			'id'		=> $prefix . 'cp_gallery',
			'type'		=> 'gallery',
			'desc'		=> 'Upload gallery photos'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Metabox for about template
/* ---------------------------------------------------------------------- */
$page_template_about = array(
	'id'          => 'about-settings',
	'title'       => 'About settings',
	'desc'        => '',
	'pages'       => array( 'page' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(

		
		array(
			'label'		=> 'Team Gallery',
			'id'		=> $prefix . 'team_gallery',
			'type'		=> 'custom-post-type-select',
			'post_type' => 'sp_gallery',
		)
		
	)
);

/* ---------------------------------------------------------------------- */
/*	Metabox for client
/* ---------------------------------------------------------------------- */
$post_type_gallery = array(
	'id'          => 'client-settings',
	'title'       => 'Client meta',
	'desc'        => '',
	'pages'       => array( 'sp_client' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(

		
		array(
			'label'		=> 'Link Client',
			'id'		=> $prefix . 'link_client',
			'type'		=> 'text',
			'std'		=> '#',
			'desc'		=> 'Enter link of client e.g. www.novacambodia.com'
		)
		
	)
);

/* ---------------------------------------------------------------------- */
/*	Metabox for Home template
/* ---------------------------------------------------------------------- */
$page_template_home = array(
	'id'          => 'home-settings',
	'title'       => 'Home settings',
	'desc'        => '',
	'pages'       => array( 'page' ),
	'context'     => 'normal',
	'priority'    => 'high',
	'fields'      => array(

		array(
			'label'		=> 'Projects',
			'id'		=> $prefix . 'slide_options',
			'type'		=> 'tab'
		),
		array(
			'label'		=> 'Number of Slide to show',
			'id'		=> $prefix . 'slide_num',
			'type'		=> 'text',
			'std'		=> '4',
			'desc'		=> 'Enter number of slide e.g. 5'
		),
		array(
			'label'		=> 'Number of Slide to show',
			'id'		=> $prefix . 'slide_effect',
			'type'		=> 'select',
			'std'		=> '',
			'desc'		=> '',
			'choices'     => array( 
	          array(
	            'value'       => 'fade',
	            'label'       => 'Fade',
	            'src'         => ''
	          ),
	          array(
	            'value'       => 'slide',
	            'label'       => 'Slide',
	            'src'         => ''
	          )
	        )
		),
		
		array(
			'label'		=> 'Clients',
			'id'		=> $prefix . 'client_options',
			'type'		=> 'tab'
		), 
		array(
			'label'		=> 'Section title',
			'id'		=> $prefix . 'client_title',
			'type'		=> 'text',
			'std'		=> 'Current and past clients'
		),
		/*array(
			'label'		=> 'Client page',
			'id'		=> $prefix . 'client_page_id',
			'type'		=> 'page-select'
		),*/
		array(
			'label'		=> 'Number of partner\'s logo',
			'id'		=> $prefix . 'client_num',
			'type'		=> 'text',
			'std'		=> '-1',
			'desc'		=> 'Enter number of client message e.g. 10'
		)
	)
);

/* ---------------------------------------------------------------------- */
/*	Return meta box option base on page template selected
/* ---------------------------------------------------------------------- */
function rw_maybe_include() {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	$template = get_post_meta( $post_id, '_wp_page_template', true );

	return $template;
}

/*  Register meta boxes
/* ------------------------------------ */
	ot_register_meta_box( $post_format_audio );
	ot_register_meta_box( $post_format_chat );
	ot_register_meta_box( $post_format_gallery );
	ot_register_meta_box( $post_format_link );
	ot_register_meta_box( $post_format_quote );
	ot_register_meta_box( $post_format_video );
	ot_register_meta_box( $post_type_portfolio );
	ot_register_meta_box( $post_type_gallery );
	ot_register_meta_box( $post_type_client );

	$template_file = rw_maybe_include();
	if ( $template_file == 'template-home.php' ) {
	    ot_register_meta_box( $page_template_home );
	} elseif ( $template_file == 'template-about.php' ) {
		ot_register_meta_box( $page_template_about );
	} else {
		ot_register_meta_box( $page_layout_options );
	}
}
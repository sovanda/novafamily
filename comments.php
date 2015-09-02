<?php
/*---------------------------------
	Comments template
------------------------------------*/
?>

<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments.', SP_TEXT_DOMAIN ); ?></p>
<?php
		return;
	endif;
?>

	<div id="comments">
	
		<?php if ( have_comments() ) : ?>
		
			<h3 id="comments-title" class="icon-none closed" data-show="<?php _e('Show Comments', SP_TEXT_DOMAIN); ?>" data-hide="<?php _e('Hide Comments', SP_TEXT_DOMAIN); ?>" data-no="<?php echo get_comments_number();?>"><?php _e('Comments', SP_TEXT_DOMAIN); ?> (<?php echo get_comments_number();?>)</h3>

		<?php else : 
			if ( ! comments_open() ) {
				_e('Comments are closed.', SP_TEXT_DOMAIN);
			} else {
				?>
				<h3 id="comments-title" class="icon-none closed" data-show="<?php _e('Show Comments', SP_TEXT_DOMAIN); ?>" data-hide="<?php _e('Hide Comments', SP_TEXT_DOMAIN); ?>" data-no="0"><?php _e('Comments', SP_TEXT_DOMAIN); ?> (0)</h3>

			<?php }
		?>

		<?php endif; // end have_comments() ?>

		<div id="commentsShow">

			<?php if ( !have_comments() ) : ?>

				<p style="margin:35px 0"><?php _e('There are not comments on this post yet. Be the first one!', SP_TEXT_DOMAIN); ?></p>

			<?php endif; ?>

			<ol id="singlecomments" class="commentlist"><?php wp_list_comments( array( 'callback' => 'sp_comment_template' ) ); ?></ol>

			<div class="comment-form-wrapper">

			<?php 
			
			 $defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
				'author' => '<div class="one-third"><label for="autor">' . __('Name', SP_TEXT_DOMAIN) . '<span> ' . __(' (required)', SP_TEXT_DOMAIN) . '</span></label><input id="author" name="author" type="text" value=""/></div>',
				'email'  => '<div class="one-third"><label for="email">' . __('Email', SP_TEXT_DOMAIN) . '<span> ' . __(' (required)', SP_TEXT_DOMAIN) . '</span></label><input id="email" name="email" type="text" value="" /></div>',
				'url'    => '<div class="one-third last"><label for="url">' . __('Website', SP_TEXT_DOMAIN) . '<span> ' . __(' (optional)', SP_TEXT_DOMAIN) . '</span></label><input id="url" name="url" type="text" value="" /></div>' ) ),
				'comment_field' => '<div><label for="comment">' . __('Your Message', SP_TEXT_DOMAIN) . '<span> ' . __(' (required)', SP_TEXT_DOMAIN) . '</span></label><textarea id="comment" name="comment" rows="8"></textarea></div>',
				'must_log_in' => '<p style="margin-bottom:25px" class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'logged_in_as' => '<p style="margin-bottom:25px" class="logged-in-as">' . sprintf( __( 'You are logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
				'comment_notes_before' => '',
				'comment_notes_after' => '',
				'id_form' => 'comment-form',
				'id_submit' => 'submit',
				'title_reply' => __( 'Add Your Comment', SP_TEXT_DOMAIN ),
				'title_reply_to' => __( 'Leave a Reply to %s', SP_TEXT_DOMAIN ),
				'cancel_reply_link' => __( 'Cancel reply', SP_TEXT_DOMAIN ),
				'label_submit' => __( 'Submit', SP_TEXT_DOMAIN ),
			); 
			
			comment_form($defaults); 
			
			?>

			</div>

		</div>	
		
	</div>

	
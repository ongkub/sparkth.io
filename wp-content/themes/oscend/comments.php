<?php
/*** The template for displaying comments ***/

if ( post_password_required() ) {
	return;
}

$oscend_blog_css_animation = ( oscend_get_option('css_animation_settings_blog', '') != '' ) ? ' wow '.oscend_get_option('css_animation_settings_blog', '') : '';
?>


<?php if ( have_comments() ) : ?>
<div id="comments" class="comments <?php echo esc_attr($oscend_blog_css_animation); ?>">
	<div class="row">
		<div class="col-md-12">
			<h5 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( $comments_number == 1 ) :
					esc_html_e( 'Post comment', 'oscend' );
				else :
					esc_html_e( 'Post comments', 'oscend' );
				endif;
				?>
				<span><?php echo ': ' . esc_html($comments_number); ?></span>
			</h5>
		</div>
	</div>

	<ul class="comment-list">
		<?php
			wp_list_comments( array(
				'short_ping'   => true,
				'style'        => 'ul',
				'callback'     => 'oscend_comments_callback',
				'end-callback' => 'oscend_comments_end_callback'
			) );
		?>
	</ul><!-- .comment-list -->

	<ul class="pager">
		<li><?php previous_comments_link( esc_html__( 'Older comments', 'oscend' ) ); ?></li>
		<li><?php next_comments_link( esc_html__( 'Newer comments', 'oscend' ) ); ?></li>
	</ul>
</div>
<?php endif; // Check for have_comments(). ?>

<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'oscend' ); ?></p>
<?php endif; ?>

<div class="oscend-comment-form <?php echo esc_attr($oscend_blog_css_animation); ?>">

	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html_req = ( $req ? " required='required'" : '' );
		$fields =  array(
			'author' => '<div class="row"><div class="col-md-6"><div class="form-group">' .
			'<input id="author" class="form-control" name="author" type="text" placeholder="' . esc_html__( 'Your name', 'oscend' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" autocomplete="on" tabindex="2" ' . $aria_req . $html_req . ' /></div></div>',
			'email'  => '<div class="col-md-6"><div class="form-group">'.
			'<input id="email" class="form-control" name="email" type="text" placeholder="' . esc_html__( 'Your email', 'oscend' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" autocomplete="on" tabindex="3" ' . $aria_req . $html_req . ' /></div></div>',
			'url'    => '<div class="col-md-6"><div class="form-group">'.
			'<input id="url" class="form-control" name="url" type="text" placeholder="' . esc_html__( 'Your website', 'oscend' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" autocomplete="on" tabindex="4"' . $aria_req . ' /></div></div></div>',
			);

		$comments_args = array(
			'fields' =>  $fields,
			'comment_field' => '<div class="row"><div class="col-md-12"><div class="form-group"><textarea id="comment" class="form-control" name="comment" cols="45" rows="5" aria-required="true" required="required" placeholder="' . esc_html__( 'Your comment', 'oscend' ) . '" ></textarea></div></div></div>',
			'title_reply_before'   => '<h5 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h5>',
			'submit_button'        => '<div class="row"><div class="col-md-12"><div class="form-group"><button type="submit" class="btn btn-default" id="%2$s" name="%1$s">' . esc_html__( 'Send comment', 'oscend' ) . '</button></div></div></div>',
			'submit_field'  => '<span class="form-submit">%1$s %2$s</span>'
		);

		comment_form( $comments_args );
	 ?>

</div>
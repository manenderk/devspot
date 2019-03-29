<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DevSpot
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$devspot_comment_count = get_comments_number();
			if ( '1' === $devspot_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'devspot' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $devspot_comment_count, 'comments title', 'devspot' ) ),
					number_format_i18n( $devspot_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'style'      => 'ol',
				'short_ping' => true,
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'devspot' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$args = array(
		'fields' => apply_filters(
			'comment_form_default_fields', array(
				'author' => 	'<div class="form-group"> <input id="author" placeholder="Your Name (Required)" class="form-control" name="author" type="text" value="' . 
								esc_attr( $commenter['comment_author'] ) . '" size="30" required/>'
								. '</div>',
				'email'  => 	'<div class="form-group"> <input id="email" placeholder="Your Email (Required)" class="form-control" name="email" type="email" value="' . 
								esc_attr( $commenter['comment_author_email'] ) . '" size="50" required />'
								. '</div>',
				'url'    =>		'<div class="form-group"> <input id="url" placeholder="Your website address" class="form-control" name="url" type="text" value="' . 
								esc_attr( $commenter['comment_author_url'] ) . '" size="100" />'
								. '</div>',
				'cookies'=> 	'<div class="form-group custom-control custom-checkbox">
									<input class="custom-control-input" id="wp-comment-cookies-consent" type="checkbox">
									<label class="custom-control-label" for="wp-comment-cookies-consent">
									<span>Save my name, email, and website in this browser for the next time I comment</span>
									</label>
								</div>'
			)
		),
		'comment_field'	=> '<div class="form-group"> <textarea id="comment" placeholder="Your Comment (Required)" class="form-control" name="comment" rows="5" required></textarea></div>',
		'title_reply' 	=> '<div class="crunchify-text"> <h5>Please Post Your Comments & Reviews</h5></div>',
		'class_submit'	=> 'btn btn-1 btn-primary',
		'comment_notes_before' => 'Your email address will not be published'
	);
	comment_form($args, $post->ID);
	?>

</div><!-- #comments -->

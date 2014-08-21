<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package fashion
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

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
			<div class="grid-title">
                <div class="grid-icon"></div>
                <h2><?php _e('Comments','fashion');?></h2>
            </div>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'fashion' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'fashion' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'fashion' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<ul class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use fashion_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define fashion_comment() and that will be used instead.
				 * See fashion_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( 'type=comment&callback=custom_comment' );
			?>
		</ul><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'fashion' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'fashion' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'fashion' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'fashion' ); ?></p>
	<?php endif; ?>
	<?php
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$fields =  array(
			'author' => '<input type="text" name="author" placeholder="'.__("username","fashion").'" class="reply-input" value="'. esc_attr( $commenter['comment_author'] ) . '" '.$aria_req.'>',
			'email'  => '<input type="text" name="email" placeholder="'.__("E-mail","fashion").'" class="reply-input" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" '.$aria_req.'>',
			'url' => '<input type="text" name="website" placeholder="'.__("website","fashion").'" class="reply-input" value="'. esc_attr( $commenter['comment_author_url'] ) . '" '.$aria_req.'>'
		);
 
	$comments_args = array(
		'fields' =>  $fields,
		'title_reply'=>'<div class="grid-title">
                <div class="grid-icon"></div>
                <h2>'.__('leave a reply','fashion').'</h2>
            </div>',
		'comment_notes_after' => '',
		'comment_field' => '<textarea name="comment" placeholder="'.__("Comments","fashion").'" class="reply-comment"></textarea>',
		'id_submit' => 'reply-submit',
		'label_submit' => 'submit'
	);
   echo '<div class="reply-form">
             <div class="repling-form">';
			comment_form($comments_args);		
    echo '</div></div>';
               
   ?>
</div><!-- #comments -->
<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Perfect Couple
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>

<div id="comments" class="container">
	<div class="row">
		<div class="col-sm-12">
			<hr>
			<?php if ( have_comments() ) : ?>
				<h3 class="text-center"><?php comments_number( __('No Comments', 'pc'), __('1 Comment', 'pc'), __('% Comments', 'pc') ); ?></h3>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<nav id="comment-nav-above" class="comment-navigation" role="navigation">
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pc' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pc' ) ); ?></div>
				</nav>
				<?php endif; // check for comment navigation ?>

				<ul class="comment-list media-list"><?php
					wp_list_comments( array(
						'style'      => 'ul',
						'short_ping' => true,
						'callback'   => 'pc_comment',
						'max_depth'  => 3
					) );
				?>
				</ul><!-- .comment-list -->

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
				<nav id="comment-nav-below" class="comment-navigation" role="navigation">
					<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'pc' ); ?></h1>
					<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'pc' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'pc' ) ); ?></div>
				</nav><!-- #comment-nav-below -->
				<?php endif; // check for comment navigation ?>

			<?php endif; // have_comments()
			
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );

			// Custom Fields
			$fields =  array(
				'author'=> '<div class="form-group col-sm-4"><input name="author" class="form-control" type="text" placeholder="' . __('Name*', 'pc') . '" size="30"' . $aria_req . '></div>',
				'email'=> '<div class="form-group col-sm-4"><input name="email" class="form-control" type="text" placeholder="' . __('Email*', 'pc') . '" size="30"' . $aria_req . '></div>',
				'website'=> '<div class="form-group col-sm-4"><input name="website" class="form-control" type="text" placeholder="' . __('Website', 'pc') . '" size="30"></div>',
			);

			//Comment Form Args
		    $comments_args = array(
		    	'comment_notes_before' => '',
		    	'comment_notes_after' => '',
				'fields' => $fields,
				'title_reply'=> '<div class="text-center"><hr><h3>' . __('Write a Comment', 'pc') . '</h3></div>',
				'comment_field' => '<div class="row"><div class="form-group col-sm-12"><textarea id="comment" name="comment" class="form-control" cols="10" rows="5" tabindex="4"' . $aria_req . '></textarea></div>',
				'label_submit' => __('Submit','pc')
			);
			
			comment_form($comments_args); ?>

		</div>
	</div>
</div>
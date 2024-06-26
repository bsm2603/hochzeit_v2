<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package pc
 */

if ( ! function_exists( 'pc_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function pc_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<ul class="pagination text-center"><?php
			if ( get_next_posts_link() ) : 
			?><li><?php next_posts_link( __( '&laquo; Previous', 'pc' ) ); ?></li><?php
			endif;

			if ( get_previous_posts_link() ) :
			?><li><?php previous_posts_link( __( 'Next &raquo;', 'pc' ) ); ?></li><?php
			endif;

		?></ul>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'pc_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function pc_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<ul class="paging">
			<?php
				previous_post_link( '<li class="pull-left">%link</li>', _x( '&laquo; %title', 'Previous post', 'pc' ) );
				next_post_link( '<li class="pull-right">%link</li>', _x( '%title &raquo;', 'Next post', 'pc' ) );
			?>
		</ul>
	</nav>
	<?php
}
endif;

if ( ! function_exists( 'pc_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function pc_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'pc' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function pc_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'pc_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'pc_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so pc_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so pc_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in pc_categorized_blog.
 */
function pc_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'pc_categories' );
}
add_action( 'edit_category', 'pc_category_transient_flusher' );
add_action( 'save_post',     'pc_category_transient_flusher' );

/**
 * Comments.
 */    
function pc_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class('media'); ?> id="li-comment-<?php comment_ID() ?>">
        <div class="pull-left"><?php echo get_avatar($comment, 170); ?></div>
        <article id="comment-<?php comment_ID(); ?>" class="media-body">
            <header class="comment-meta">
                <h6 class="media-heading">
                	<span class="pull-right"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="fa fa-reply"></i>'))) ?></span>
                    <?php printf( __( '%s', 'pc'), get_comment_author_link() ); ?>
                </h6>
                <p class="post-meta"><i class="fa fa-calendar"></i><?php printf(__('%1$s', 'pc'), get_comment_date('F j, Y - g:ia') ) ?></p>
            </header>

            <div class="comment-content"><?php
                comment_text();
                if ( $comment->comment_approved == '0' ) : ?>
                    <p><?php _e( 'Your comment is awaiting moderation.', 'pc' ) ?></p><?php
                endif; ?>
                <?php edit_comment_link( __( '(Edit)', 'pc'),'  ','' ) ?>
            </div>
                      
       </article>
    </li><?php
}
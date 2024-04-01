<?php
/**
 * @package Perfect Couple
 */

$event_date = get_post_meta( $post->ID, 'pc_event-date', true ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
<?php if( has_post_thumbnail() ) { ?>
	<div class="col-sm-4" data-scroll-reveal="enter from the left"><?php the_post_thumbnail('blog', array('class' => 'img-responsive img-rounded')); ?></div>
<?php } ?>
	<div class="<?php if( has_post_thumbnail() ) { ?>col-sm-8<?php } else { ?>col-sm-12<?php } ?>" data-scroll-reveal="enter from the right after 0.5s">
		<?php if( !empty($event_date) ) {
			the_title( '<h6 class="post-header"><span>' . esc_attr( $event_date ) . '</span> <a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' );
		} else {
			the_title( '<h6 class="post-header"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h6>' );
		}
		get_template_part( 'inc/post-meta' ); ?>
		<div class="post-intro"><?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content('');
			}

			wp_link_pages( array(
				'before'           => '<ul class="pagination">',
				'after'            => '</li></ul>',
				'next_or_number'   => 'number',
				'separator'        => '</li><li>',
				'nextpagelink'     => __( 'Next page', 'pc' ),
				'previouspagelink' => __( 'Previous page', 'pc' ),
				'pagelink'         => '%',
				'echo'             => 1
			));	
		?></div>
		<p class="post-button"><a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary btn-lg"><?php _e('Read more', 'pc'); ?></a></p>
	</div>
</article>
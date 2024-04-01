<?php
/**
 * @package Perfect Couple
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('container'); ?>>

	<div class="heading text-center" data-scroll-reveal>
		<?php the_title( '<h2>', '</h2>' ); ?>
		<p><span></span><i class="fa fa-heart"></i><span></span></p>
	</div>

	<div class="post-body" data-scroll-reveal><?php
		get_template_part( 'inc/post-meta' );
		the_content();

		wp_link_pages( array(
			'before'           => '<ul class="pagination">',
			'after'            => '</li></ul>',
			'next_or_number'   => 'number',
			'separator'        => '</li><li>',
			'nextpagelink'     => __( 'Next page', 'pc' ),
			'previouspagelink' => __( 'Previous page', 'pc' ),
			'pagelink'         => '%',
			'echo'             => 1
		)); ?>
	</div>
	<div class="row post-nav-links">
		<div class="col-xs-6" data-scroll-reveal="enter from the left">
			<?php previous_post_link('%link'); ?>
		</div>
		<div class="col-xs-6 text-right" data-scroll-reveal="enter from the right after 0.25s">
			<?php next_post_link('%link'); ?>
		</div>
	</div>

</article>
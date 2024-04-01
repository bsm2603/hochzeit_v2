<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Perfect Couple
 */

get_header(); ?>

<section><?php

	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() ) :
				comments_template();
			endif;

		endwhile;

	else :

		get_template_part( 'content', 'none' );

	endif; ?>

</section>

<?php get_footer(); ?>
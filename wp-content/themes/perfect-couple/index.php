<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Perfect Couple
 */

global $theme_pc;

get_header(); ?>

	<section id="blog">
		<div class="container"><?php

			$blog_page_title = get_the_title( get_option('page_for_posts', true) );

			if( !empty($blog_page_title) ) $blog_page_title = __('Blog', 'smartway');

			if( !empty( $blog_page_title ) ) { ?>
				<div class="heading text-center">
					<h2><?php echo esc_attr($blog_page_title); ?></h2>
					<p><span></span><i class="fa fa-heart"></i><span></span></p>
				</div>
			<?php } ?>
			
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php pc_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

		</div>
	</section>

<?php get_footer(); ?>

<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Scent
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
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
		?>
	</div>
	<?php edit_post_link( __( 'Edit', 'scent' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article>

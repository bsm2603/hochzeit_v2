<?php /* Template name: Section */

$section_page = get_post( $page->ID );

$css_classes = get_post_class('', $section_page->ID);
$css_classes[] = 'section-page';

?><section id="<?php echo esc_attr(pc_getPCPageID($section_page->ID)); ?>" class="<?php echo implode(" ", $css_classes); ?>">

	<div class="container">

		<?php if( get_post_meta( $section_page->ID, 'pc_disable-title', true ) != 'on' ) include(locate_template( 'inc/page-title-section.php' )); ?>

		<?php $content = apply_filters('the_content', $page->post_content); ?>

		<?php echo $content; ?>
	
	</div>

</section>
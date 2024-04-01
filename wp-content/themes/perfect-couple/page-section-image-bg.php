<?php /* Template name: Section: Image */

$section_page = get_post( $page->ID );

$css_classes = get_post_class('', $section_page->ID);
$css_classes[] = 'section-page';

$style = ' style="';

// Image BG Data

$bg_image = esc_url( get_post_meta( $section_page->ID, 'pc_bg-image', true ) );
if( !empty($bg_image) ) $style .= 'background-image:url(' . $bg_image . ');';

$bg_color = get_post_meta( $section_page->ID, 'pc_bg-color', true );
if( !empty($bg_color) ) $style .= 'background-color:' . $bg_color . ';';

$bg_repeat = get_post_meta( $section_page->ID, 'pc_bg-repeat', true );
if( !empty($bg_repeat) ) $style .= 'background-repeat:' . $bg_repeat . ';';

$bg_position = get_post_meta( $section_page->ID, 'pc_bg-position', true );
if( !empty($bg_position) ) $style .= 'background-position:' . $bg_position . ';';

$bg_size = get_post_meta( $section_page->ID, 'pc_bg-size', true );
if( !empty($bg_size) ) $style .= 'background-size:' . $bg_size . ';';

?><section id="<?php echo esc_attr(pc_getPCPageID($section_page->ID)); ?>" class="<?php echo implode(" ", $css_classes); ?>"><?php

	if( $style != ' style="' ) { ?>
		<div class="image-bg"<?php echo $style; ?>"></div>
	<?php } ?>

	<div class="container">

		<?php if( get_post_meta( $section_page->ID, 'pc_disable-title', true ) != 'on' ) include(locate_template( 'inc/page-title-section.php' )); ?>

		<?php $content = apply_filters('the_content', $page->post_content); ?>

		<?php echo $content; ?>
	
	</div>

</section>
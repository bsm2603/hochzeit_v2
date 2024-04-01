<?php $icon = get_post_meta( $section_page->ID, 'pc_page-icon', true ); ?>
<div class="heading" data-scroll-reveal>
	<h2><?php echo $page->post_title; ?></h2>
	<?php if( !empty( $icon ) ) { ?><p><span></span><i class="fa <?php echo $icon; ?>"></i><span></span></p><?php } ?>
</div>
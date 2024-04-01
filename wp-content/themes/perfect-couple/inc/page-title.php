<?php $icon = get_post_meta( get_the_ID(), 'pc_page-icon', true ); ?>
<div class="heading" data-scroll-reveal>
	<?php the_title( '<h2>', '</h2>' ); ?>
	<?php if( !empty( $icon ) ) { ?><p><span></span><i class="fa <?php echo $icon; ?>"></i><span></span></p><?php } ?>
</div>
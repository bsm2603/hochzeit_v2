<p class="post-meta">
	<span><i class="fa fa-calendar"></i><time datetime="<?php echo date(DATE_W3C); ?>"><?php the_time('F j, Y'); ?></time></span>
	<?php if( has_category() ) { ?><span><i class="fa fa-folder"></i><?php the_category(', '); ?></span><?php } ?>
	<?php if( has_tag() ) { ?><span><i class="fa fa-tags"></i><?php the_tags('', ', '); ?></span><?php } ?>
</p>
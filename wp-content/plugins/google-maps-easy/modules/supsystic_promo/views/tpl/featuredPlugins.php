<section id="supsystic-featured-plugins" class="supsystic-item supsystic-panel">
	<div class="supsysticPageBundleContainer container-fluid">
		<div class="bundle-text supMd7 supXs12"><?php _e('Get plugins bundle today and save over 80%', GMP_LANG_CODE)?></div>
		<div class="bundle-btn supMd5 supXs12">
			<a href="<?php echo esc_attr($this->bundleUrl);?>" class="btn btn-full btn-revert hvr-shutter-out-horizontal" target="_blank">
				<?php _e('Check It out', GMP_LANG_CODE)?>
			</a>
		</div>
	</div>
	<hr />
	<?php foreach($this->pluginsList as $p) { ?>
		<div class="catitem supMd4 supSm6 supXs12">
			<div class="download-product-item">
				<div class="dp-thumb text-center">
					<a href="<?php echo esc_attr($p['url'])?>" target="_blank">
						<img src="<?php echo esc_attr($p['img'])?>" class="img-responsive wp-post-image" alt="<?php echo esc_attr($p['label'])?>" />
					</a>
				</div>
				<div class="dp-title">
					<a href="<?php echo esc_attr($p['url'])?>" target="_blank">
						<?php echo esc_attr($p['label'])?>
					</a>
				</div>
				<div class="dp-excerpt">
					<div class="dp-excerpt-wrapper">
						<?php echo !empty($p['desc']) ? esc_attr($p['desc']) : ''?>
					</div>
				</div>
				<div class="dp-buttons">
					<a href="<?php echo esc_attr($p['url'])?>" target="_blank" class="btn btn-full hvr-shutter-out-horizontal <?php echo empty($p['download']) ? 'btn-center' : ''?>">
						<?php _e('More info', GMP_LANG_CODE)?>
					</a>
					<?php if(!empty($p['download'])) {?>
					<a href="<?php echo esc_attr($p['download'])?>" target="_blank" class="btn btn-full btn-info hvr-shutter-out-horizontal">
						<?php _e('Download', GMP_LANG_CODE)?>
					</a>
					<?php }?>
				</div>
			</div>
		</div>
	<?php }?>
	<div style="clear: both;"></div>
</section>

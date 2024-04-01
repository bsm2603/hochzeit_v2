<?php
/**
 * The Header for our theme.
 *
 * @package PerfectCouple
 */
?><!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php

/* Get theme options */
global $theme_pc; ?>

<?php wp_head(); ?>

</head><?php

// If page has an ID
if( get_the_ID() ) {

	// Get slider/video post ID for the current page
	$media_option_post_id = get_post_meta( get_the_ID(), 'pc_page_media', true );

	// If not media option (video or slider) then add .inner class to BODY
	$extra_body_class = '';
	if( !isset($media_option_post_id) || $media_option_post_id == 0 ) {
		$extra_body_class = 'inner';
	}

} ?><body data-spy="scroll" data-target=".navbar-collapse" <?php body_class( $extra_body_class ); ?>><?php

// If slider/video post is set
if( isset($media_option_post_id) && $media_option_post_id != 0 ) {

	// Get slider or video option
	$media_option = get_post_meta( $media_option_post_id, 'pc_media-option', true );
	// Get height of an option
	$height = get_post_meta( $media_option_post_id, 'pc_height', true );

	// Get welcome message texts
	$main_title = get_post_meta( $media_option_post_id, 'pc_main-title', true );
	$first_subtitle = get_post_meta( $media_option_post_id, 'pc_first-subtitle', true );
	$second_subtitle = get_post_meta( $media_option_post_id, 'pc_second-subtitle', true );
	$icon = get_post_meta( $media_option_post_id, 'pc_separator-icon', true );
	$date = get_post_meta( $media_option_post_id, 'pc_date', true );
	$disable_countdown = get_post_meta( $media_option_post_id, 'pc_disable_countdown', true );

	?><section id="slider-container"<?php if( !empty($height) && $height != '100' ) { ?> data-height="<?php echo $height; ?>"<?php } ?><?php if( !empty($date) && ! $disable_countdown ) { ?> data-date="<?php echo $date; ?>"<?php } ?> <?php if( $disable_countdown ) { ?>class="countdown-disabled"<?php } ?>>
		<?php // If slider option is set
		if( $media_option == 'slider' ) {

			// Get slides image, pause time and animation speed
			$slides = get_post_meta( $media_option_post_id, 'pc_slides', true );
			$slides_count = count( $slides );
			$time = get_post_meta( $media_option_post_id, 'pc_time', true );
			$speed = get_post_meta( $media_option_post_id, 'pc_speed', true );

			// If there are at least 2 slides
			if( !empty($slides) && $slides_count > 1 ) {

				?><div id="slides" data-pause="<?php echo $time; ?>" data-speed="<?php echo $speed; ?>"><div class="slides-container"><?php
					foreach( $slides as $slide ) { ?><img src="<?php echo $slide; ?>" alt="" class="skip-lazy"><?php }
				?></div></div><?php

			// If there are is only 1 slide
			} else if( $slides_count == 1 ) {

				foreach( $slides as $slide ) { ?><div class="singleslide" style="background-image: url('<?php echo $slide; ?>');"></div><?php }

			}

		// If video option is set
		} else {

			$mp4      = get_post_meta( $media_option_post_id, 'pc_video-mp4', true );
			$webm     = get_post_meta( $media_option_post_id, 'pc_video-webm', true );
			$ogv      = get_post_meta( $media_option_post_id, 'pc_video-ogv', true );
			$loop     = get_post_meta( $media_option_post_id, 'pc_video-loop', true );
			$autoplay = get_post_meta( $media_option_post_id, 'pc_video-autoplay', true );
			$poster   = get_post_meta( $media_option_post_id, 'pc_preview-image', true ); ?>

			<video<?php if( !empty($poster) ) { ?> style="background-image: url('<?php echo $poster; ?>');"<?php } ?><?php if( $loop == 'yes' ) { ?> loop<?php } ?><?php if( $autoplay == 'yes' ) { ?> autoplay<?php } ?>>
				<?php if( !empty($ogv) ) { ?><source src="<?php echo $ogv; ?>" type="video/ogg"><?php } ?>
				<?php if( !empty($webm) ) { ?><source src="<?php echo $webm; ?>" type="video/webm"><?php } ?>
				<?php if( !empty($mp4) ) { ?><source src="<?php echo $mp4; ?>" type="video/mp4"><?php } ?>
			</video><?php

		} 

		if( !empty($main_title) || !empty($first_subtitle) || !empty($second_subtitle) ) {
			?><div class="tint"><div class="welcome text-center" data-scroll-reveal="enter from the top after 2s"><?php
				if(!empty($main_title)) { ?><h1><?php echo $main_title; ?></h1><?php }
				if(!empty($first_subtitle)) { ?><p><?php echo $first_subtitle; ?></p><?php }
				if(!empty($icon)) { ?><p><span></span><i class="fa <?php echo $icon; ?>"></i><span></span></p><?php }
				if(!empty($second_subtitle)) { ?><p><?php echo $second_subtitle; ?></p><?php }
			?></div></div><?php
		}
		if( !empty($date) && ! $disable_countdown ) { ?><div class="countdown" data-scroll-reveal="enter from the bottom after 2.5s"></div><?php } ?>
	</section><?php 

} ?>

<div class="navbar navbar-default<?php if( !isset($media_option_post_id) || $media_option_post_id == 0 ) { ?> fixed<?php } ?><?php if ( !empty($theme_pc['disable_logo']) ) { ?> no-logo<?php } ?>">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			<?php if ( empty($theme_pc['disable_logo']) ) { ?>
				<?php if ( has_custom_logo() ) {
	            	the_custom_logo();
	            } else { ?> 
	                <a href="<?php echo esc_url( home_url('/') ); ?>" class="custom-logo-link"><?php bloginfo('name'); ?></a>
	            <?php } ?>
			<?php } ?>
		</div><?php 
		wp_nav_menu( array(
		    'menu'              => 'primary',
		    'theme_location'    => 'primary',
		    'depth'             => 2,
		    'container'         => 'div',
		    'container_class'   => 'navbar-collapse collapse',
		    'menu_class'        => 'nav navbar-nav navbar-right',
		    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		    'walker'            => new wp_bootstrap_navwalker())
		); ?>
	</div>
</div>
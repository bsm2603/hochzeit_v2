<?php

// Story

if (!function_exists('story')) {
    function story($atts, $content = null) {

		$el_class = $output = $link_open = '';

		extract(shortcode_atts(array(
		    'story_photo'       => '',
		    'story_title'       => '',
		    'story_description' => '',
		    'story_link'        => '',
		    'el_class'          => '',
		), $atts));

		if( !empty($el_class) ) $el_class = ' ' . $el_class;

		if( !empty($story_link) ) {
			$link_open_photo = '<div class="hover-effect-container"><a href="' . $story_link . '" class="hover-effect">';
			$link_open = '<a href="' . $story_link . '">';
		}

		$output .= '<div class="story-item' . $el_class . '">';

			if( !empty($story_photo) ) {
				$photo = wp_get_attachment_image_src( $story_photo, 'full' );
				if( !empty($story_link) ) {
					$output .= $link_open_photo . '<img src="' . $photo[0] . '" alt="" class="img-responsive img-circle"><span class="img-circle"><i class="fa fa-link fa-3x"></i></span></a></div>';
				} else {
					$output .= '<img src="' . $photo[0] . '" alt="" class="img-responsive img-circle">';				
				}
			}

			if( !empty($story_link) ) {
				$output .= '<h5>' . $link_open . $story_title . '</a></h5>';
			} else {
				$output .= '<h5>' . $story_title . '</h5>';
			}
			$output .= '<p>' . $story_description . '</p>';

		$output .= '</div><div class="mobile-divider"><span></span><i class="fa fa-heart"></i><span></span></div>';

		return $output;

	}
}

add_shortcode('story', 'story');
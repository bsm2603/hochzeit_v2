<?php

// Guest

if (!function_exists('guest')) {
    function guest($atts, $content = null) {

		$el_class = $output = $link_open = '';

		extract(shortcode_atts(array(
		    'guest_photo'       => '',
		    'guest_name'        => '',
		    'guest_title'       => '',
		    'guest_description' => '',
		    'guest_link'        => '',
		    'guest_alignment'   => '',
		    'el_class'          => '',
		), $atts));

		if( !empty($el_class) ) $el_class = ' ' . $el_class;

		if( !empty($guest_link) ) {
			$link_open_photo = '<div class="hover-effect-container"><a href="' . $guest_link . '" class="hover-effect">';
			$link_open = '<a href="' . $guest_link . '">';
		}

		if( !empty($guest_link) ) {
			$title = '<h5>' . $link_open . $guest_name . '</a></h5>';
		} else {
			$title = '<h5>' . $guest_name . '</h5>';
		}

		if( !empty($guest_title) ) {
			$subtitle = '<h6>' . $guest_title . '</h6>';
		}

		$description = '<p>' . $guest_description . '</p>';

		$output .= '</div><div class="col-sm-6">';

		if( !empty($guest_photo) ) {
			$photo = wp_get_attachment_image_src( $guest_photo, 'full' );
			if( !empty($guest_link) ) {
				$image = $link_open_photo . '<img src="' . $photo[0] . '" class="img-responsive img-circle"><span class="img-circle"><i class="fa fa-link fa-3x"></i></span></a></div>';
			} else {
				$image = '<div class="hover-effect"><img src="' . $photo[0] . '" class="img-responsive img-circle"></div>';				
			}
		}

		if( $guest_alignment == 'left' ) {
			$output = '<div class="col-sm-6 guest-item-image-left">' . $image . '</div><div class="col-sm-6 guest-item' . $el_class . '">' . $title . $subtitle . $description;
		} else {
			$output = '<div class="col-sm-6 guest-item text-right' . $el_class . '">' . $title . $subtitle . $description . '</div><div class="col-sm-6 guest-item-image-right">' . $image;
		}

		$output .= '</div><div class="mobile-divider"><span></span><i class="fa fa-heart"></i><span></span></div>';

		return $output;

	}
}

add_shortcode('guest', 'guest');
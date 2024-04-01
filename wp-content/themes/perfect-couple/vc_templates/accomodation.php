<?php

// Accomodation

if (!function_exists('accomodation')) {
    function accomodation($atts, $content = null) {

		$el_class = $output = $link_open = $link_open_photo = '';

		extract(shortcode_atts(array(
		    'accomodation_photo'       => '',
		    'accomodation_title'       => '',
		    'accomodation_rating'      => '',
		    'accomodation_description' => '',
		    'accomodation_link'        => '',
		    'accomodation_alignment'   => '',
		    'el_class'                 => '',
		), $atts));

		if( !empty($el_class) ) $el_class = ' ' . $el_class;

		if( !empty($accomodation_link) ) {
			$link_open_photo = '<div class="hover-effect-container"><a href="' . $accomodation_link . '" class="hover-effect">';
			$link_open = '<a target="_blank" href="' . $accomodation_link . '">';
		}

		if( !empty($accomodation_link) ) {
			$title = '<h5>' . $link_open . $accomodation_title . '</a></h5>';
		} else {
			$title = '<h5>' . $accomodation_title . '</h5>';
		}

		$stars = '<h6>';
		switch ($accomodation_rating) {
			case 1:
				$stars .= '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case 2:
				$stars .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case 3:
				$stars .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
				break;
			case 4:
				$stars .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
				break;
			default:
				$stars .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
				break;
		}
		$stars .= '</h6>';

		$description = '<p>' . $accomodation_description . '</p>';

		if( !empty($accomodation_photo) ) {
			$photo = wp_get_attachment_image_src( $accomodation_photo, 'full' );
			if( !empty($accomodation_link) ) {
				$image = $link_open_photo . '<img src="' . $photo[0] . '" alt="" class="img-responsive img-circle"><span class="img-circle"><i class="fa fa-link fa-3x"></i></span></a></div>';
			} else {
				$image = '<img src="' . $photo[0] . '" alt="" class="img-responsive img-circle">';
			}
		}

		if( $accomodation_alignment == 'left' ) {
			$output = '<div class="col-sm-6 accommodation-item-image-left">' . $image . '</div><div class="col-sm-6 accommodation-item' . $el_class . '">' . $title . $stars . $description;
		} else {
			$output = '<div class="col-sm-6 accommodation-item text-right' . $el_class . '">' . $title . $stars . $description . '</div><div class="col-sm-6 accommodation-item-image-right">' . $image;
		}

		$output .= '</div><div class="mobile-divider"><span></span><i class="fa fa-heart"></i><span></span></div>';

		return $output;

	}
}

add_shortcode('accomodation', 'accomodation');
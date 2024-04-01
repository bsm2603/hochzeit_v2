<?php

// Person

if (!function_exists('person')) {
    function person($atts, $content = null) {

		$el_class = $output = $link_open = '';

		extract(shortcode_atts(array(
		    'person_photo'       => '',
		    'person_name'        => '',
		    'person_description' => '',
		    'person_link'        => '',
		    'person_facebook'    => '',
		    'person_twitter'     => '',
		    'person_linkedin'    => '',
		    'person_google'      => '',
		    'person_flickr'      => '',
		    'person_pinterest'   => '',
		    'person_instagram'   => '',
		    'person_vimeo'       => '',
		    'person_youtube'     => '',
		    'person_email'       => '',
		    'el_class'           => '',
		), $atts));

		if( !empty($el_class) ) $el_class = ' ' . $el_class;

		if( !empty($person_link) ) {
			$link_open_photo = '<div class="hover-effect-container"><a href="' . $person_link . '" class="hover-effect">';
			$link_open = '<a href="' . $person_link . '">';
		}

		$output .= '<div class="person-item' . $el_class . '">';

			if( !empty($person_photo) ) {
				$photo = wp_get_attachment_image_src( $person_photo, 'full' );
				if( !empty($person_link) ) {
					$output .= $link_open_photo . '<img src="' . $photo[0] . '" class="img-responsive img-circle"><span class="img-circle"><i class="fa fa-link fa-3x"></i></span></a></div>';
				} else {
					$output .= '<img src="' . $photo[0] . '" class="img-responsive img-circle">';
				}
			}

			if( !empty($person_link) ) {
				$output .= '<h5>' . $link_open . $person_name . '</a></h5>'; 
			} else {
				$output .= '<h5>' . $person_name . '</h5>';
			}
			$output .= '<p>' . $person_description . '</p>';

			if( !empty($person_facebook) || !empty($person_twitter) || !empty($person_google) || !empty($person_linkedin) || !empty($person_flickr) || !empty($person_pinterest) || !empty($person_instagram) || !empty($person_vimeo) || !empty($person_youtube) ) {
				$output .= '<ul class="social-icons">';
					if( !empty($person_facebook) ) $output .= '<li><a target="_blank" href="' . $person_facebook . '"><i class="fa fa-facebook"></i></a></li>';
					if( !empty($person_twitter) ) $output .= '<li><a target="_blank" href="' . $person_twitter . '"><i class="fa fa-twitter"></i></a></li>';
					if( !empty($person_google) ) $output .= '<li><a target="_blank" href="' . $person_google . '"><i class="fa fa-google-plus"></i></a></li>';
					if( !empty($person_linkedin) ) $output .= '<li><a target="_blank" href="' . $person_linkedin . '"><i class="fa fa-linkedin"></i></a></li>';
					if( !empty($person_flickr) ) $output .= '<li><a target="_blank" href="' . $person_flickr . '"><i class="fa fa-flickr"></i></a></li>';
					if( !empty($person_pinterest) ) $output .= '<li><a target="_blank" href="' . $person_pinterest . '"><i class="fa fa-pinterest"></i></a></li>';
					if( !empty($person_instagram) ) $output .= '<li><a target="_blank" href="' . $person_instagram . '"><i class="fa fa-instagram"></i></a></li>';
					if( !empty($person_vimeo) ) $output .= '<li><a target="_blank" href="' . $person_vimeo . '"><i class="fa fa-vimeo"></i></a></li>';
					if( !empty($person_youtube) ) $output .= '<li><a target="_blank" href="' . $person_youtube . '"><i class="fa fa-youtube"></i></a></li>';
					if( !empty($person_email) ) $output .= '<li><a href="mailto:' . $person_email . '"><i class="fa fa-envelope"></i></a></li>';
				$output .= '</ul>';
			}

		$output .= '</div><div class="mobile-divider"><span></span><i class="fa fa-heart"></i><span></span></div>';

		return $output;

	}
}

add_shortcode('person', 'person');
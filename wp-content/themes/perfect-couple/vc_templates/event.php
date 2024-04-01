<?php

// Event

if (!function_exists('event')) {
    function event($atts, $content = null) {

		$el_class = $output = $link_open = '';

		extract(shortcode_atts(array(
		    'event_photo'       => '',
		    'event_title'       => '',
		    'event_date'        => '',
		    'event_description' => '',
		    'event_link'        => '',
		    'event_button_text' => '',
		    'el_class'          => '',
		), $atts));

		if( !empty($el_class) ) $el_class = ' ' . $el_class;

		if( !empty($event_link) ) {
			$link_open = '<a href="' . $event_link . '">';
		}

		$output .= '<div class="event-item blog-short' . $el_class . '">';

			if( !empty($event_photo) ) {
				$photo = wp_get_attachment_image_src( $event_photo, 'full' );
				if( !empty($event_link) ) {
					$output .= $link_open . '<img src="' . $photo[0] . '" alt="" class="img-responsive"></a>';
				} else {
					$output .= '<img src="' . $photo[0] . '" alt="" class="img-responsive">';				
				}
			}

			if( !empty($event_link) ) {
				$output .= '<h5>' . $link_open . $event_title . '</a></h5>';
			} else {
				$output .= '<h5>' . $event_title . '</h5>';
			}
			if( !empty($event_date) ) {
				$output .= '<h6>' . $event_date . '</h6>';
			}
			$output .= '<p>' . $event_description . '</p>';

			if( !empty($event_link) && !empty($event_button_text) ) {
				$output .= '<p><a class="btn btn-primary" href="' . $event_link . '">' . $event_button_text . '</a></p>';
			}

		$output .= '</div>';

		return $output;

	}
}

add_shortcode('event', 'event');
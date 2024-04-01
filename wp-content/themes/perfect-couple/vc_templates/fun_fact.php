<?php

// Fun Fact

if (!function_exists('fact')) {
    function fact($atts, $content = null) {

		$el_class = $output = '';

		extract(shortcode_atts(array(
		    'fact_value' => '',
		    'fact_title' => '',
		    'el_class'   => '',
		), $atts));

		if( !empty($el_class) ) $el_class = ' ' . $el_class;

		$output .= '<div class="fact-item img-circle' . $el_class . '">';

			if( !empty($fact_value) ) {
				$output .= '<h3 data-to="' . $fact_value . '" data-from="0" class="timer">' . $fact_value . '</h3>';
			}
			if( !empty($fact_title) ) {
				$output .= '<h6>' . $fact_title . '</h6>';
			}

		$output .= '</div>';

		return $output;

	}
}

add_shortcode('fact', 'fact');
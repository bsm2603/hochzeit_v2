<?php
$output = $font_color = $el_class = $width = $offset = '';
extract(shortcode_atts(array(
	'font_color'      => '',
    'el_class' => '',
    'width' => '1/1',
    'css' => '',
	'offset' => '',
	'animation_direction' => '',
	'animation_delay' => '',
	'text_align' => ''
), $atts));

$animation = $delay = $align = '';

if($animation_direction != 'none') {

	if( !empty($animation_delay)) $delay = ' after ' . $animation_delay;

	if($animation_direction == 'default') {
		$animation = ' data-scroll-reveal';
	} else {
		$animation = ' data-scroll-reveal="' . $animation_direction . $delay . '"';
	}

}

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);
$width = vc_column_offset_class_merge($offset, $width);
if( !empty($text_align) || $text_align != 'default' ) $align = ' ' . $text_align;
$el_class .= ' wpb_column vc_column_container' . $align;
$style = $this->buildStyle( $font_color );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$output .= '<div class="'.$css_class.'"'.$style.$animation.'><div class="wpb_wrapper">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div></div>';

echo $output;
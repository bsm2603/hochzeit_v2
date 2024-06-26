<?php
extract( shortcode_atts( array(
	'link' => '',
	'title' => __( 'Text on the button', "js_composer" ),
	'button_style' => '',
	'button_size' => '',
	'button_target' => '',
	'el_class' => ''
), $atts ) );

$class = 'btn';
//parse link
$link = ( $link == '||' ) ? '' : $link;
$link = vc_build_link( $link );
$a_href = $link['url'];
$a_title = $link['title'];
$a_target = $link['target'];
if(empty($a_target)) $a_target = '_self';

$class .= ' ' . $button_style;
$class .= ( $button_size != '' ) ? ( ' ' . $button_size ) : '';

$el_class = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . $class . $el_class, $this->settings['base'], $atts );
?><a class="<?php echo esc_attr( trim( $css_class ) ); ?>" href="<?php echo $a_href; ?>" title="<?php echo esc_attr( $a_title ); ?>" target="<?php echo $a_target; ?>"><?php echo $title; ?></a>
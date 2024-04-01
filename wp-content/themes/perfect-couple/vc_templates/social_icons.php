<?php

// Social Icons

if (!function_exists('social_brand')) {
    function social_brand($atts, $content = null) {

		$el_class = $output = '';

		extract(shortcode_atts(array(    
	    	"behance_title" => '',
	    	"behance_url" => '',
	    	"deviantart_title" => '',
	    	"deviantart_url" => '',
	    	"flickr_title" => '',
	    	"flickr_url" => '',
	    	"reddit_title" => '',
	    	"reddit_url" => '',
	    	"skype_title" => '',
	    	"skype_url" => '',
	    	"stumbleupon_title" => '',
	    	"stumbleupon_url" => '',
	    	"tumblr_title" => '',
	    	"tumblr_url" => '',
	    	"vimeo_title" => '',
	    	"vimeo_url" => '',
	    	"weibo_title" => '',
	    	"weibo_url" => '',
	    	"xing_title" => '',
	    	"xing_url" => '',
	    	"youtube_title" => '',
	    	"youtube_url" => '',
	    	"foursquare_title" => '',
	    	"foursquare_url" => '',	   
	    	"google_title" => '',
	    	"google_url" => '',
	    	"linkedin_title" => '',
	    	"linkedin_url" => '',
	    	"dribbble_title" => '',
	    	"dribbble_url" => '',
	    	"facebook_title" => '',
	    	"facebook_url" => '',
	    	"instagram_title" => '',
	    	"instagram_url" => '',
	    	"pinterest_title" => '',
	    	"pinterest_url" => '',
	    	"soundcloud_title" => '',
	    	"soundcloud_url" => '',
	    	"twitter_title" => '',
	    	"twitter_url" => '',
	    	"vk_title" => '',
	    	"vk_url" => '',
		    'el_class' => '',
		), $atts));

		if( !empty($el_class) ) $el_class = ' ' . $el_class;

		$output .= '<ul class="social-icons text-center ' . $el_class . '">';

		if( !empty($facebook_url) ) {
			$output .= '<li><a href="' . $facebook_url . '" title="' . $facebook_title . '"><i class="fa fa-facebook"></i></a></li>';
		}
		if( !empty($twitter_url) ) {
			$output .= '<li><a href="' . $twitter_url . '" title="' . $twitter_title . '"><i class="fa fa-twitter"></i></a></li>';
		}
		if( !empty($google_url) ) {
			$output .= '<li><a href="' . $google_url . '" title="' . $google_title . '"><i class="fa fa-google-plus"></i></a></li>';
		}
		if( !empty($linkedin_url) ) {
			$output .= '<li><a href="' . $linkedin_url . '" title="' . $linkedin_title . '"><i class="fa fa-linkedin"></i></a></li>';
		}
		if( !empty($youtube_url) ) {
			$output .= '<li><a href="' . $youtube_url . '" title="' . $youtube_title . '"><i class="fa fa-youtube"></i></a></li>';
		}
		if( !empty($flickr_url) ) {
			$output .= '<li><a href="' . $flickr_url . '" title="' . $flickr_title . '"><i class="fa fa-flickr"></i></a></li>';
		}
		if( !empty($behance_url) ) {
			$output .= '<li><a href="' . $behance_url . '" title="' . $behance_title . '"><i class="fa fa-behance"></i></a></li>';
		}
		if( !empty($deviantatr_url) ) {
			$output .= '<li><a href="' . $deviantatr_url . '" title="' . $deviantatr_title . '"><i class="fa fa-deviantatr"></i></a></li>';
		}
		if( !empty($reddit_url) ) {
			$output .= '<li><a href="' . $reddit_url . '" title="' . $reddit_title . '"><i class="fa fa-reddit"></i></a></li>';
		}
		if( !empty($skype_url) ) {
			$output .= '<li><a href="' . $skype_url . '" title="' . $skype_title . '"><i class="fa fa-skype"></i></a></li>';
		}
		if( !empty($stumbleupon_url) ) {
			$output .= '<li><a href="' . $stumbleupon_url . '" title="' . $stumbleupon_title . '"><i class="fa fa-stumbleupon"></i></a></li>';
		}
		if( !empty($tumblr_url) ) {
			$output .= '<li><a href="' . $tumblr_url . '" title="' . $tumblr_title . '"><i class="fa fa-tumblr"></i></a></li>';
		}
		if( !empty($vimeo_url) ) {
			$output .= '<li><a href="' . $vimeo_url . '" title="' . $vimeo_title . '"><i class="fa fa-vimeo-square"></i></a></li>';
		}
		if( !empty($weibo_url) ) {
			$output .= '<li><a href="' . $weibo_url . '" title="' . $weibo_title . '"><i class="fa fa-weibo"></i></a></li>';
		}
		if( !empty($xing_url) ) {
			$output .= '<li><a href="' . $xing_url . '" title="' . $xing_title . '"><i class="fa fa-xing"></i></a></li>';
		}
		if( !empty($foursquare_url) ) {
			$output .= '<li><a href="' . $foursquare_url . '" title="' . $foursquare_title . '"><i class="fa fa-foursquare"></i></a></li>';
		}
		if( !empty($dribbble_url) ) {
			$output .= '<li><a href="' . $dribbble_url . '" title="' . $dribbble_title . '"><i class="fa fa-dribbble"></i></a></li>';
		}
		if( !empty($instagram_url) ) {
			$output .= '<li><a href="' . $instagram_url . '" title="' . $instagram_title . '"><i class="fa fa-instagram"></i></a></li>';
		}
		if( !empty($pinterest_url) ) {
			$output .= '<li><a href="' . $pinterest_url . '" title="' . $pinterest_title . '"><i class="fa fa-pinterest"></i></a></li>';
		}
		if( !empty($soundcloud_url) ) {
			$output .= '<li><a href="' . $soundcloud_url . '" title="' . $soundcloud_title . '"><i class="fa fa-soundcloud"></i></a></li>';
		}
		if( !empty($vk_url) ) {
			$output .= '<li><a href="' . $vk_url . '" title="' . $vk_title . '"><i class="fa fa-vk"></i></a></li>';
		}

		$output .= '</div>';

		return $output;

	}
}

add_shortcode('social_brand', 'social_brand');
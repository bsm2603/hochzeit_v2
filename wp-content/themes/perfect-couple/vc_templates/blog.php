<?php

/* Blog
-------------------------------------------------------------------------------------------------------------------*/

if (!function_exists('recent_blog')) {
	function recent_blog( $atts, $content = null) {

	    extract( shortcode_atts( array(
	        'posts_limit' => 3,
	        'columns' => 2
	    ), $atts ) );

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $posts_limit
	    );

	    $output = '';

	    query_posts($args);

		if( have_posts() ) :

			switch ($columns) {
				case '2':
					$width = 'col-sm-6';
					break;

				case '3':
					$width = 'col-sm-4';
					break;

				default: 
					$width = 'col-sm-3';
					break;
			}

			while ( have_posts() ) : the_post();

				$output .= '<div class="' . $width . '"><div class="blog-item blog-short">';

	            	if( has_post_thumbnail() ) {
	            		$output .= '<a href="' . esc_url( get_permalink() ) . '">' . get_the_post_thumbnail(get_the_ID(), 'blog', array('class' => 'img-responsive')) . '</a>';
	            	}            		

	            	$output .= '<h5><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . get_the_title(get_the_ID()) . '</a></h5>';

	            	$event_date = get_post_meta( get_the_ID(), 'pc_event-date', true );

					if( !empty($event_date) ) {
						$output .= '<h6>' . $event_date . '</h6>';
					}

					$output .= '<p class="post-intro">' . get_the_excerpt() . '</p>';
					$output .= '<p><a href="' . esc_url( get_permalink() ) . '" class="btn btn-primary">' . __('Read more', 'pc') . '</a></p>';

				$output .= '</div></div>';
				
			endwhile;
		
		endif;

		wp_reset_query();

	    return $output;

	}

}

add_shortcode('recent_blog', 'recent_blog');
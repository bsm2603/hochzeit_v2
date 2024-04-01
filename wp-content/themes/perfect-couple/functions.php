<?php
/**
 * Perfect Couple functions and definitions
 *
 * @package Perfect Couple
 */

/**
 * Bootstrap Nav Walker
 */
require_once( get_template_directory() . '/inc/wp_bootstrap_navwalker.php' );

/**
 * Add Redux Framework & extras
 */
require get_template_directory() . '/admin/admin-init.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1140; /* pixels */
}

if ( ! function_exists( 'pc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pc_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Perfect Couple, use a find and replace
	 * to change 'pc' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pc', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size('blog', 370, 260, true);
	add_image_size('blog-full', 1170, 999, false);

	add_image_size('gallery', 570, 570, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pc' ),
	) );

    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        //'header-text' => array( 'site-title', 'site-description' ),
    ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // pc_setup
add_action( 'after_setup_theme', 'pc_setup' );

/**
 * Enqueue scripts and styles.
 */
function pc_scripts() {

	global $theme_pc;

	// CSS

	wp_enqueue_style( 'pace', get_template_directory_uri() . '/css/pace.css' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );

	wp_enqueue_style( 'pc-style', get_stylesheet_uri() );

	wp_enqueue_style( 'superslides', get_template_directory_uri() . '/css/superslides.css' );

	wp_enqueue_style( 'countdown', get_template_directory_uri() . '/css/countdown.css' );

	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css' );

	$custom_css = trim($theme_pc['custom_css']);
	if( !empty( $custom_css ) ) {
		wp_enqueue_style( 'custom_css', get_template_directory_uri() . '/css/custom.css' );
	}

    wp_enqueue_style('js_composer_front');

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

	// JavaScript

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script('pace', get_template_directory_uri() . '/js/pace.min.js', array('jquery'), '1.0', false);

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0', true);

	wp_enqueue_script('superslides', get_template_directory_uri() . '/js/jquery.superslides.js', array('jquery'), '1.0', true);

	wp_enqueue_script('plugin', get_template_directory_uri() . '/js/jquery.plugin.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('count-to', get_template_directory_uri() . '/js/jquery.countTo.js', array('jquery'), '1.0', true);

	wp_enqueue_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox.js', array('jquery'), '1.0', true);

	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);

    if( $theme_pc['css3_animations'] == 1 ) {
        wp_enqueue_script('scrollreveal', get_template_directory_uri() . '/js/scrollReveal.js', array('jquery'), '1.0', true);
    }

	$custom_js = trim($theme_pc['custom_js']);
	if( !empty( $custom_js ) ) {
		wp_enqueue_script('custom_js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true);	
	}

}
add_action( 'wp_enqueue_scripts', 'pc_scripts' );

/**
 * Add ie conditional html5 shim to header.
 */
function pc_add_ie_html5_shim() {
	global $is_IE;
	if ($is_IE)	echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'pc_add_ie_html5_shim');


/* Visual Composer
-------------------------------------------------------------------------------------------------------------------*/

if (class_exists('WPBakeryVisualComposerAbstract')) {

    vc_disable_frontend(); 

	function requireVcExtend(){
		require_once get_template_directory() . '/vc_templates/extend-vc.php';
	}
	add_action('init', 'requireVcExtend', 2);

	require_once( get_template_directory() . '/vc_templates/person.php' );
	require_once( get_template_directory() . '/vc_templates/event.php' );
	require_once( get_template_directory() . '/vc_templates/story.php' );
	require_once( get_template_directory() . '/vc_templates/guest.php' );
	require_once( get_template_directory() . '/vc_templates/accomodation.php' );
	require_once( get_template_directory() . '/vc_templates/fun_fact.php' );
	require_once( get_template_directory() . '/vc_templates/blog.php' );
	require_once( get_template_directory() . '/vc_templates/social_icons.php' );

	vc_remove_element("vc_posts_grid");
	vc_remove_element("vc_carousel");
	vc_remove_element("vc_posts_slider");
	vc_remove_element("vc_button");
	vc_remove_element("vc_cta_button");
	vc_remove_element("vc_gmaps");
	vc_remove_element("vc_toggle");

	vc_remove_element("vc_widget_sidebar");
	vc_remove_element("vc_wp_search");
	vc_remove_element("vc_wp_meta");
	vc_remove_element("vc_wp_recentcomments");
	vc_remove_element("vc_wp_calendar");
	vc_remove_element("vc_wp_pages");
	vc_remove_element("vc_wp_tagcloud");
	vc_remove_element("vc_wp_custommenu");
	vc_remove_element("vc_wp_text");
	vc_remove_element("vc_wp_posts");
	vc_remove_element("vc_wp_links");
	vc_remove_element("vc_wp_categories");
	vc_remove_element("vc_wp_archives");
	vc_remove_element("vc_wp_rss");

}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Plugins activation.
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Meta Boxes.
 */
require get_template_directory() . '/inc/meta-boxes.php';


/* Menu
-------------------------------------------------------------------------------------------------------------------*/

add_filter('page_link', 'pc_filterPageLink', 10, 3);

function pc_filterPageLink($link, $id) {

	$parent_id = get_post_ancestors($id);

    $template = get_page_template_slug($id);

    if (!is_admin() && !empty($parent_id) && !empty($template) ) {

        $link = basename($link);

        $link = str_replace('?page_id=', 'section-', $link);

        $link = trailingslashit( get_permalink($parent_id[0]) ) . '#' . $link;

    }

    return $link;
}

function pc_getPCPageID($page_ID) {

    $anchor = basename(get_permalink($page_ID));

    $anchor = str_replace('#', '', $anchor);

    return apply_filters('pc_page_id', $anchor);
}


/* Replace Standard Gallery Shortcode
-------------------------------------------------------------------------------------------------------------------*/

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'pc_post_gallery');

function pc_post_gallery($attr) {

    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => 'li',
        'icontag'    => '',
        'captiontag' => 'span',
        'columns'    => 3,
        'size'       => 'gallery',
        'include'    => '',
        'exclude'    => '',
        'link'       => ''
    ), $attr, 'gallery'));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, 'full', true);
        return $output;
    }

    $columns = intval($columns);
    switch ($columns) {
        case '10':
        case '9':
        case '8':
        case '7':
        case '6':
            $itemwidth = 'col-xs-4 col-sm-3 col-md-2';
            $row_break = 6;
            break;
        case '5':
        case '4':
            $itemwidth = 'col-xs-2 col-sm-3 col-md-3';
            $row_break = 4;
            break;
        case '3':
            $itemwidth = 'col-xs-2 col-sm-3 col-md-4';
            $row_break = 3;
            break;
        case '2':
        case '1':
            $itemwidth = 'col-xs-6 col-sm-6 col-md-6';
            $row_break = 2;
            break;
        
        default:
            $itemwidth = 'col-xs-2 col-sm-2 col-md-3';
            $row_break = 3;
            break;
    }

    $selector = "gallery-{$instance}";

    $size_class = sanitize_html_class( $size );
    $gallery_div = '<ul id="' . $selector . '" class="gallery row gallery-columns-' . $columns . ' gallery-size-' . $size_class . '">';
    $output = $gallery_div;

    $i = 0;
 
    foreach ( $attachments as $id => $attachment ) {

        $i = $i + 1;

        $thumb = wp_get_attachment_image_src( $id, 'gallery', false );
        $full = wp_get_attachment_image_src( $id, 'full', false );

        $image_output = '<a href="' . $full[0] . '" title="' . wptexturize($attachment->post_excerpt) . '" class="fancybox hover-effect" data-fancybox-group="' . $selector . '"><img src="' . $thumb[0] . '" class="img-rounded img-responsive"><span class="img-rounded"><i class="fa fa-search fa-3x"></i></span></a>';

        $image_meta = wp_get_attachment_metadata( $id );

        if( 1 == $i % $row_break ) {
            $output .= '<li class="gallery-item clear-left ' . $itemwidth . '">';
        } else {
            $output .= '<li class="gallery-item ' . $itemwidth . '">';
        }
        $output .= $image_output;
        $output .= '</li>';

    }

    $output .= '</ul>';

    return $output;
}

/* Register Custom Post Type And Taxonomies
-------------------------------------------------------------------------------------------------------------------*/

add_action('init', 'types_taxonomies_init', 10);
function types_taxonomies_init() {

/* Slider 
-------------------------------------------------------------------------------------------------------------------*/

    register_post_type(
        'pc_slider',
        array(
            'label' => 'Top Slider / Video',
            'labels' => array(
                'name' => 'Slider / Video',
                'all_items' => 'All Posts',
                'singular_name' => 'Slider / Video',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Slider / Video'
            ), 
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'menu_icon' => '',
            'supports' => array( 'title' ),
            'has_archive' => false,
            'menu_icon' => 'dashicons-format-gallery'
        )
    );

}
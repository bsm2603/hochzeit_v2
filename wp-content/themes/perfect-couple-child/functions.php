<?php
add_action( 'wp_enqueue_scripts', 'pc_enqueue_styles' );
function pc_enqueue_styles() {
    $parenthandle = 'pc-style';
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array('bootstrap', 'pace'),
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
    );
}
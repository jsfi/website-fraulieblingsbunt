<?php

add_filter( 'show_admin_bar', '__return_false' );
add_filter( 'get_the_archive_title', function( $title ) {
    return str_replace( sprintf( __( 'Category: %s' ), ''), '', $title);
});

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_script( 'twentysixteen-skip-link-focus-fix' );
    wp_dequeue_script( 'twentysixteen-keyboard-image-navigation' );
    wp_dequeue_script( 'twentysixteen-script' );
    wp_enqueue_script( 'flb-script', get_stylesheet_directory_uri() . '/js/main.js', [], '1.0.0', true );
}, 100 );

add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 0, 1024, false );
    add_image_size( 'hd', 1920, 0 );
    remove_filter( 'excerpt_more', 'twentysixteen_excerpt_more' );
}, 100 );

load_child_theme_textdomain( 'twentysixteen', get_stylesheet_directory() . '/languages/' );

function flb_featured_rss($content) {
    global $post;

    if ( has_post_thumbnail( $post->ID ) ){
        $content = '<p>' . flb_get_post_image( $post->ID ) . '</p>' . $content;
    }

    return $content;
}
add_filter('the_excerpt_rss', 'flb_featured_rss');
add_filter('the_content_feed', 'flb_featured_rss');

function flb_get_post_image( $post_id = null, $image_class = false, $default_size = null ) {
    $thumbnail_id = get_post_thumbnail_id( $post_id );

    if( !$thumbnail_id ) return '';

    $imageSize = wp_get_attachment_image_src( $thumbnail_id, $default_size );
    $image =  '<img src="'
    . $imageSize[0] . '" srcset="'. $imageSize[0] . ' ' . $imageSize[1] . 'w';

    foreach( get_intermediate_image_sizes() as $i => $size ) {
        $image .= ', ';

        $imageSize = wp_get_attachment_image_src( $thumbnail_id, $size );

        $image .= $imageSize[0] . ' ' . $imageSize[1] . 'w';
    }

    $image .= '" alt="' . get_the_title( $post_id ) . '"';

    if( $image_class ) $image .= ' class="' . $image_class . '"';

    $image .=  '/>';

    return $image;
}

<?php

add_filter( 'show_admin_bar', '__return_false' );
add_filter( 'get_the_archive_title', function( $title ) {
    return str_replace( sprintf( __( 'Category: %s' ), ''), '', $title);
});

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_script( 'twentysixteen-skip-link-focus-fix' );
    wp_dequeue_script( 'twentysixteen-keyboard-image-navigation' );
    wp_dequeue_script( 'twentysixteen-script' );
    wp_enqueue_script( 'flb-script', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0.0', true );
}, 100 );

add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 0, 1024, false );
    add_image_size( 'hd', 1920, 0 );
    remove_filter( 'excerpt_more', 'twentysixteen_excerpt_more' );
}, 100);


function flb_get_post_image( $post_id = null, $image_class = false, $default_size = null ) {
    $thumbnail_id = get_post_thumbnail_id( $post_id );

    if( !$thumbnail_id ) return '';

    $imageSize = wp_get_attachment_image_src( $thumbnail_id, $default_size );
    $image =  '<image src="'
    . $imageSize[0] . '" srcset="'. $imageSize[0] . ' ' . $imageSize[1] . 'w';

    foreach( get_intermediate_image_sizes() as $i => $size ) {
        $width = 0;

        $image .= ', ';

        $imageSize = wp_get_attachment_image_src( $thumbnail_id, $size );

        $image .= $imageSize[0] . ' ' . $imageSize[1] . 'w';
    }

    $image .= '" alt="' . get_the_title( $post_id ) . '"';

    if( $image_class ) $image .= ' class="' . $image_class . '"';

    $image .=  '/>';

    return $image;
}

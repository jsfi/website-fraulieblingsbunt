<?php

add_filter( 'show_admin_bar', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_script( 'twentyfifteen-skip-link-focus-fix' );
    wp_dequeue_script( 'twentyfifteen-keyboard-image-navigation' );
    wp_dequeue_script( 'twentyfifteen-script' );
}, 100 );

add_action( 'after_setup_theme', function() {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 0, 1024, false );
}, 100);

function flb_get_post_image( $post_id, $image_class, $default_size = 'large' ) {
    $thumbnail_id = get_post_thumbnail_id( $post_id );

    if( !$thumbnail_id ) return '';

    $image =  '<image src="'
    . wp_get_attachment_image_src( $thumbnail_id, $default_size )[0] . '" srcset="';

    foreach( get_intermediate_image_sizes() as $i => $size ) {
        $width = 0;

        if ($i > 0) {
            $image .= ', ';
        }

        $imageSize = wp_get_attachment_image_src( $thumbnail_id, $size );

        $image .= $imageSize[0] . ' ' . $imageSize[1] . 'w';
    }

    $image .= '" alt="' . get_the_title( $post_id ) . '"';

    if( $image_class ) $image .= ' class="' . $image_class . '"';

    $image .=  '/>';

    return $image;
}

<?php

add_filter( 'show_admin_bar', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_script( 'twentyfifteen-skip-link-focus-fix' );
    wp_dequeue_script( 'twentyfifteen-keyboard-image-navigation' );
    wp_dequeue_script( 'twentyfifteen-script' );
}, 100 );

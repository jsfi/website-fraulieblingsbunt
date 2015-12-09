<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/content', 'single' );

    get_template_part( 'template-parts/post-navigation', get_post_format() );

    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endwhile; ?>

<?php get_footer(); ?>

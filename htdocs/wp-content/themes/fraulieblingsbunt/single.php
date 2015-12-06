<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post();

    get_template_part( 'content', get_post_format() );

    get_template_part( 'post-navigation', get_post_format() );

    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endwhile; ?>

<?php get_footer(); ?>

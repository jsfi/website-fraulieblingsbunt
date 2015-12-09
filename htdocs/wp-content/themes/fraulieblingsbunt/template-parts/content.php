<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php echo get_permalink() ?>" class="post__link">
        <header class="post__header">
            <?php the_title( '<h2 class="post__title">', '</h2>' ); ?>
        </header>

        <?php echo flb_get_post_image(null, 'post__thumbnail'); ?>
    </a>
</article>

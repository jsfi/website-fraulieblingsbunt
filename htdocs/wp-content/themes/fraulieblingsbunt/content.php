<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( is_single()) : ?>
        <header class="post__header container">
            <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
        </header>

        <?php echo flb_get_post_image(null, 'post__thumbnail'); ?>

        <div class="post__content container">
            <?php the_content(); ?>
        </div>
    <?php else: ?>
        <a href="<?php echo get_permalink() ?>" class="post__link">
            <header class="post__header">
                <?php the_title( '<h2 class="post__title">', '</h2>' ); ?>
            </header>

            <?php echo flb_get_post_image(null, 'post__thumbnail'); ?>
        </a>
    <?php endif; ?>
</article>

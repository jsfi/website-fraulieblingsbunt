<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="page__header container">
        <?php the_title( '<h1 class="page__title">', '</h1>' ); ?>
    </header>

    <?php echo flb_get_post_image(null, 'post__thumbnail'); ?>

    <div class="page__content container">
        <?php the_content(); ?>
    </div>
</article>

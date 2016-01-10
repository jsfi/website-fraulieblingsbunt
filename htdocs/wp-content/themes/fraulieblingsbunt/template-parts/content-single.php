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
    <header class="post__header container">
        <?php the_title( '<h1 class="post__title">', '</h1>' ); ?>
    </header>

    <?php echo flb_get_post_image(null, 'post__thumbnail'); ?>

    <div class="post__content container">
        <?php the_content(); ?>
    </div>

    <?php /*
    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
    if ( $categories_list && twentysixteen_categorized_blog() ): ?>
        <footer class="container">
            <?php printf( '<p class="cat-links"><span class="visuallyhidden">%1$s </span>%2$s</p>', _x( 'Categories', 'Used before category names.', 'twentysixteen' ), $categories_list
            ); ?>
        </footer>
    <?php endif; */ ?>
</article>

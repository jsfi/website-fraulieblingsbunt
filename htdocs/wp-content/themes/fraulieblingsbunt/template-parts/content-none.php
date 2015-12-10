<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<header class="page__header">
    <h1 class="page__title"><?php _e( 'Nothing Found', 'twentysixteen' ); ?></h1>
</header>

<div class="page__content">
    <?php if( is_search() ) : ?>
        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentysixteen' ); ?></p>
        <?php get_search_form(); ?>
    <?php else : ?>
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentysixteen' ); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>

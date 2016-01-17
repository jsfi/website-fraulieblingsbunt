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
    <h1 class="page__title"><?php _e( 'Nichts gefunden', 'fraulieblingsbunt' ); ?></h1>
</header>

<div class="page__content">
    <?php if( is_search() ) : ?>
        <p><?php _e( 'Deine Suche hat keine Beiträge gefunden.', 'fraulieblingsbunt' ); ?></p>
        <?php get_search_form(); ?>
    <?php else : ?>
        <p><?php _e( 'Diese Kategorie hat noch keine Beiträge.', 'fraulieblingsbunt' ); ?></p>
        <?php get_search_form(); ?>
    <?php endif; ?>
</div>

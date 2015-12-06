<nav class="post__navigation">
    <?php $next = get_next_post(); if( $next ): ?>
        <a href="<?php echo get_the_permalink( $next->ID ) ?>" rel="next" class="post__navigation__link post__navigation__next">
            <p>
                <span class="post__navigation__text">
                    <span class="visuallyhidden"><?php _e( 'Next post:', 'twentyfifteen' ) ?></span>
                    <?php echo get_the_title( $next->ID ) ?>
                </span>
                <?php echo flb_get_post_image( $next->ID, 'post__navigation__image', 'thumbnail' ) ?>
            </p>
        </a>
    <?php else: ?>
        <span class="post__navigation__empty">
            <span class="visuallyhidden"><?php _e( 'No next post', 'twentyfifteen' ) ?></span>
        </span>
    <?php endif; ?>
    <?php $prev = get_previous_post(); if( $prev ): ?>
        <a href="<?php echo get_the_permalink( $prev->ID ) ?>" rel="prev" class="post__navigation__link post__navigation__prev">
            <p>
                <span class="post__navigation__text">
                    <span class="visuallyhidden"><?php _e( 'Previous post:', 'twentyfifteen' ) ?></span>
                    <?php echo get_the_title( $prev->ID ) ?>
                </span>
                <?php echo flb_get_post_image( $prev->ID, 'post__navigation__image', 'thumbnail' ) ?>
            </p>
        </a>
    <?php else: ?>
        <span class="post__navigation__empty">
            <span class="visuallyhidden"><?php _e( 'No previous post', 'twentyfifteen' ) ?></span>
        </span>
    <?php endif; ?>
</nav>

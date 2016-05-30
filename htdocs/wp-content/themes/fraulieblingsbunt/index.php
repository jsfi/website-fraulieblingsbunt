<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php if ( is_home() ) : ?>
    <main id="<?php _e( 'Page', 'twentysixteen' ); ?>" class="main">
        <?php if ( have_posts() ) : ?>
            <?php if ( is_home() && !is_front_page() ) : ?>
                <header>
                    <h1 class="page__title">1<?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <div class="post-listing__container"><div class="post-listing">
                <?php while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'template-parts/content', get_post_format() );

                endwhile; ?>
            </div></div>

            <?php echo flb_get_plain_pagination();
        else :
            get_template_part( 'template-parts/content', 'none' );

        endif; ?>
    </main>
<?php else: ?>
    <div class="wrap wrap_side-left">
        <main id="<?php _e( 'Page', 'twentysixteen' ); ?>" class="main">
            <?php if ( have_posts() ) : ?>

                <header class="page__header">
                    <?php if( is_search() ): ?>
                        <h1 class="page__title"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                    <?php else: ?>
                        <?php
                            the_archive_title( '<h1 class="page__title">', '</h1>' );
                            the_archive_description( '<div class="page__description">', '</div>' );
                        ?>
                    <?php endif; ?>
                </header>

                <div class="post__list">
                    <?php while ( have_posts() ) : the_post();
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', get_post_format() );

                    endwhile; ?>
                </div>
                <?php echo flb_get_plain_pagination();
            else :
                get_template_part( 'template-parts/content', 'none' );

            endif; ?>
        </main>
        <aside class="side">
            <?php get_sidebar(); ?>
        </aside>
    </div>
<?php endif; ?>
<?php get_footer(); ?>

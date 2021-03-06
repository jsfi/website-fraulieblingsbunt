<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="visuallyhidden"><?php readfile( get_stylesheet_directory() . '/img/icons.svg' ) ?></div>
<header class="header" role="banner">
    <a class="visuallyhidden focusable" href="#<?php _e( 'Page', 'twentysixteen' ); ?>"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

    <?php if ( is_front_page() && is_home() ) : ?>
        <h1 class="header__title">
    <?php else : ?>
        <p class="header__title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header__title__link" rel="home">
    <?php endif; ?>
        <img src="<?php echo get_stylesheet_directory_uri() ?>/img/frau-lieblingsbunt.svg" alt="Frau Lieblingsbunt" class="site-title__image" />
        <span class="visuallyhidden"><?php bloginfo( 'name' ); ?></span>
    <?php if ( is_front_page() && is_home() ) : ?>
        </h1>
    <?php else : ?>
        </a></p>
    <?php endif; ?>

    <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav class="nav-main" role="navigation">
            <button type="button" class="nav-main__toggle">
                <span class="visuallyhidden"><?php _e( 'Menu', 'twentysixteen') ?></span>
                <span class="nav-main__row nav-main__row1"></span>
                <span class="nav-main__row nav-main__row2"></span>
                <span class="nav-main__row nav-main__row3"></span>
                <span class="nav-main__row nav-main__row4"></span>
            </button>
            <?php
                // Primary navigation menu.
                wp_nav_menu( array(
                    'menu_class'     => 'nav-menu',
                    'theme_location' => 'primary',
                ));
            ?>
        </nav>
    <?php endif; ?>
</header>

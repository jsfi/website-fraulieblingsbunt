<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
    <aside id="secondary" class="sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>

        <div class="social">
            <a href="https://www.instagram.com/fraulieblingsbunt/" class="social__link social__instagram" title="Instagram" target="_blank"><span class="visuallyhidden">Instagram</span></a>
            <a href="http://www.ravelry.com/people/fraulieblingsbunt" class="social__link social__ravelry" title="Ravelry" target="_blank"><span class="visuallyhidden">Ravelry</span></a>
            <a href="mailto:kontakt@fraulieblingsbunt.de" class="social__link social__mail" title="E-Mail" target="_blank"><span class="visuallyhidden">E-Mail</span></a>
        </div>
    </aside>
<?php endif; ?>

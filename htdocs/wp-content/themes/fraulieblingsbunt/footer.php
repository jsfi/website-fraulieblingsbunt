<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

</main>
<aside class="side">
    <?php get_sidebar(); ?>
</aside>

<footer class="footer" role="contentinfo">
    <p class="footer__copyright">
        <span class="footer__copyright__text">&copy;Frau Lieblingsbunt 2016.<br>Please do not use my words or photos without my permission.</span>
    </p>
</footer>

<?php wp_footer(); ?>

</body>
</html>

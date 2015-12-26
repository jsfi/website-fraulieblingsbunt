<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<form role="search" method="get" class="search__form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search__label">
		<span class="visuallyhidden"><?php echo _x( 'Search for:', 'label', 'twentysixteen' ); ?></span>
		<input type="search" class="search__field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'twentysixteen' ); ?>" />
	</label>
	<button type="submit" class="search__submit btn"><svg width="22" height="22"><use xlink:href="#icon-search" /></svg><span class="visuallyhidden"><?php echo _x( 'Search', 'submit button', 'twentysixteen' ); ?></span></button>
</form>

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EUlia
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php printf( esc_html_x( '%1$s %2$s by %3$s in the office of %4$s.', '%1$s = theme name, %2$s = version, %3$s = author name(s), %4$s = office of Julia Reda', 'eulia' ), '<a href="https://github.com/JuliaRedaMEP/EUlia" title="EUlia / GitHub">EUlia</a>', eulia_get_theme_version(), 'c3o & hutt', '<a href="https://juliareda.eu" title="Julia Reda" rel="designer">MEP Julia Reda</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

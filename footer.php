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
			<?php printf( esc_html__( '%1$s &beta; v0.1 by %2$s in the office of %3$s.', 'eulia' ), '<a href="https://github.com/JuliaRedaMEP/EUlia" title="EUlia / GitHub">EUlia</a>', 'c3o & hutt', '<a href="https://juliareda.eu" title="Julia Reda" rel="designer">MEP Julia Reda</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

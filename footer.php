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
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'eulia' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'eulia' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s in the office of %3$s.', 'eulia' ), '<a href="https://github.com/JuliaRedaMEP/EUlia" title="EUlia / GitHub">EUlia</a>', 'c3o & hutt', '<a href="https://juliareda.eu" title="Julia Reda" rel="designer">MEP Julia Reda</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

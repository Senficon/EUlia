<?php
/**
 * The first site being displayed when loading Julia's website.
 * Used for both “your latest posts” or “a static page” as set in the front page displays section of Settings → Reading.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EUlia
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<section class="top-news">
					<h2 class="heading-category"><?php esc_html_e('Top News', 'eulia'); ?></h2>
					<?php
					/* Show the last post - or the post marked as featured, if available? */
				    $args = array( 'numberposts' => '1' );
				    $recent_posts = wp_get_recent_posts( $args );

				    foreach( $recent_posts as $recent ){
				    	echo '<h1 class="heading-headline page-title screen-reader-text"><a href="' . get_permalink($recent['ID']) . '" title="' . esc_attr($recent["post_title"]) . '">'. $recent["post_title"] . '</a></h1>';
				    }

					?>
				</section><!-- #top-news -->

				<section class="right-now">
					<h2 class="heading-category"><?php esc_html_e('Right Now', 'eulia'); ?></h2>
					<!-- #todo: Last Tweet Widget will be placed here. -->
				</section><!-- #right-now -->

				<section class="current-priorities">
					<h2 class="heading-category"><?php esc_html_e('Current Priorities', 'eulia'); ?></h2>
					<!-- #todo: Most important categories will be listed here. Otherwise we use hard links to the topic pages. we'll see. -->
				</section><!-- #current-priorities -->

				<section class="newsletter">
					<!-- #todo: insert newsletter signup form -->
				</section><!-- #newsletter -->

				<section class="recent-news">
					<!-- #todo: insert loop with the last ~3(?) articles. -->
				</section><!-- #recent-news -->

				<section class="front-page-footer">
				<!-- #todo: insert another newsletter signup form? Otherwise we could insert a countdown like "x days since Oettinger threatened the world-wide-web". -->
				<!-- brace yourselves, Oettinger is coming. -->
				</section><!-- #front-page-footer -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

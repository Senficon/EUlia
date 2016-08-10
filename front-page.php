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
				    $top_news = wp_get_recent_posts( array( 'numberposts' => '1' ) );

				    foreach( $top_news as $tnews ){

				    	/* Format time in a human-readable format. */
				    	$post_time_posted = sprintf( _x( '%s ago', '%s = human-readable time difference', 'eulia' ), human_time_diff( get_the_time( 'U', $tnews['ID'] ), current_time( 'timestamp' ) ) );
				    	
				    	echo '<h1 class="heading-headline page-title screen-reader-text"><a href="' . get_permalink($tnews['ID']) . '" title="' . esc_attr($tnews["post_title"]) . '">'. esc_html_e($tnews["post_title"]) . '</a></h1>';
				    	echo '<p class="top-news-info">' . $post_time_posted . ' &middot; n shares <!-- #todo integrate shares value (twitter?) --></p>';
				    }

					?>
				</section><!-- .top-news -->

				<section class="right-now">
					<h2 class="heading-category"><?php esc_html_e('Right Now', 'eulia'); ?></h2>
					<!-- #todo: Last Tweet Widget will be placed here. -->
				</section><!-- .right-now -->

				<section class="current-priorities">
					<h2 class="heading-category"><?php esc_html_e('Current Priorities', 'eulia'); ?></h2>
					<!-- #todo: Most important categories will be listed here. Otherwise we use hard links to the topic pages. we'll see. -->
				</section><!-- .current-priorities -->

				<section class="newsletter">
					<!-- #todo: insert newsletter signup form -->
				</section><!-- .newsletter -->

				<section class="recent-news">
					<h2 class="heading-category"><?php esc_html_e('Recent News', 'eulia'); ?></h2>
					<?php

					/* Show the three posts -- except the one above (offset 1) */
				    $recent_news = wp_get_recent_posts( array( 'numberposts' => '3', 'offset' => '1' ) );

				    foreach ($recent_news as $rnews) {

					    /* Format time in a human-readable format. */
					    $post_time_posted = sprintf( _x( '%s ago', '%s = human-readable time difference', 'eulia' ), human_time_diff( get_the_time( 'U', $rnews['ID'] ), current_time( 'timestamp' ) ) );

				    	echo '<h1 class="recent-news-headline screen-reader-text"><a href="' . get_permalink($rnews['ID']) . '" title="' . esc_attr($rnews["post_title"]) . '">'. esc_html_e($rnews["post_title"]) . '</a></h1>';
				    	echo '<p class="recent-news-info">' . $post_time_posted . ' &middot; n shares <!-- #todo integrate shares value (twitter?) --></p>';
				    }

					?>
					<!-- #todo: insert loop with the last ~3(?) articles. -->
					<a href="#" title="<?php esc_attr_e('More News...', 'eulia'); ?>"><?php esc_html_e('More News...', 'eulia'); ?></a>
				</section><!-- .recent-news -->

				<section class="front-page-footer">
				<!-- #todo: insert another newsletter signup form? Otherwise we could insert a countdown like "x days since Oettinger threatened the world-wide-web". -->
				<!-- brace yourselves, Oettinger is coming. -->
				</section><!-- .front-page-footer -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

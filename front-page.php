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
			<?php
				$sticky = get_option( 'sticky_posts' );
				$args = array(
					'posts_per_page' => 1,
					'post__in'  => $sticky,
					'ignore_sticky_posts' => 1
				);
				$query = new WP_Query( $args );
				if ( isset($sticky[0]) ):
			?>
				<section class="sticky-post language-not-fully-supported">
					<h2 class="heading-category"><?php esc_html( _x( 'Notice', 'header of a sticky post that informs about limited language support. (shown in every language except English and German)', 'eulia' ) ); ?></h2>
					<p class="sticky-post-text"><?php $query->the_post(); ?></p>
				</section>
			<?php
				endif;
			?>

				<section class="top-news">
					<h2 class="heading-category"><?php esc_html_e('Top News', 'eulia'); ?></h2>
					<?php

					/* Show the last post - or the post marked as featured, if available? */
				    $top_news = wp_get_recent_posts( array( 'numberposts' => '1' ) );
				    $shares = 0; //#todo: get shares counter

				    foreach( $top_news as $tnews ){

				    	/* Format time in a human-readable format. */
				    	$post_time_posted = sprintf( _x( '%s ago', '%s = human-readable time difference', 'eulia' ), human_time_diff( get_the_time( 'U', $tnews['ID'] ), current_time( 'timestamp' ) ) );
				    	$sharecount = sprintf( _n( '%d share', '%d shares', $shares, 'eulia' ), $shares );

				    	echo '<h1 class="heading-headline page-title"><a href="' . get_permalink( $tnews['ID'] ) . '" title="' . esc_attr( $tnews["post_title"] ) . '">'. esc_html( $tnews["post_title"] ) . '</a></h1>';
				    	echo '<p class="top-news-info">' . $post_time_posted . ' &middot; ' . $sharecount . '<!-- #todo integrate shares value (twitter?) --></p>';
				    }

					?>
				</section><!-- .top-news -->

				<section class="right-now">
					<h2 class="heading-category"><?php esc_html_e('Right Now', 'eulia'); ?></h2>
					<img id="right-now-tweet-avatar" src="data:image/png;base64,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" alt="<?php esc_attr_e('@senficon\'s Twitter avatar', 'eulia'); ?>" />
					<p id="right-now-tweet"><?php _x('Loading last tweet…', 'Text being displayed until Julia\'s last tweet is loaded.', 'eulia'); ?></p>
					<p id="right-now-tweet-info"></p>
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
				    $shares = 0;

				    foreach ($recent_news as $rnews) {

					    /* Format time in a human-readable format. */
					    $post_time_posted = sprintf( _x( '%s ago', '%s = human-readable time difference', 'eulia' ), human_time_diff( get_the_time( 'U', $rnews['ID'] ), current_time( 'timestamp' ) ) );
					    $sharecount = sprintf( _n( '%d share', '%d shares', $shares, 'eulia' ), $shares );

				    	echo '<h1 class="recent-news-headline"><a href="' . get_permalink( $rnews['ID'] ) . '" title="' . esc_attr( $rnews["post_title"] ) . '">'. esc_html( $rnews["post_title"] ) . '</a></h1>';
				    	echo '<p class="recent-news-info">' . $post_time_posted . ' &middot; ' . $sharecount . '<!-- #todo integrate shares value (twitter?) --></p>';
				    }

					?>
					<!-- #todo: insert loop with the last ~3(?) articles. -->
					<a href="#" title="<?php esc_attr_e('More News...', 'eulia'); ?>"><?php esc_html_e( 'More News...', 'eulia' ); ?></a>
				</section><!-- .recent-news -->

				<section class="front-page-footer">
				<!-- #todo: insert another newsletter signup form? Otherwise we could insert a countdown like "x days since Oettinger threatened the world-wide-web". -->
				<!-- brace yourselves, Oettinger is coming. -->
				</section><!-- .front-page-footer -->

		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- Twitter script is included here so it doesen't throw any error on article pages. -->
	<script type="text/javascript">
	twitterFetcher.fetch({
	  "id": '765237512453455872', // twitter widget-id
	  "domId": '',
	  "maxTweets": 1,
	  "enableLinks": false,
	  "showUser": false,
	  "showTime": true,
	  "dateFunction": '',
	  "showRetweet": false,
	  "dataOnly": true,
	  "showInteraction": false,
	  "showPermalinks": true,
	  "customCallback": showTweet
	});
	</script>
<?php
get_sidebar();
get_footer();

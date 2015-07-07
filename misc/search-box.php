<?php

printf( '<div class="%s">', 'search-meta' );

	printf( '<div %s>', hybrid_get_attr( 'loop-meta' ) );

		printf( '<h1 %s>', hybrid_get_attr( 'loop-title' ) );

			echo __( 'New Search', 'hybopress' );

		echo '</h1>';

		printf( '<div %s>', hybrid_get_attr( 'loop-description' ) );

			printf( '<p>' );

				echo __( 'If you are not happy with the results below please do another search', 'hybopress' );

			echo '</p>';

			get_search_form(); // Loads the searchform.php template.

		echo '</div><!-- .loop-description -->';

	echo '</div><!-- .loop-meta -->';

echo '</div><!-- .search-meta -->';


global $wp_query;

printf( '<div class="%s">', 'alert alert-info' );

	$page_title = strip_tags( hybrid_get_loop_title() );
	$page_title = $wp_query->found_posts ." ". $page_title;

	echo $page_title;

echo '</div><!-- .alert .alert-info -->';

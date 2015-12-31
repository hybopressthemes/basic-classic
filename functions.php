<?php

add_action( 'after_setup_theme', 'child_theme_setup_before_parent', 0 );
add_action( 'after_setup_theme', 'child_theme_setup1', 11 );
add_action( 'after_setup_theme', 'child_theme_setup2', 14 );

add_action( 'wp', 'child_theme_conditional_setup' );

function child_theme_setup_before_parent() {
}

function child_theme_setup1() {

	// Register site styles and scripts
	add_action( 'wp_enqueue_scripts', 'child_theme_register_styles' );

	// Enqueue site styles and scripts
	add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );

	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '',
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => 250,
		'width'                  => 1200,
		'max-width'              => 1200,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
	    'header-text'            => false,

	    // Callbacks for styling the header and the admin preview.
	    'wp-head-callback'       => 'child_theme_header_style',
	    'admin-head-callback'    => '',
	    'admin-preview-callback' => '',
	);

	add_theme_support( 'custom-header', $args );

	// Registering required plugin
	add_filter( 'hybopress_registered_plugins', 'child_theme_registered_plugins' );

}

function child_theme_register_styles() {
	wp_register_style( 'child-fonts', '//fonts.googleapis.com/css?family=Droid+Serif:400,700|Roboto:300,400,700' );

	$main_styles = trailingslashit( HYBRID_CHILD_URI ) . "assets/css/child-style.css";

	wp_register_style(
		sanitize_key(  'child-style' ), esc_url( $main_styles ), array( 'skin' ), PARENT_THEME_VERSION, esc_attr( 'all' )
	);
}

function child_theme_enqueue_styles() {
	wp_enqueue_style( 'child-fonts' );
	wp_enqueue_style( 'child-style' );
}

function child_theme_setup2() {
	add_filter( 'hybopress_use_cache', 'child_theme_use_cache' );
}

function child_theme_conditional_setup() {
	if ( is_search() ) {
		remove_action( 'hybopress_before_loop', 'hybopress_loop_meta' );
		add_action( 'hybopress_before_loop', 'child_theme_do_search_box' );
	}
}


function child_theme_do_search_box() {
	locate_template( array( 'misc/search-box.php' ), true );
}

function child_theme_use_cache( $use_cache ) {
	return true;
}

/**
 * Add header image if available.
 *
 * @return void
 */
function child_theme_header_style() {
    $header_image = get_header_image();

    // If no header image is set, bailout
    if ( empty( $header_image ) ) {
        return;
    }

    // If we get this far, we have custom styles.

    printf( '<style type="text/css">' );

	    if ( ! empty( $header_image ) ) {
	        ?>
	            .site-header {
	                background: url(<?php header_image(); ?>) no-repeat scroll top;
	                background-size: 1200px auto;
	            }
	        <?php
	    }

	echo '</style>';

}

function child_theme_registered_plugins( $registered_plugins ) {

	$registered_plugins[] = array(
								'name'      => 'Custom Header Extended',
								'slug'      => 'custom-header-extended',
								'required'  => false,
							);

	return $registered_plugins;

}

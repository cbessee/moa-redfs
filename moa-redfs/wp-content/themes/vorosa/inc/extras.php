<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package vorosa
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function vorosa_body_classes( $classes ) {
	$vorosa_opt = vorosa_get_opt();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// custom body class 

	$vorosa_layout_width = isset($vorosa_opt['vorosa_layout_width']) ? $vorosa_opt['vorosa_layout_width'] : '';
	if ( isset( $vorosa_layout_width ) ) {
		$vorosa_layout_width_value = $vorosa_layout_width;
	} else {
		$vorosa_layout_width_value = $vorosa_layout_width;
	};

	if( isset( $vorosa_layout_width_value ) && 'boxed-layout' == $vorosa_layout_width_value){
		$classes[] = 'boxed-layout-active';
	}else{
		$classes[] = 'wide-layout-active';
	}

	// Header layout classes

	$header_style = isset($vorosa_opt ['vorosa_header_layout']) ? $vorosa_opt ['vorosa_header_layout'] : '';

	if ($header_style == '1') {
	 	$classes[] = 'header-style-1';
	}

	if ($header_style == '2') {
	 	$classes[] = 'header-style-2';
	}

	if ($header_style == '3') {
	 	$classes[] = 'header-one-page';
	}

	return $classes;
}
add_filter( 'body_class', 'vorosa_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function vorosa_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'vorosa_pingback_header' );
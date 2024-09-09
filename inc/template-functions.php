<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package TPG_theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function TPG_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'TPG_theme_body_classes' );
/**
 * Custom Read more button
 */

 function modify_read_more_link (){
	 return'<p><a class="more-link btn btn-default" href="' . get_permalink() . '">Read more</a></p>';

 }
 add_filter('the_content_more_link', 'modify_read_more_link');
/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function TPG_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'TPG_theme_pingback_header' );

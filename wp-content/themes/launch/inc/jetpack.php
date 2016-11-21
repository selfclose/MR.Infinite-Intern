<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package understrap
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function launch_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
        'type' => 'scroll',
        'posts_per_page' => '1000',
        'render' => false,
	) );
}
add_action( 'after_setup_theme', 'launch_jetpack_setup' );

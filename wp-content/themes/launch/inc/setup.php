<?php

if ( ! function_exists( 'launch_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function launch_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on understrap, use a find and replace
	 * to change 'launch' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'launch', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'launch' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
    
    /*
	 * Adding Thumbnail basic support
	 */
    add_theme_support( "post-thumbnails" );
    add_image_size( 'launch-wide', 760, 280, true );
    add_image_size( 'launch-square', 680, 500, true );
    add_image_size( 'launch-rectangle', 800, 400, true );
    add_image_size( 'launch-sidebar-thumbnail', 100, 75, true );
    add_image_size( 'launch-featured', 762, 508, true );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'launch_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Set up the Wordpress Theme logo feature.
	add_theme_support('custom-logo');
    
}
endif; // launch_setup
add_action( 'after_setup_theme', 'launch_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function launch_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'launch_content_width', 640 );
}
add_action( 'after_setup_theme', 'launch_content_width', 0 );

/**
* Adding the Read more link to excerpts
*/
/*function new_excerpt_more( $more ) {
	return ' <p><a class="read-more btn btn-default" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'launch') . '</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );*/
/* Removes the ... from the excerpt read more link */
function launch_custom_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'launch_custom_excerpt_more' );


/* Adds a custom read more link to all excerpts, manually or automatically generated */

function launch_all_excerpts_get_more_link($post_excerpt) {

    return $post_excerpt . ' [...] <span class="continue-reading"> <a href="' . get_permalink() . '">' . __('continue reading &raquo;', 'launch') . '</a></span>';
}
add_filter('wp_trim_excerpt', 'launch_all_excerpts_get_more_link');
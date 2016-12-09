<?php
/**
 * understrap enqueue scripts
 *
 * @package understrap
 */

function launch_scripts() {
    wp_enqueue_style( 'launch-understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), '0.4.4');
    wp_enqueue_style( 'launch-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i');
    wp_enqueue_style( 'launch-styles', get_stylesheet_directory_uri() . '/style.css', array(), '0.4.4');
    wp_enqueue_style( 'launch-multicolumnsrow-css', get_stylesheet_directory_uri() . '/css/multi-columns-row.css');
    wp_enqueue_script('jquery'); 
    wp_enqueue_script( 'launch-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), '0.4.4', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'launch_scripts' );

/** 
*Loading slider script conditionally
**/

if ( is_active_sidebar( 'hero' ) ):
add_action("wp_enqueue_scripts","launch_slider");
  
function launch_slider(){
    if ( is_front_page() ) {    
    $data = array(
    	"timeout"=>get_theme_mod( 'launch_theme_slider_time_setting', 5000 ),
    	"items"=>get_theme_mod( 'launch_theme_slider_count_setting', 1 )
    	);

    wp_enqueue_script("launch-slider-script", get_stylesheet_directory_uri() . '/js/slider_settings.js', array(), '0.4.4');
    wp_localize_script( "launch-slider-script", "launch_slider_variables", $data );
    }
}
endif;


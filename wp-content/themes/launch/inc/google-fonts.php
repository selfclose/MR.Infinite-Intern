<?php
/**
 * understrap google fonts
 *
 * @package understrap
 */

function launch_google_fonts() {
	$query_args = array(
		'family' => 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i'
		//'subset' => 'latin,latin-ext',
	);
	wp_register_style( 'launch_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }
            
add_action('wp_enqueue_scripts', 'launch_google_fonts');
<?php
/**
 * Declaring widgets
 *
 *
 * @package understrap
 */

function launch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'launch' ),
		'id'            => 'sidebar-1',
		'description'   => 'Sidebar widget area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
        
    register_sidebar( array(
        'name'          => __( 'Footer', 'launch' ),
        'id'            => 'footer',
        'description'   => 'Widgets area in the footer',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );
    
    register_sidebar( array(
        'name'          => __( 'Front Featured', 'launch' ),
        'id'            => 'front-featured',
        'description'   => 'Widgets area on the front page below the header and above the main content area.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s col-md-4">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ) );

}
add_action( 'widgets_init', 'launch_widgets_init' );
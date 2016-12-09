<?php
/**
 * understrap Theme Customizer
 *
 * @package understrap
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function launch_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'launch_customize_register' );

function launch_theme_customize_register( $wp_customize ) {
    
    // Primary color //
    $wp_customize->add_setting(
        'launch_primary_color',
        array(
            'default'     => '#339ed5',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'launch_primary_color',
        array(
            'label'       => esc_html__( 'Primary Color', 'launch' ),
            'section'     => 'colors',
            'settings'   => 'launch_primary_color'
        )
    ));
    
    // Secondary color //
    $wp_customize->add_setting(
        'launch_secondary_color',
        array(
            'default'     => '#e54e53',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
        'launch_secondary_color',
        array(
            'label'       => esc_html__( 'Secondary Color', 'launch' ),
            'section'     => 'colors',
            'settings'   => 'launch_secondary_color'
        )
    ));
    
    // Front Page Header //
    $wp_customize->add_section( 'launch_header_section' , array(
            'title'       => __( 'Front Page Header', 'launch' ),
            'priority'    => 10,
            'description' => __( 'This section controls the top header on the front page of your website.', 'launch' ),
    ) );
    
    $wp_customize->add_setting( 'launch_header_title', array(
            'default' => __( 'Launch Wordpress Theme', 'launch' ),
            'sanitize_callback'	=> 'launch_sanitize_text'
    ) );
    
    $wp_customize->add_control( 'launch_header_title', array(
            'label'    => __( 'Title Line 1', 'launch' ),
            'type'      => 'text',
            'section'  => 'launch_header_section',
            'settings' => 'launch_header_title',
    ) );
    
    $wp_customize->add_setting( 'launch_header_tagline', array(
            'default' => __( 'Launch is a responsive e-commerce WordPress theme perfect to market your products and services.', 'launch' ),
            'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_control( 'launch_header_tagline', array(
            'label'    => __( 'Tagline', 'launch' ),
            'type'      => 'textarea',
            'section'  => 'launch_header_section',
            'settings' => 'launch_header_tagline',
    ) );
    
    $wp_customize->add_setting( 'launch_header_button_text', array(
            'default' => __( 'Get Started', 'launch' ),
            'sanitize_callback'	=> 'launch_sanitize_text'
    ) );
    
    $wp_customize->add_control( 'launch_header_button_text', array(
            'label'    => __( 'Button Text', 'launch' ),
            'type'      => 'text',
            'section'  => 'launch_header_section',
            'settings' => 'launch_header_button_text',
    ) );
    
    $wp_customize->add_setting( 'launch_header_button_url', array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'launch_header_button_url', array(
            'label'    => __( 'Button Link', 'launch' ),
            'type'      => 'text',
            'section'  => 'launch_header_section',
            'settings' => 'launch_header_button_url',
    ) );

    $wp_customize->add_setting( 'launch_header_button_toggle', array( 
        'sanitize_callback' => 'esc_attr',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
        'launch_header_button_toggle',
        array(
            'label'     => __('Disable Button', 'launch'),
            'description' => __('Check the box to disable the button.', 'launch'),
            'section'   => 'launch_header_section',
            'settings'  => 'launch_header_button_toggle',
            'type'      => 'checkbox',
        )
    ) );

    // FOOTER SOCIAL SECTION //
    $wp_customize->add_section( 'launch_social_section' , 
        array(
            'title'       => __( 'Social', 'launch' ),
            'priority'    => 35,
            'description' => __( 'This section controls the links for the social icons in the footer. If you leave a field blank the icon will not be displayed.', 'launch' ),
	) );
    
    $wp_customize->add_setting( 'launch_social_facebook',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_facebook', 
        array(
            'label'     => __( 'Facebook Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_facebook',
            'description' => __( 'Enter the link to your Facebook profile page.', 'launch' ),
    ));
    
    $wp_customize->add_setting( 'launch_social_twitter',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_twitter', 
        array(
            'label'     => __( 'Twitter Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_twitter',
            'description' => __( 'Enter the link to your Twitter profile page.', 'launch' ),
    ));
    
    $wp_customize->add_setting( 'launch_social_linkedin',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_linkedin', 
        array(
            'label'     => __( 'Linkedin Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_linkedin',
            'description' => __( 'Enter the link to your Linkedin profile page.', 'launch' ),
    ));
    
    $wp_customize->add_setting( 'launch_social_pinterest',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_pinterest', 
        array(
            'label'     => __( 'Pinterest Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_pinterest',
            'description' => __( 'Enter the link to your Pinterest profile page.', 'launch' ),
    ));
    
    $wp_customize->add_setting( 'launch_social_google',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_google', 
        array(
            'label'     => __( 'Google Plus Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_google',
            'description' => __( 'Enter the link to your Google Plus profile page.', 'launch' ),
    ));
    
    $wp_customize->add_setting( 'launch_social_instagram',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_instagram', 
        array(
            'label'     => __( 'Instagram Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_instagram',
            'description' => __( 'Enter the link to your Instagram profile page.', 'launch' ),
    ));
    
    $wp_customize->add_setting( 'launch_social_youtube',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_youtube', 
        array(
            'label'     => __( 'Youtube Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_youtube',
            'description' => __( 'Enter the link to your Youtube profile page.', 'launch' ),
    ));
    
    $wp_customize->add_setting( 'launch_social_tumblr',
        array(
            'default'     => '#',
            'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control(
        'launch_social_tumblr', 
        array(
            'label'     => __( 'Tumblr Profile URL', 'launch' ),
            'section'   => 'launch_social_section',
            'type'      => 'text',
            'settings'  => 'launch_social_tumblr',
            'description' => __( 'Enter the link to your Tumblr profile page.', 'launch' ),
    ));
    
    // FOOTER SECTION //
    $wp_customize->add_section( 'launch_footer_section' , 
        array(
            'title'       => __( 'Footer', 'launch' ),
            'priority'    => 40,
	) );
    
    // Footer Copyright //
    $wp_customize->add_setting(
        'launch_footer_copyright', array(
            'sanitize_callback'	=> 'launch_sanitize_text'
    ) );
    
    $wp_customize->add_control(
        'launch_footer_copyright', 
        array(
            'label'     => __( 'Copyright Text', 'launch' ),
            'section'   => 'launch_footer_section',
            'type'      => 'textarea',
            'settings'  => 'launch_footer_copyright',
            'description' => __( 'Change the copyright text which appears at the bottom of the footer.', 'launch' ),
    ));
    
    // Sanitize text
	function launch_sanitize_text( $text ) {
	    return sanitize_text_field( $text );
	}

}
add_action( 'customize_register', 'launch_theme_customize_register' );

/**
 * Set up the WordPress core custom header feature.
 */
function launch_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'launch_custom_header_args', array(
        'flex-width'    => true,
        'width'         => 762,
        'flex-height'    => true,
        'height'        => 508,
        'default-image' => get_template_directory_uri() . '/images/featured-product-image.png',
        'header-text'   => false,
    ) ) );
}
add_action( 'after_setup_theme', 'launch_custom_header_setup' );


/**
 * Output the styles from the customizer
 */
function launch_customizer_css() {
    ?>
    <style type="text/css">
        a:hover, a:focus {color:<?php echo get_theme_mod( 'launch_primary_color' ); ?>;}
        .widget-area aside .widget-title {border-left-color: <?php echo get_theme_mod( 'launch_primary_color' ); ?>;}
        #wrapper-footer, #wrapper-footer-full, .header, .header-featured, #wrapper-footer .widget_mc4wp_form_widget .input-group-addon, .header-featured .jumbotron {background-color: <?php echo get_theme_mod( 'launch_primary_color' ); ?>}
        .btn-primary.focus, .btn-primary:focus, .btn-primary:hover, .btn-primary, .post .cat-links a {background-color: <?php echo get_theme_mod( 'launch_secondary_color' ); ?>;}
        .btn-primary.focus, .btn-primary:focus, .btn-primary:hover, .btn-primary {border-color: <?php echo get_theme_mod( 'launch_secondary_color' ); ?>;}
    </style>
    <?php
}
add_action( 'wp_head', 'launch_customizer_css' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function launch_customize_preview_js() {
	wp_enqueue_script( 'launch_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'launch_customize_preview_js' );

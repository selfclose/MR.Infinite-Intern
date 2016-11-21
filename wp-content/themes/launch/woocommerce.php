<?php
/**
 /*
 * The template for displaying woocommerce content.
 *
 * This is the template that displays all woocommerce content.
 *
 *
 * @package understrap
 */

get_header(); ?>

<?php if (is_front_page()) { ?>

<div id="header-featured" class="wrapper header-featured">

    <div class="container">

        <div class="jumbotron">
            
            <h1><?php echo get_theme_mod( 'launch_header_title', __('Launch Wordpress Theme','launch') ); ?></h1>
            
            <p class="lead margin-bottom-30"><?php echo get_theme_mod( 'launch_header_tagline', __('Launch is a responsive e-commerce WordPress theme perfect to market your products and services.','launch') ); ?></p>
            
            <?php if ( get_theme_mod( 'launch_header_button_toggle' ) == '' ) { ?>
                <p><a class="btn btn-lg btn-primary" href="<?php echo esc_url( get_theme_mod( 'launch_header_button_url', '#' ) ); ?>" role="button"><?php echo get_theme_mod( 'launch_header_button_text', __('Get Started','launch') ); ?></a></p>
            <?php } ?>
            
            <?php if ( has_header_image() ) { ?>
                <div clas="center-block">

                    <img class="img-responsive featured-image" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" />

                </div>
            <?php } ?>

        </div>

    </div>

</div>

<div id="widgets-featured" class="wrapper widgets-featured">

    <div class="container">

        <div class="row multi-columns-row">

            <?php dynamic_sidebar( 'front-featured' ); ?>

        </div>

    </div>

</div>

<?php } ?>

<div class="wrapper" id="page-wrapper">
    
    <div  id="content" class="container">

        <div class="row">
        
    	   <div id="primary" class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-7<?php else : ?>col-md-12<?php endif; ?> content-area">
           
                 <main id="main" class="site-main" role="main">

                    <?php woocommerce_content(); ?>

                </main><!-- #main -->
               
    	    </div><!-- #primary -->
            
            <?php get_sidebar(); ?>

        </div><!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>

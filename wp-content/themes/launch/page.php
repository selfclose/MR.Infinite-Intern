<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

<?php if ( is_active_sidebar( 'front-featured' ) ) { ?>

<div id="widgets-featured" class="wrapper widgets-featured">

    <div class="container">

        <div class="row multi-columns-row">

            <?php dynamic_sidebar( 'front-featured' ); ?>

        </div>

    </div>

</div>

<?php } ?>

<?php } ?>

<div class="wrapper" id="page-wrapper">
    
    <div  id="content" class="container">

        <div class="row">
        
    	   <div id="primary" class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-7<?php else : ?>col-md-12<?php endif; ?> content-area">
           
                 <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'page' ); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->
               
    	    </div><!-- #primary -->
            
            <?php get_sidebar(); ?>

        </div><!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>

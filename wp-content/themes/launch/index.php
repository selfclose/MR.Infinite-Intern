<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

<div class="wrapper" id="wrapper-index">
    
   <div id="content" class="container">

        <div class="row">
       
	       <div id="primary" class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-7<?php else : ?>col-md-12<?php endif; ?> content-area">
               
                 <main id="main" class="site-main" role="main">
                
                <?php if ( have_posts() ) : ?>

                    <?php /* Start the Loop */ ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'loop-templates/content', get_post_format() );
                            ?>

                    <?php endwhile; ?>
                    
                    <?php launch_paging_nav(); ?>
                    
                <?php else : ?>

                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                    
                <?php endif; ?>
                    
                </main><!-- #main -->
               
	       </div><!-- #primary -->
    
        <?php get_sidebar(); ?>

        </div><!-- .row -->
       
   </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>

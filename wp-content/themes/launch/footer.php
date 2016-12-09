<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Themely
 */
?>

<?php if ( is_active_sidebar( 'footer' ) ) { ?>
    
<div class="wrapper" id="wrapper-footer">

    <div class="container">

        <div class="row">
                
                <?php dynamic_sidebar( 'footer' ); ?>

        </div><!-- row end -->
        
    </div><!-- container end -->
    
</div><!-- wrapper end -->

<?php } ?>

<div class="wrapper" id="wrapper-footer-full">
    
    <div class="container">

        <div class="row">

            <div class="col-md-6">
    
                <footer id="colophon" class="site-footer" role="contentinfo">

                    <div class="site-info">

                        <?php if ( get_theme_mod( 'launch_footer_copyright' ) ) : ?>

                        <?php echo get_theme_mod( 'launch_footer_copyright' ); ?>

                        <?php else : ?>

                        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'launch' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'launch' ), 'WordPress' ); ?></a>
                        <span class="sep"> | </span>
                        <?php printf( __( 'Made with love by %2$s', 'launch' ), 'launch', '<a href="https://www.themely.com/" rel="designer">Themely</a>' ); ?>

                        <?php endif; ?>

                    </div><!-- .site-info -->

                </footer><!-- #colophon -->
                
            </div><!--col end -->

            <div class="col-md-6">

                    <ul class="social-icons pull-right">
                        <li><a class="icon fa fa-rss" href="<?php echo get_home_url(); ?>/?feed=rss2" data-original-title="RSS"></a></li>
                        <?php if ( get_theme_mod( 'launch_social_facebook' ) ) { ?><li><a class="icon fa fa-facebook" href="<?php echo esc_url( get_theme_mod( 'launch_social_facebook', '#') ); ?>" target="_blank"></a></li><?php } ?>
                        <?php if ( get_theme_mod( 'launch_social_twitter' ) ) { ?><li><a class="icon fa fa-twitter" href="<?php echo esc_url( get_theme_mod( 'launch_social_twitter', '#') ); ?>" target="_blank"></a></li><?php } ?>
                        <?php if ( get_theme_mod( 'launch_social_linkedin' ) ) { ?><li><a class="icon fa fa-linkedin" href="<?php echo esc_url( get_theme_mod( 'launch_social_linkedin', '#') ); ?>" target="_blank"></a></li><?php } ?>
                        <?php if ( get_theme_mod( 'launch_social_pinterest' ) ) { ?><li><a class="icon fa fa-pinterest" href="<?php echo esc_url( get_theme_mod( 'launch_social_pinteresr', '#') ); ?>" target="_blank"></a></li><?php } ?>
                        <?php if ( get_theme_mod( 'launch_social_google' ) ) { ?><li><a class="icon fa fa-google-plus" href="<?php echo esc_url( get_theme_mod( 'launch_social_google', '#') ); ?>" target="_blank"></a></li><?php } ?>
                        <?php if ( get_theme_mod( 'launch_social_instagram' ) ) { ?><li><a class="icon fa fa-instagram" href="<?php echo esc_url( get_theme_mod( 'launch_social_instagram', '#') ); ?>" target="_blank"></a></li><?php } ?>
                        <?php if ( get_theme_mod( 'launch_social_youtube' ) ) { ?><li><a class="icon fa fa-youtube" href="<?php echo esc_url( get_theme_mod( 'launch_social_youtube', '#') ); ?>" target="_blank"></a></li><?php } ?>
                        <?php if ( get_theme_mod( 'launch_social_tumblr' ) ) { ?><li><a class="icon fa fa-tumblr" href="<?php echo esc_url( get_theme_mod( 'launch_social_tumblr', '#') ); ?>" target="_blank"></a></li><?php } ?>
                    </ul>
                    
            </div>

        </div><!-- row end -->
        
    </div><!-- container end -->
    
</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
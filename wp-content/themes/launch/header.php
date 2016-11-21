<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php echo get_theme_mod( 'launch_theme_script_code_setting' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
    <div class="wrapper header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 vcenter">
                    <?php if (!has_custom_logo()) : ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <span class="lead"><?php bloginfo( 'description' ); ?></span>
                    <?php else : ?>
                        <?php echo the_custom_logo() ?>
                    <?php endif; ?>
                    
                </div>
                <div class="col-md-8 pull-right">
                    
                    <a class="skip-link screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content', 'launch' ); ?></a>

                    <nav class="navbar navbar-dark site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

                        <div class="navbar-header">

                            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->

                            <button class="navbar-toggle hidden-lg-up" type="button" data-toggle="collapse" data-target=".exCollapsingNavbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- The WordPress Menu goes here -->
                            <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'depth' => 3,
                                        'container_class' => 'collapse navbar-toggleable-md exCollapsingNavbar',
                                        'menu_class' => 'nav navbar-nav navbar-right',
                                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                        'menu_id' => 'main-menu',
                                        'walker' => new wp_bootstrap_navwalker()
                                    )
                            ); ?>
                        </div>
                    </nav><!-- .site-navigation -->
                </div>
            </div>
        </div>
    </div>
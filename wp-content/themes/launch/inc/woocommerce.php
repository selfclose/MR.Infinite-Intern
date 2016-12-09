<?php
/**
 * Add WooCommerce support
 *
 *
 * @package understrap
 */

add_action( 'after_setup_theme', 'launch_woocommerce_support' );
function launch_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
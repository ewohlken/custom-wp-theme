<?php
/**
 * Use this file to enqueue your scripts and stylesheets. By default, only two are included
 * as this theme was developed using Grunt/Gulp and the scripts inside the js folder were
 * concatenated and minified into one file: js/app.min.js
 * @subpackage Custom_Platform
 */

add_action( 'wp_enqueue_scripts', 'custom_enqueue_all' );
function custom_enqueue_all(){
    custom_enqueue_javascripts();
    custom_enqueue_stylesheets();
}

/**
 * Register and enqueue stylesheets
 * @return void
 */
function custom_enqueue_stylesheets(){
    // register stylesheets
    wp_register_style('custom', custom_get_stylesheet('app.css'), array(), THEME_VERSION, 'all');

    // enqueue stylesheets
    wp_enqueue_style( 'custom' );
}

/**
 * Register and enqueue javascripts
 * @return void
 */
function custom_enqueue_javascripts(){
    // deregister the jquery version bundled with WordPress
    wp_deregister_script( 'jquery' );

    // register scripts
    wp_register_script('jquery', custom_get_vendor_script('jquery/jquery.min.js'), array(), '2.1.3 ', false);
    wp_register_script('custom', custom_get_script('app.js'), array('jquery'), THEME_VERSION, true);

    // enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('custom');
}

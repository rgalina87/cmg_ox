<?php
define( 'THEME_FILES_VERSION', '6.2.2');

if (!function_exists('ox_include_css_theme')) {

    function ox_include_css_theme()
    {
        wp_enqueue_style('lp-css', get_stylesheet_directory_uri() . '/css/lp.css', array(), THEME_FILES_VERSION);
        wp_enqueue_style('careers-style', get_stylesheet_directory_uri() . '/css/careers.css' , array(), THEME_FILES_VERSION);
        wp_enqueue_style('glossary-style', get_stylesheet_directory_uri() . '/css/glossary.css' , array(), THEME_FILES_VERSION);
        wp_enqueue_style('partnership-style', get_stylesheet_directory_uri() . '/css/partnership.css', array(), THEME_FILES_VERSION);
    }

    // wp_dequeue_style('elementor-pro-css');


    add_action('wp_enqueue_scripts', 'ox_include_css_theme');

}

if (!function_exists('ox_enqueue_admin_assets')) {
    /**
     * Enqueue admin CSS and JavaScript assets
     */
    function ox_enqueue_admin_assets()
    {
        // wp_enqueue_style('sorrel-admin', get_stylesheet_directory_uri() . '/assets/css/admin.css');
    }

    add_action('admin_enqueue_scripts', 'ox_enqueue_admin_assets');
}
add_theme_support('post-thumbnails', array('post'));




?>

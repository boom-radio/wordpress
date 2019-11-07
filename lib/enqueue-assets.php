<?php

//File for enqueuing all assets

if (!function_exists('boom_radio_assets')) {
    function boom_radio_assets()
    {

        //Google Fonts Stylesheet
        wp_enqueue_style('fjalla_font_stylesheet', '//fonts.googleapis.com/css?family=Fjalla+One', false, '1.0.0', 'all');
        wp_enqueue_style('quicksand_font_stylesheet', '//fonts.googleapis.com/css?family=Quicksand', false, '1.0.0', 'all');

        //Slick carousel stylesheets and slick theme
        wp_enqueue_style('boom_radio_slick', get_template_directory_uri() . '/src/assets/vendor/slick/slick.css', array(), '1.0.0', 'all');
        wp_enqueue_style('boom_radio-slick_theme', get_template_directory_uri() . '/src/assets/vendor/slick/slick-theme.css', array(), '1.0.0', 'all');
        //REPLACED --- wp_enqueue_style('boom_radio_slick', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', false, '1.8.1', 'all');
        //REPLACED --- wp_enqueue_style('boom_radio-slick_theme', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css', false, '1.8.1', 'all');

        //Foundation CDN files
        wp_enqueue_style('foundation_min_stylesheet', '//cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/css/foundation.min.css', false, '6.5.3', 'all');
        //DO NOT USE --- wp_enqueue_style('foundation_min_stylesheet', get_template_directory_uri() . '/src/assets/vendor/foundation/css/foundation.css', false, '6.5.3', 'all');

        //Main theme stylesheet
        wp_enqueue_style('boom_radio_stylesheet', get_template_directory_uri() . '/style.css', false, '1.0.0', 'all');

        //All upload Fontawesome styling for navigation bar and footer
        wp_enqueue_style('boom_radio_fontawesome_stylesheet', get_template_directory_uri() . '/src/assets/fonts/fa/css/all.css', false, '1.0.0', 'all');

        //This code below allow Foundation JS to work (off-canvas...)
        // Deregister the jquery version bundled with WordPress.
        wp_deregister_script('jquery');
        // CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false);
        // Deregister the jquery-migrate version bundled with WordPress.
        wp_deregister_script('jquery-migrate');
        // CDN hosted jQuery migrate for compatibility with jQuery 3.x
        wp_register_script('jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false);

        //Foundation scripts CDN
        wp_enqueue_script('foundation_min_scripts', '//cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/js/foundation.min.js', array('jquery'), '6.5.3', true);
        //DO NOT USE --- wp_enqueue_script('foundation_min_scripts', get_template_directory_uri() . '/src/assets/vendor/foundation/js/foundation.js', array('jquery'), '6.5.3', true);
        //DO NOT USE --- wp_enqueue_script('foundation_min_scripts', get_template_directory_uri() . '/src/assets/vendor/foundation/js/what-input.js', array('jquery'), '6.5.3', true);

        //Enqueues the scripts for the listen slick carousel
        wp_enqueue_script('boom_radio_slick_scripts', get_template_directory_uri() . '/src/assets/vendor/slick/slick.min.js', array('jquery'), '1.0.0', true);
        //REPLACED --- wp_enqueue_script('boom_radio_slick_scripts', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);

        //Enqueue the theme's purpose built js file - REVIEW PATH FOR DISTRIBUTION
        wp_enqueue_script('boom_radio_scripts', get_template_directory_uri() . '/src/assets/js/app.js', array('jquery'), '1.0.0', true);

        //Get the comments reply form from wp core    
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}

add_action('wp_enqueue_scripts', 'boom_radio_assets');


//To be used as a strating point if you want to style the dashboard - to view uncomment line 47 and refresh:)
if (!function_exists('boom_radio_admin_assets')) {
    function boom_radio_admin_assets()
    {
        //Google Fonts Stylesheet
        wp_enqueue_style('fjalla_font_stylesheet', '//fonts.googleapis.com/css?family=Fjalla+One', false, '1.0.0', 'all');
        wp_enqueue_style('open_sans_font_stylesheet', '//fonts.googleapis.com/css?family=Open+Sans', false, '1.0.0', 'all');

        //Main theme stylesheet
        //wp_enqueue_style('boom_radio_stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    }
}
add_action('admin_enqueue_scripts', 'boom_radio_admin_assets');

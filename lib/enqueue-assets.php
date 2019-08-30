<?php

//File for enqueuing all assets

function _themename_assets()
{

    //Google Fonts Stylesheet
    wp_enqueue_style('fjalla_font_stylesheet', '//fonts.googleapis.com/css?family=Fjalla+One', false, '1.0.0', 'all');
    wp_enqueue_style('quicksand_font_stylesheet', '//fonts.googleapis.com/css?family=Quicksand', false, '1.0.0', 'all');

    //REPLACED  with import in app.scss ---- Slick carousel stylesheets 
    //wp_enqueue_style('boom_radio_slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.css', array(), '1.0.0', 'all');
    //wp_enqueue_style('boom_radio-slick_theme', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css', array(), '1.0.0', 'all');

    //Foundation CDN files
    wp_enqueue_style('foundation_min_stylesheet', '//cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/css/foundation.min.css', false, '1.0.0', 'all');

    //Main theme stylesheet
    wp_enqueue_style('boom_radio_stylesheet', get_template_directory_uri() . '/style.css', false, '1.0.0', 'all');

    //Enqueue WordPress core jquery script
    wp_enqueue_script('jquery');

    //Foundation scripts CDN
    wp_enqueue_script('foundation_min_scripts', '//cdn.jsdelivr.net/npm/foundation-sites@6.5.3/dist/js/foundation.min.js', array('jquery'), null, true);

    //Enqueues the scripts for the listen slick carousel
    wp_enqueue_script('boom_radio_slick_scripts', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.js', array('jquery'), '1.0.0', true);

    //Enqueue the theme's purpose built js file - REVIEW PATH FOR DISTRIBUTION
    wp_enqueue_script('boom_radio_scripts', get_template_directory_uri() . '/src/assets/js/app.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', '_themename_assets');


//To be used as a strating point if you want to style the dashboard - to view uncomment line 47 and refresh:)
function boom_radio_admin_assets()
{
    //Google Fonts Stylesheet
    wp_enqueue_style('fjalla_font_stylesheet', '//fonts.googleapis.com/css?family=Fjalla+One', false, '1.0.0', 'all');
    wp_enqueue_style('quicksand_font_stylesheet', '//fonts.googleapis.com/css?family=Quicksand', false, '1.0.0', 'all');

    //Main theme stylesheet
    //wp_enqueue_style('boom_radio_stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
}

add_action('admin_enqueue_scripts', 'boom_radio_admin_assets');

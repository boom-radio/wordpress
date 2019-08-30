<?php

//File for enqueuing all assets

function _themename_assets()
{

    //Enqueue WordPress core jquery script
    wp_enqueue_script('jquery');

    //Google Fonts Stylesheet
    wp_enqueue_style('fjalla_font_stylesheet', '//fonts.googleapis.com/css?family=Fjalla+One', array(), '1.0.0', 'all');
    wp_enqueue_style('quicksand_font_stylesheet', '//fonts.googleapis.com/css?family=Quicksand', array(), '1.0.0', 'all');

    //Slick carousel stylesheets 
    wp_enqueue_style('boom_radio_slick', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.css', array(), '1.0.0', 'all');
    wp_enqueue_style('boom_radio-slick_theme', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css', array(), '1.0.0', 'all');

    //Foundation CDN files
    wp_enqueue_style('foundation_min_stylesheet', '//cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/css/foundation.min.css', array(), '1.0.0', 'all');

    //Main theme stylesheet
    wp_enqueue_style('boom_radio_stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');

    //this code below allow Foundation JS to work (off-canvas...)
        // Deregister the jquery version bundled with WordPress.
		wp_deregister_script( 'jquery' );
		// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1', false );
		// Deregister the jquery-migrate version bundled with WordPress.
		wp_deregister_script( 'jquery-migrate' );
		// CDN hosted jQuery migrate for compatibility with jQuery 3.x
        wp_register_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.1.min.js', array('jquery'), '3.0.1', false );
        

    wp_enqueue_script('foundation_min_scripts', '//cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/js/foundation.min.js', array(), null, true);

    //Enqueues the scripts for the listen slick carousel
    wp_enqueue_script('boom_radio_slick_scripts', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.js', array(), '1.0.0', true);

    //Enqueue the theme's purpose built js file - REVIEW PATH FOR DISTRIBUTION
    wp_enqueue_script('boom_radio_scripts', get_template_directory_uri() . '/src/assets/js/app.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', '_themename_assets');


//To be used as a strating point if you want to style the dashboard - to view uncomment line 47 and refresh:)
function boom_radio_admin_assets()
{
    //Google Fonts Stylesheet
    wp_enqueue_style('fjalla_font_stylesheet', '//fonts.googleapis.com/css?family=Fjalla+One', array(), '1.0.0', 'all');
    wp_enqueue_style('quicksand_font_stylesheet', '//fonts.googleapis.com/css?family=Quicksand', array(), '1.0.0', 'all');
    //Main theme stylesheet
    //wp_enqueue_style('boom_radio_stylesheet', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
}

add_action('admin_enqueue_scripts', 'boom_radio_admin_assets');

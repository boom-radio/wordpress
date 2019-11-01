<?php

//For site wide control of multiple sidebars
if (!function_exists('boom_radio_sidebar_widgets')) {
    function boom_radio_sidebar_widgets()
    {
        register_sidebar(array(
            'id' => 'primary-sidebar',
            'name' => esc_html__('Primary Sidebar', 'boom_radio'),
            'description' => esc_html__('This sidebar appears in the blog posts page', 'boom_radio'),
            'before_widget' => '<div id="%1$s" class="%2$s cell medium-8">',
            'after_widget' => '</div>',
            'before_title' => '<h5>',
            'after_title' => '</h5>'
        ));
    }
}

add_action('widgets_init', 'boom_radio_sidebar_widgets');

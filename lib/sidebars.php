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

//Function to get the post/page title and where the function is used, to create a class (pageTitle-whereUsed)
if (!function_exists('check_page_title_to_return_a_class')) {
    //Variable $pageTitleString is filled by the "get_the_title() WP function
    function check_page_title_to_return_a_class($pageTitleString, $functionUsedWhere)
    {
        //The following line of code breaks the string ($pageTitleString) into smaller strings (tokens -> $token)
        $token = strtok($pageTitleString, " ");
        //Lowercasing the strings created by the strtok function above
        $pageTitleClass = strtolower($token);
        //Echoing the constructed class
        echo $pageTitleClass . '-' . $functionUsedWhere;
    }
}

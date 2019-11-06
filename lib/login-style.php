<?php

//Attached seperate styelsheet to be initited only on login header
if (!function_exists('boom_custom_login')) {
    function boom_custom_login()
    {
        echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/boom-login-style.css" />';
    }
}
add_action('login_head', 'boom_custom_login');

//When clicking lgoin logo send to Boom radio homepage
if (!function_exists('boom_login_logo_url')) {
    function boom_login_logo_url()
    {
        return get_bloginfo('url');
    }
}
add_filter('login_headerurl', 'boom_login_logo_url');

//Attach site title option
if (!function_exists('boom_login_logo_url_title')) {
    function boom_login_logo_url_title()
    {
        return 'Default Site Title';
    }
}
add_filter('login_headertitle', 'boom_login_logo_url_title');

//Change text in Error message
if (!function_exists('boom_login_error_message')) {
    function boom_login_error_message()
    {
        return 'Please enter correct Boom Radio logins';
    }
}
add_filter('login_errors', 'boom_login_error_message');

//Disable login shake on incorrect entry
if (!function_exists('custom_login_head')) {
    function custom_login_head()
    {
        remove_action('login_head', 'wp_shake_js', 12);
    }
}

add_action('login_head', 'custom_login_head');

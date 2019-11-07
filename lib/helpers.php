<?php

//Function for site wide White Boom Radio Read more links
if (!function_exists('boom_radio_readmore_link')) {
    function boom_radio_readmore_link()
    {
        //echo '<div class="cell">';
        echo '<a class="boom-button-white float-right" href="' . esc_url(get_permalink()) . '" title="' . esc_html__(the_title_attribute(['echo' => false])) . '">Read More...';
        echo '</a>';
        //echo '</div>';
    }
}

if (!function_exists('boom_radio_card_link')) {
    function boom_radio_card_link()
    {
        //echo '<div class="cell">';
        echo '<a class="boom-button float-right" href="' . esc_url(get_permalink()) . '" title="' . esc_html__(the_title_attribute(['echo' => false])) . '">Read More...';
        echo '</a>';
        //echo '</div>';
    }
}

//Function for Front Page Schedule Section
if (!function_exists('boom_radio_card_show')) {
    function boom_radio_card_show()
    {
        //echo '<div class="cell">';
        echo '<a class="boom-button float-right" href="' . esc_url(get_permalink()) . '" title="' . esc_html__(the_title_attribute(['echo' => false])) . '">More Shows...';
        echo '</a>';
        //echo '</div>';
    }
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if (!function_exists('wpdocs_custom_excerpt_length')) {
    function wpdocs_custom_excerpt_length($length)
    {
        return 25;
    }
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */

//Excerpt link conditional loop for single post permalink formatting and styling
if (!function_exists('wpdocs_excerpt_more')) {
    function wpdocs_excerpt_more($more)
    {
        if (!is_single()) {
            $more = sprintf(
                '<span>%1$s</span>',
                __('...', 'boom_radio')
            );
        }

        return $more;
    }
}


add_filter('excerpt_more', 'wpdocs_excerpt_more');

//Global function to allow is_post_type('post_type') to be used in conditional loops throuout the site
function is_post_type($type)
{
    global $wp_query;
    if ($type == get_post_type($wp_query->post->ID))
        return true;
    return false;
}

//automatise plugins update
add_filter( 'auto_update_plugin', '__return_true' );


//Error message handler for comments
if (!function_exists('boom_comment_error')) {
    function boom_comment_error($message, $title = '', $args = array())
    {
        $errorTemplate = get_theme_root() . '/' . get_template() . '/commenterror.php';
        $defaults = array('response' => 500);
        $r = wp_parse_args($args, $defaults);

        $have_gettext = function_exists('__');

        if (function_exists('is_wp_error') && is_wp_error($message)) {
            if (empty($title)) {
                $error_data = $message->get_error_data();
                if (is_array($error_data) && isset($error_data['title']))
                    $title = $error_data['title'];
            }
            $errors = $message->get_error_messages();
            switch (count($errors)) {
                case 0:
                    $message = '';
                    break;
                case 1:
                    $message = "<p>{$errors[0]}</p>";
                    break;
                default:
                    $message = "<ul>\n\t\t<li>" . join("</li>\n\t\t<li>", $errors) . "\n\t";
                    break;
            }
        } elseif (is_string($message)) {
            $message = "<p>$message</p>";
        }

        require_once($errorTemplate);
        die();
    }
}

if (!function_exists('get_boom_comment_error')) {
    function get_boom_comment_error()
    {
        return 'boom_comment_error';
    }
}

add_filter('wp_die_handler', 'get_boom_comment_error');

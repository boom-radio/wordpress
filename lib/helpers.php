<?php

//Function for site wide White Boom Radio Read more links
function boom_radio_readmore_link()
{
    //echo '<div class="cell">';
    echo '<a class="boom-button-white float-right" href="' . esc_url(get_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '">Read More...';
    echo '</a>';
    //echo '</div>';
}

function boom_radio_card_link()
{
    //echo '<div class="cell">';
    echo '<a class="boom-button float-right" href="' . esc_url(get_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '">Read More...';
    echo '</a>';
    //echo '</div>';
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
    return 20;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more($more)
{
    if (!is_single()) {
        $more = sprintf(
            '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink(get_the_ID()),
            __(' ...', 'textdomain')
        );
    }

    return $more;
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');

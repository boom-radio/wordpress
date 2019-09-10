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

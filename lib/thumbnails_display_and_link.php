<?php 
//function to set featured thumbnail image to lead to the original post
function wcs_auto_link_post_thumbnails( $html, $post_id, $post_image_id ) {
    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
    return $html;
    }
add_filter( 'post_thumbnail_html', 'wcs_auto_link_post_thumbnails', 10, 3 );

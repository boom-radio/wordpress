<?php
//function to set featured thumbnail image to lead to the original post
if (!function_exists('wcs_auto_link_post_thumbnails')) {
   function wcs_auto_link_post_thumbnails($html, $post_id)
   {
      $html = '<a href="' . esc_url(get_permalink($post_id)) . '" title="' . esc_attr(get_the_title($post_id)) . '">' . $html . '</a>';
      return $html;
   }
}
add_filter('post_thumbnail_html', 'wcs_auto_link_post_thumbnails', 99, 3);

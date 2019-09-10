<?php 
// //function to take the first picture from that article and set it as the featured image.
// function auto_featured_image() {
//     global $post;
 
//     if (!has_post_thumbnail($post->ID)) {
//         $attached_image = get_children( "post_parent=$post->ID&amp;post_type=attachment&amp;post_mime_type=image&amp;numberposts=1" );
         
//       if ($attached_image) {
//               foreach ($attached_image as $attachment_id => $attachment) {
//                    set_post_thumbnail($post->ID, $attachment_id);
//               }
//          }
//     }
// }
// // Use it temporary to generate all featured images
// add_action('the_post', 'auto_featured_image');
// // Used for new posts
// add_action('save_post', 'auto_featured_image');
// add_action('draft_to_publish', 'auto_featured_image');
// add_action('new_to_publish', 'auto_featured_image');
// add_action('pending_to_publish', 'auto_featured_image');
// add_action('future_to_publish', 'auto_featured_image');





if ( function_exists( 'add_theme_support' ) ) {

    add_theme_support( 'post-thumbnails' ); // This should be in your theme. But we add this here because this way we can have featured images before swicth to a theme that supports them.

// //function to add Featured Thumbnail to Admin Post Columns
// add_filter('manage_posts_columns', 'posts_columns', 5);
// add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

//     //add column Thumbs
// function posts_columns($defaults){
//     $defaults['riv_post_thumbs'] = __('Thumbs');
//     return $defaults;
// }
//     //display the thumbnail 150 x 150 hard cropped
// function posts_custom_columns($column_name, $id){
//     if($column_name === 'riv_post_thumbs'){
//         echo the_post_thumbnail( 'thumbnail' );
//     }
// }
//function to set featured thumbnail image to lead to the original post
function wcs_auto_link_post_thumbnails( $html, $post_id, $post_image_id ) {
    $html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
    return $html;
    }
    add_filter( 'post_thumbnail_html', 'wcs_auto_link_post_thumbnails', 10, 3 );
}


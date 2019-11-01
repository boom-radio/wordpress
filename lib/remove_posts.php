<?php
if (!function_exists('post_remove')) {
   function post_remove()      //creating functions post_remove for removing menu item
   {
      remove_menu_page('edit.php');
      remove_menu_page('quick-featured-images-overview');
      remove_menu_page('wpforms-overview');
   }
}

add_action('admin_menu', 'post_remove');   //adding action for triggering function call

<?php
//create a new menu location (non available on our current theme)
if (!function_exists('register_boom_menu')) {
  function register_boom_menu()
  {
    register_nav_menus(
      array(
        'header-menu' => __('Header Menu'),
        'side-menu' => __('Side Menu')
      )
    );
  }
}

add_action('init', 'register_boom_menu');

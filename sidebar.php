<?php

/**
 * The template for displaying Main sidebar folder for the site - functionality built in lib/sidebars.php
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */ ?>
<aside class="cell auto <?php check_page_title_to_return_a_class( get_the_title(), 'sidebar' ); ?>">
    <?php dynamic_sidebar('primary-sidebar') ?>
</aside>
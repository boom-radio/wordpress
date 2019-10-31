<?php

/**
 * The template for displaying all single About page posts
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */

get_header(); ?>
<h3>The is single-schedule.php</h3>
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <!-- empty cell for spacing -->
        <div class="cell"></div>
        <?php
        // Start the loop.
        while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/posts/gradboxsingle', get_post_format()); ?>
        <?php endwhile; ?>
        <?php get_template_part('template-parts/navigation/single_nav', get_post_format()); ?>
    </div>
</div><!-- .content-area -->
<?php get_footer(); ?>
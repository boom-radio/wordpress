<?php

/**
 * The template for displaying all single About page posts
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */

get_header(); ?>
<!--<h3>The is single-music_post.php</h3>-->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <!-- empty cell for spacing -->
        <div class="cell"></div>
        <div class="cell">
            <div class="grid-container">
                <div class="grid-x grid-margin-x grid-margin-y align-center">
                    <!-- empty cell for spacing -->
                    <div class="cell"></div>
                    <!-- start the loop -->
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/posts/gradboxsingle', get_post_format()); ?>
                    <?php endwhile; ?>
                    <?php get_template_part('template-parts/navigation/single_nav', get_post_format()); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
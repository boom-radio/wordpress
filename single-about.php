<?php

/**
 * The template for displaying all single About page posts
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */

get_header(); ?>
<h3>The is single-about.php</h3>
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <!-- empty cell for spacing -->
        <div class="cell"></div>
        <!-- * Include the post format-specific template for the content. If you want to
            * use this in a child theme, then include a file called called content-___.php
            * (where ___ is the post format) and that will be used instead.
            */-->
        <?php
        // Start the loop.
        while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/posts/gradboxsingle', get_post_format()); ?>
        <?php endwhile; ?>

        <!--Previous/next post navigation.-->
        <div class="grid-x grid-margin-x grid-margin-y">
            <div class="cell">
                <?php echo boom_radio_the_post_navigation();
                ?>
            </div>
        </div>

    </div>
</div><!-- .content-area -->
<?php get_footer(); ?>
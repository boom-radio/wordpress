<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */
get_header(); ?>
<!--Single post page-->
<!-- Go to top button -->
<?php get_template_part('template-parts/components/gototop', 'none'); ?>
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <div class="cell"></div>
        <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?> shared">
            <div class="grid-container-fluid">
                <div class="grid-x grid-margin-x grid-margin-y align-center">
                    <?php
                    // Start the loop.
                    while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/posts/single_post', get_post_format()); ?>
                        <?php get_template_part('template-parts/navigation/single_nav', get_post_format()); ?>
                    <?php endwhile; ?>
                    <!--Start of Navigation section-->
                </div>
            </div>
        </div>
        <?php if (is_active_sidebar('primary-sidebar')) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>
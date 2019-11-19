<?php
//The index page for Boom Radio with examples

/**
 * @package WordPress
 * @subpackage boom_radio
 * @since 1.0.0
 */

get_header();
?>
<h3>This is archive.php </h3>
<!--Set the latest search query variable and delivers it to the title-->
<?php get_template_part('template-parts/components/archiveresults', 'none'); ?>

<aside>
    <div class="grid-container">
        <div class="grid-x grid-padding-x grid-padding-y">
            <div class="cell"></div>
            <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '9' : '12'; ?> shared">
                <div class="grid-container">
                    <div class="grid-y grid-margin-y">
                        <?php if (have_posts()) { ?>
                            <!--The $postBackgroundColourCounter is the variable used in the posts background function and needs to be set to 0 before the beginning of WP loop-->
                            <?php $postBackgroundColourCounter = null;
                                //The $postNumber Is used into the function to swap image and paragraph left/right
                                $postNumber = null; ?>
                            <?php
                                // Start of the Loop
                                while (have_posts()) : ?>
                                <?php the_post(); ?>
                                <?php if (is_singular()) { ?>
                                    <!--Use set_query to give template parts access to variable-->
                                    <?php set_query_var('postBackgroundColourCounter', $postBackgroundColourCounter); ?>
                                    <!--Use the variable-->
                                    <?php get_template_part('template-parts/posts/varboxsingle', get_post_format()); ?>
                                <?php } else { ?>
                                    <!--Use set_query to give template parts access to variable-->
                                    <?php set_query_var('postBackgroundColourCounter', $postBackgroundColourCounter); ?>
                                    <!--Use the variable-->
                                    <?php get_template_part('template-parts/posts/varbox', get_post_format()); ?>
                                <?php } ?>
                                <?php
                                        // Increasing the value of the $postBackgroundColourCounter variable before the end of the WP loop to keep having a different post background colour
                                        $postBackgroundColourCounter++;
                                        // Increasing the $postNumber variable every loop to swap image and paragraphs left/right
                                        $postNumber++; ?>
                            <?php endwhile;
                                ?>
                            <!------------End of the loop.------------->
                            <div class="cell"></div>
                            <div class="cell">
                                <?php the_posts_pagination(array('mid_size' => 5)); ?>
                            </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <?php if (is_active_sidebar('primary-sidebar')) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</aside>
<?php
get_footer();

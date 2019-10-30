<?php
//The index page for Boom Radio with examples

/**
 * @package WordPress
 * @subpackage boom_radio
 * @since 1.0.0
 */

get_header();
?>
<!--Set the latest search query variable and delivers it to the title-->
<h3>This is index.php</h3>
<div class="grid-container">
    <div class="grid-x grid-padding-x grid-padding-y">
        <?php if (!is_singular()) { ?>
            <div class="cell">
                <h3 class="c-comments__title">
                    <?php
                        /* translators: 1 is number of comments  and 2 is post title*/
                        printf(
                            esc_html__(
                                'Search results for: "%1$s"',
                                'boom_radio'
                            ),
                            get_search_query()
                        )
                        ?>
                </h3>
            </div>
        <?php } ?>
    </div>
</div>

<aside>
    <!--Addition of some Foundation classes used in the prototype-->
    <div class="grid-container">
        <div class="grid-x grid-padding-x grid-padding-y">
            <div class="cell"></div>
            <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?> shared">
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
                                    <div <?php post_class('cell'); ?>>
                                        <div class="grid-container gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
                                            <div class="grid-x grid-padding-x grid-padding-y">
                                                <div class="cell">
                                                    <div class="grid-container">
                                                        <div class="grid-x grid-padding-x">
                                                            <h2>
                                                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                                                            </h2>
                                                            <!--OR use the_content for full post, this can be split into template parts at the end;-->
                                                            <?php the_content(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell"></div>
                                <?php } else { ?>
                                    <div <?php post_class('cell'); ?>>
                                        <div class="grid-container gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
                                            <div class="grid-x grid-padding-x grid-padding-y">

                                                <div class="cell medium-8">
                                                    <div class="grid-container">
                                                        <div class="grid-x grid-padding-x">
                                                            <h2>
                                                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                                                            </h2>
                                                            <!--OR use the_content for full post, this can be split into template parts at the end;-->
                                                            <?php the_excerpt(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cell medium-4 centered">
                                                    <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                                                    <?php boom_radio_readmore_link(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell"></div>
                                <?php } ?>
                                <?php
                                        // Increasing the value of the $postBackgroundColourCounter variable before the end of the WP loop to keep having a different post background colour
                                        $postBackgroundColourCounter++;
                                        // Increasing the $postNumber variable every loop to swap image and paragraphs left/right
                                        $postNumber++; ?>
                            <?php endwhile; // End of the loop. 
                                ?>

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

<?php

/**
 * Template Name: Full Home Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>


<?php
//The front-page page for Boom Radio with examples
//---------CONTENT HERE
/**
 * @package WordPress
 * @subpackage boom_radio
 * @since 1.0.0
 */

get_header();
?>
<aside>
    <!--Addition of some Foundation classes used in the prototype-->
    <div class="grid-container">
        <div class="grid-x grid-padding-x grid-padding-y">
            <?php if (have_posts()) { ?>
                <?php
                    // Start of the Loop
                    while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div <?php post_class('cell'); ?>>
                        <div class="grid-container gradiented-box gradient-five-six">
                            <div class="grid-x grid-padding-x grid-padding-y">
                                <div class="cell">
                                    <h2>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                                    </h2>
                                    <!--OR use the_content for full post, this can be split into template parts at the end;-->

                                    <?php the_excerpt(); ?>
                                    <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                                    <?php boom_radio_readmore_link(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cell"></div>
                <?php endwhile; // End of the loop. 
                    ?>
                <?php the_posts_pagination(); ?>
            <?php } ?>
        </div>
    </div>
</aside>
<?php
get_footer();
?>


<?php
get_footer();

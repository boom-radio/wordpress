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

            <!--TEMPLATE PART example path ------get_template_part('content', get_post_format());-->

            <div <?php post_class('cell'); ?>>
                <?php //render random gradient background
                    $list = array('gradient-one-two', 'gradient-three-four', 'gradient-five-six');
                    $i = array_rand($list);
                    $gradient = $list[$i];
                    ?>
                <div class="grid-container-fluid gradiented-box <?php echo $gradient ?>">
                    <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                        <div class="cell medium-10">
                            <div class="grid-container-fluid">
                                <div class="grid-x grid-padding-x grid-padding-y">
                                    <div class="cell"></div>
                                    <div class="cell large-6 shared text-justify">
                                        <?php if (has_post_thumbnail()) :
                                                the_post_thumbnail('card', array('class' => 'box-shadowed'));
                                            endif; ?>
                                    </div>
                                    <div class="cell auto">
                                        <?php the_title('<h2>', '</h2>') ?>
                                        <!--OR use the_content for full post, this can be split into template parts at the end;-->
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="cell"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
            </div>
            <!--End the loop.-->
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
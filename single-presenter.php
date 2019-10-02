<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */

get_header(); ?>

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
                                    <div class="cell text-justify">
                                        <h2>
                                            <?php the_title() ?>
                                        </h2>
                                        <!--OR use the_content for full post, this can be split into template parts at the end;-->
                                        <?php the_content(); ?>

                                        <!-- check if the custom field created with metabox is not empty before displaying the button-->
                                        <?php
                                            $fb_custom_field = get_post_meta($post->ID, 'mbp_insta', true);
                                            if ($fb_custom_field) { ?>
                                            <a class="small-social-button button gradiented-box gradient-five-six " href="<?php echo get_post_meta($post->ID, 'mbp_insta', true); ?>" target="_blank" title="Follow on Instgram"> <i class="fab fa-instagram fa-1x"></i> Follow</a>
                                        <?php
                                            } else {
                                                // don't display Insta button 
                                            }
                                            ?>
                                        <!-- check if the custom field created with metabox is not empty before displaying the button-->
                                        <?php
                                            $insta_custom_field = get_post_meta($post->ID, 'mbp_email', true);
                                            if ($insta_custom_field) { ?>
                                            <a class="small-social-button button gradiented-box gradient-one-two " href="mailto:<?php echo get_post_meta($post->ID, 'mbp_email', true); ?>?Subject=Hello%20from%20Boom%20Radio%20website" title="Write an Email"><i class="fas fa-envelope fa-1x"></i> Write an Email</a>
                                        <?php
                                            } else {
                                                // don't display Email button 
                                            }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="cell">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x grid-margin-y align-center">
                            <div class="cell">
                                <?php
                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if (comments_open() || get_comments_number()) :
                                        comments_template();
                                    endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
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
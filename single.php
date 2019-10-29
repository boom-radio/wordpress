<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */

get_header(); ?>
<h5>The is single</h5>
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <!-- * Include the post format-specific template for the content. If you want to
            * use this in a child theme, then include a file called called content-___.php
            * (where ___ is the post format) and that will be used instead.
            */-->
        <div class="cell"></div>
        <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?> shared">
            <div class="grid-container">
                <div class="grid-x grid-margin-x grid-margin-y align-center">

                    <?php
                    // Start the loop.
                    while (have_posts()) : the_post(); ?>
                        <div <?php post_class('cell small-12 medium-10 large-9'); ?>>
                            <div class="card">
                                <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('card_single');
                                    } else {
                                        echo '<img style="width: 100%;" src="' . get_bloginfo("template_url") . '/src/assets/img/img-default.png"/>';
                                    }
                                    ?>
                                <div class="card-section">
                                    <div class="bio">
                                        <h5 class="section-title">
                                            <?php the_title() ?>
                                        </h5>

                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <!--Previous/next post navigation.-->
                        </div>
                        <!--End the loop.-->
                        <!--Start of comments section-->
                        <div class="cell small-12 medium-10 large-10">
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template.
                                if (comments_open() || get_comments_number()) :
                                    comments_template();
                                endif; ?>
                        </div>
                    <?php endwhile; ?>
                    <!--Start of Navigation section-->
                    <div class="grid-x grid-margin-x grid-margin-y">
                        <div class="cell">
                            <?php echo boom_radio_the_post_navigation();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (is_active_sidebar('primary-sidebar')) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>
    </div>
</div>
<!-- .content-area -->
<?php get_footer(); ?>
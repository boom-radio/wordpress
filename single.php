<?php

/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<article>
    <div class="grid-container">
        <div class="grid-x grid-margin-x grid-margin-y align-center">
            <!-- * Include the post format-specific template for the content. If you want to
            * use this in a child theme, then include a file called called content-___.php
            * (where ___ is the post format) and that will be used instead.
            */-->
            <?php
            // Start the loop.
            while (have_posts()) : the_post(); ?>

            <!--TEMPLATE PART example path ------get_template_part('content', get_post_format());-->
            <div <?php post_class('cell'); ?>>
                <div class="grid-container gradiented-box gradient-three-four">
                    <div class="grid-x grid-margin-x grid-margin-y align-center">
                        <div class="cell">
                            <?php the_content(); ?>
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
                                endif;
                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--End the loop.-->
            <?php endwhile; ?>


            <!--Previous/next post navigation. Example this code should be php tagged on each line to match WP standards and could be a template part-->
            <div class="grid-x grid-margin-x grid-margin-y align-center">
                <div class="cell">
                    <?php the_post_navigation(array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'boom_radio') . '</span> ' .
                            '<span class="screen-reader-text">' . __('post:', 'boom_radio') . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'boom_radio') . '</span> ' .
                            '<span class="screen-reader-text">' . __('post:', 'boom_radio') . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div><!-- .content-area -->
</article>
<?php get_footer(); ?>
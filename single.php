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
        <!-- * Include the post format-specific template for the content. If you want to
            * use this in a child theme, then include a file called called content-___.php
            * (where ___ is the post format) and that will be used instead.
            */-->
        <?php
        // Start the loop.
        while (have_posts()) : the_post(); ?>

            <!--TEMPLATE PART example path ------get_template_part('content', get_post_format());-->

            <div <?php post_class('cell'); ?>>
                <div class="grid-container gradiented-box gradient-five-six">
                    <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                        <div class="cell medium-6">
                            <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                                <div class="cell text-justify">
                                    <h2>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                                    </h2>
                                    <!--OR use the_content for full post, this can be split into template parts at the end;-->

                                    <?php the_content(); ?>
                                </div>
                                <div class="cell">
                                    <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                                    <?php boom_radio_readmore_link(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="cell medium-4">
                            <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail('medium', array('class' => 'img-right box-shadowed'));
                                endif; ?>
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
                        <div class="cell">
                            <?php
                                the_post_navigation(array(
                                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentyfifteen') . '</span> ' .
                                        '<span class="screen-reader-text">' . __('Next post:', 'twentyfifteen') . '</span> ' .
                                        '<span class="post-title">%title</span>',
                                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentyfifteen') . '</span> ' .
                                        '<span class="screen-reader-text">' . __('Previous post:', 'twentyfifteen') . '</span> ' .
                                        '<span class="post-title">%title</span>',
                                )); ?>
                        </div>
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
<?php get_footer(); ?>
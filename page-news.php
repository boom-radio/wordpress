<?php

/**
 * Template Name: Full News Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!--Title with waves and page title -->
<?php get_template_part('template-parts/content/title', 'none'); ?>

<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <?php
        $args = array(
            'post_type' => 'news',
            //'posts_per_page'      => 1,
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
            'orderby'   => array(
                'date' => 'DESC',
            ),

            'tax_query' => array(
                array(
                    'taxonomy' => 'category_news',
                    'field'    => 'slug',
                    'terms' =>  'old-posts'
                )
            )
        );

        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //The $postBackgroundColourCounter is the variable used in the posts background function and needs to be set to 0 before the beginning of WP loop
            $postBackgroundColourCounter = null;
            //The $postNumber Is used into the function to swap image and paragraph left/right
            $postNumber = null;
            //Set varibale for the loop to control amount of posts
            $i = 1;
            while ($the_query->have_posts() && $i < 13) : $the_query->the_post(); ?>
                <div <?php post_class('cell'); ?>>
                    <!-- Gradiented container ????????????????????????????????????????????????????????????????????????????????????????????? -->
                    <div class="grid-container-fluid gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">

                            <?= posts_image_paragraph_position($postNumber) ?>

                        </div>
                    </div>
                    <!-- Gradiented container ????????????????????????????????????????????????????????????????????????????????????????????? -->
                </div>
                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
                <div class="cell"></div>
                <?php
                        // Increasing the value of the $postBackgroundColourCounter variable before the end of the WP loop to keep having a different post background colour
                        $postBackgroundColourCounter++;
                        // Increasing the $postNumber variable every loop to swap image and paragraphs left/right
                        $postNumber++; ?>
            <?php $i++;
                endwhile;
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <?php the_posts_pagination(); ?>
        <!-- End of the loop.-->
    </div>
</div>
<!--End of News Section-->

<!--Start of Events Section-->
<?php get_template_part('template-parts/components/waveleft', 'none'); ?>
<h3>Events</h3>
<?php get_template_part('template-parts/components/waveright', 'none'); ?>

<article class="grid-container" id="events">
    <div class="grid-x grid-margin-x grid-margin-y small-up-1 medium-up-2 large-up-3">
        <!--wp query arg set for card section-->
        <?php
        $args = array(
            'post_type' => 'music_post',
            'posts_per_page'      => 6,
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
            'orderby'   => array(
                'date' => 'DESC',
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_music',
                    'field'    => 'slug',
                    'terms' =>  'event'
                )
            )
        );
        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set variable for the loop to control amount of posts
            $i = 1;
            while ($the_query->have_posts() && $i < 7) : $the_query->the_post(); ?>
                <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
            <?php $i++;
                endwhile;
                //Ensure global wp variable are set to default after custom query
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <?php the_posts_pagination(); ?>
    </div>
</article>
<!--End of News Section-->

<?php
get_footer();

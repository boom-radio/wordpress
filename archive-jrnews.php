<?php

/**
 * Template Name: Full Archive News Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!---Title with Wave -->
<div class="grid-x grid-padding-y align-center align-middle">
    <div class="cell auto text-right">
        <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
    </div>
    <div class="cell shrink">
        <h1>News</h1>
    </div>
    <div class="cell auto text-left">
        <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
    </div>
</div>
<!--End Title with Wave-->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <?php
        $args = array(
            'post_type' => 'news',
            'posts_per_page'      => 1, //Set maximum to three
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
            'orderby'   => array(
                'date' => 'DESC',
            ),
            // 'tax_query' => array(
            //     array(
            //         'taxonomy' => 'category_news',
            //         'field'    => 'slug',
            //         //Album term id number in db
            //         'terms' =>  'old-posts'
            //     )
            // )
        );

        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //The $postBackgroundColourCounter is the variable used in the posts background function and needs to be set to 0 before the beginning of WP loop
            $postBackgroundColourCounter = null;
            //The $postNumber Is used into the function to swap image and paragraph left/right
            $postNumber = null;

            while ($the_query->have_posts()) : $the_query->the_post(); ?>

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
                <?php the_posts_pagination(); ?>
                <div class="cell"></div>
                <?php
                        // Increasing the value of the $postBackgroundColourCounter variable before the end of the WP loop to keep having a different post background colour
                        $postBackgroundColourCounter++;
                        // Increasing the $postNumber variable every loop to swap image and paragraphs left/right
                        $postNumber++; ?>
            <?php endwhile;
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>

        <!-- End of the loop.-->
    </div>
</div>
<!---Title with Wave -->
<div class="grid-x grid-padding-y align-center align-middle">
    <div class="cell auto text-right">
        <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
    </div>
    <div class="cell shrink">
        <h3>Events</h3>
    </div>
    <div class="cell auto text-left">
        <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
    </div>
</div>
<!--END OF H3 WAVE-->
<!--Start of news Section-->
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
            while ($the_query->have_posts() && $i < 13) : $the_query->the_post(); ?>

                <div <?php post_class('cell'); ?>>
                    <div class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <img class="single-card" src="<?php the_post_thumbnail_url(); ?>" />
                        <?php endif; ?>
                        <div class="card-section">
                            <div class="bio">
                                <h5 class="section-title">
                                    <?php the_title() ?>
                                </h5>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="cell">
                                <div class="animation-container">
                                    <div class="sound-container">
                                        <div class="rect-2"></div>
                                        <div class="rect-3"></div>
                                        <div class="rect-4"></div>
                                        <div class="rect-5"></div>
                                        <div class="rect-6"></div>
                                        <div class="rect-5"></div>
                                        <div class="rect-4"></div>
                                        <div class="rect-3"></div>
                                        <div class="rect-2"></div>
                                        <div class="rect-1"></div>
                                    </div>
                                </div>
                            </div>

                            <!--This is to attach the Orange boom button button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                            <?php boom_radio_card_link(); ?>
                        </div>
                    </div>
                </div>
            <?php $i++;
                endwhile;
                //Ensure global wp variable are set to default after custom query
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <div class="cell">
            <?php the_posts_pagination(); ?>
        </div>
    </div>
</article>
<!--End of News Section-->

<?php
get_footer();

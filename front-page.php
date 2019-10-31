<?php

/**
 * Template Name: Full Home Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>
<!-----------------------CONTENT HERE-------------------------------------->
<!-----------------------Start of Artist of the Month Section------------------------------------------>
<div class="grid-container">
    <div class="grid-container" id=artist>
        <div class="grid-x grid-padding-x grid-padding-y align-center">
            <!--Title with wave-->
            <div class="grid-x grid-padding-y align-center align-middle">
                <div class="cell auto text-right">
                    <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
                </div>
                <div class="cell shrink">
                    <h1>Artist of the Month</h1>
                </div>
                <div class="cell auto text-left">
                    <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
                </div>
            </div>
            <!-- Empty cell/s used  for spacing-->
            <div class="cell"></div>

            <!--wp query arg set for featured artist terms-->
            <?php
            $args = array(
                'post_type' => 'music_post',
                'posts_per_page'      => 1,
                'post__in'            => get_option('sticky_posts'),
                'ignore_sticky_posts' => 1,
                'orderby'   => array(
                    'date' => 'DESC',
                ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category_music',
                        'field'    => 'slug',
                        'terms' =>  'featured-artist'
                    )
                )
            );

            $the_query = new WP_Query($args); ?>

            <!--Start of the Loop-->
            <?php if ($the_query->have_posts()) :
                //Set varibale for the loop to control amount of posts
                $i = 1;
                while ($the_query->have_posts() && $i < 3) : $the_query->the_post(); ?>
                    <!--Blue Gradient Box post-->
                    <?php get_template_part('template-parts/posts/bluebox', get_post_format()); ?>

                    <!--Add one to variable and reset global $post-->
                <?php $i++;
                    endwhile;
                    wp_reset_postdata(); ?>

            <?php else : ?>
                <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <!-- End of the loop.-->
            <div class="cell"></div>
            <div class="cell"></div>
        </div>
    </div>
</div>
<!------------------------End of Featured Artist Section-------------------------------->

<!-----------------------Start of News Section------------------------------------------------------>
<article class="grid-container">
    <!--Title for secton-->
    <div class="grid-x grid-padding-y align-center align-middle">
        <div class="cell auto text-right">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
        </div>
        <div class="cell shrink">
            <h3>News</h3>
        </div>
        <div class="cell auto text-left">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
        </div>
    </div>

    <!--Start of card section for maximum of three Artist posts-->
    <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">

        <!-----------------------------Start Last post News---------------------------------->
        <?php
        $args = array(
            //
            'post_type' => 'news',
            //Set maximum to three
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
            'orderby'   => array(
                'date' => 'DESC',
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_news',
                    'field'    => 'slug',
                    //Album term id number in db
                    'terms' =>  'old-posts'
                )
            )
        );
        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set varibale for the loop to control amount of posts
            $i = 1;
            while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                <!--Card style post-->
                <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
            <?php $i++;
                endwhile;
                //Ensure global wp variable are set to default after custom query
                wp_reset_postdata(); ?>
        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!---------------------End Last post News--------------------------->

        <!---------------------Last post Music--------------------------->
        <!--wp query arg set for card section-->
        <?php
        $args = array(
            //
            'post_type' => 'music_post',
            //Set maximum to three
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
            'orderby'   => array(
                'date' => 'DESC',
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_music',
                    'field'    => 'slug',
                    //Artists term id number in db
                    'terms' =>  'Artists'
                )
            )
        );
        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set varibale for the loop to control amount of posts
            $i = 1;
            while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                <!--Card style post-->
                <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
            <?php $i++;
                endwhile;
                //Ensure global wp variable are set to default after custom query
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!------------------End Last post Music--------------------------->

        <!--------------------- Start Last post Events--------------------------->
        <!--wp query arg set for card section-->
        <?php
        $args = array(
            //
            'post_type' => 'music_post',
            //Set maximum to three
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
            'orderby'   => array(
                'date' => 'DESC',
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'category_music',
                    'field'    => 'slug',
                    //Album term id number in db
                    'terms' =>  'event'
                )
            )
        );
        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set varibale for the loop to control amount of posts
            $i = 1;
            while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                <!--Card style post-->
                <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
            <?php $i++;
                endwhile;
                //Ensure global wp variable are set to default after custom query
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!------------------End Last post Events--------------------------->
    </div>
</article>
<div class="cell"></div>
<!-----------------------End of News Section------------------------------------------------------>

<!------------------------Start of Social Section------------------------------>
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">

        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>

        <!---Title with Wave -->
        <div class="grid-x grid-padding-y align-center align-middle">
            <div class="cell auto text-right">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
            </div>
            <div class="cell shrink">
                <h3>Competition</h3>
            </div>
            <div class="cell auto text-left">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
            </div>
        </div>

        <!-------------------------Start of competitions loop-------------------------->
        <div class="cell">
            <!--wp query arg set-->
            <?php
            $args = array(
                'post_type' => 'competition',
                //'orderby' => 'post__in'
                'posts_per_page'      => 1,
                'post__in'            => get_option('sticky_posts'),
                'ignore_sticky_posts' => 1,
                'orderby'   => array(
                    'date' => 'DESC',
                ),
            );

            $the_query = new WP_Query($args); ?>

            <?php if ($the_query->have_posts()) :
                //Set varibale for the loop to control amount of posts to one
                $i = 1;
                while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                    <!--Orange Gradient Box post-->
                    <?php get_template_part('template-parts/posts/orangebox', get_post_format()); ?>
                <?php $i++;
                    endwhile;
                    wp_reset_postdata(); ?>

            <?php else : ?>
                <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <!------------------------ End of competition loop.---------------------------->
        </div>

        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <div class="cell"></div>

        <!---------------------------------Social section------------------------------->

        <article class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell large-8 shared" style="margin-bottom: 1rem">
                    <div class="grid-container-fluid gradiented-box gradient-one-two">
                        <!------------------------ Start of Events loop.---------------------------->
                        <?php
                        $args = array(
                            'post_type' => 'music_post',
                            'posts_per_page'      => 1,
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

                        <?php if ($the_query->have_posts()) :
                            //Set varibale for the loop to control amount of posts
                            $i = 1;
                            while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>

                                <!--Card style post-->
                                <?php get_template_part('template-parts/posts/smpinkbox', get_post_format()); ?>
                            <?php $i++;
                                endwhile;
                                wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <!------------------------ End of Events loop.---------------------------->
            </div>
    </div>

    <!--Create space between cells in card section
                <div class="cell show-for-small show-for-medium hide-for-large"><br></div>-->

    <div class="cell auto">
        <div class="cell">
            <!------------------------ Start of Social Schedule loop.---------------------------->
            <?php
            $args = array(
                'post_type' => 'schedule',
                'posts_per_page'      => 1,
                'post__in'            => get_option('sticky_posts'),
                'ignore_sticky_posts' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category_schedule',
                        'field' => 'slug',
                        'terms' => 'big-breakfast'
                    )
                )
            );

            $the_query = new WP_Query($args); ?>


            <?php if ($the_query->have_posts()) :
                //Set variable for the loop to control amount of posts
                $i = 1;
                while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                    <!--Card style post-->
                    <?php get_template_part('template-parts/posts/cardsingle', get_post_format()); ?>
                <?php $i++;
                    endwhile;
                    wp_reset_postdata(); ?>

            <?php else : ?>
                <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <!------------------------ End of Social Schedule loop.---------------------------->
        </div>
    </div>
</div>
</article>

</div>
</div>
<!-------------------------End of Social section------------------------------->

<?php
get_footer();

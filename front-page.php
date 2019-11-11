<?php

/**
 * Template Name: Full Home Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>
<!--CONTENT HERE-->
<!--<h3>This is front page</h3>-->
<!--- Go to top button -->
<?php get_template_part('template-parts/components/gototop', 'none');
?>
<!--Start of News Section-->
<article class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell">
            <!---Title of the Second Section -->
            <div class="grid-container">
                <?php get_template_part('template-parts/components/waveleft', 'none'); ?>
                <h1>News</h1>
                <?php get_template_part('template-parts/components/waveright', 'none'); ?>
            </div>
        </div>
        <!--Start of card section for maximum of three Artist posts-->
        <div class="cell">
            <div class="grid-container">
                <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">

                    <!--Start Last post News-->
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
                                'terms' =>  array('sport', 'music news', 'politics', 'old posts', 'cinema')
                            )
                        )
                    ); ?>
                    <?php $the_query = new WP_Query($args); ?>

                    <!--Start of the Loop-->
                    <?php if ($the_query->have_posts()) :
                        //Set varibale for the loop to control amount of posts
                        ?>
                        <?php $i = 1; ?>
                        <?php while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                            <!--Card style post-->
                            <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
                            <?php $i++; ?>
                        <?php endwhile;
                            //Ensure global wp variable are set to default after custom query
                            ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                    <!--End Last post News-->

                    <!--Last post Music-->
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
                                'terms' =>  'album'
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
                    <!--End Last post Music-->

                    <!--Start Last post News - Breaking news-->
                    <?php
                    $args = array(
                        //
                        'post_type' => '',
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
                                'terms' =>  'breaking news'
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
                    <!--End Last post News - Breaking News-->
                </div>
            </div>
        </div>
    </div>
</article>
<!--End of News Section-->

<!--Start of Artist of the Month Section-->
<!--<div class="grid-container">-->
<div class="grid-container" id="artist">
    <div class="grid-x grid-padding-x grid-padding-y align-center content">
        <div class="cell"></div>
        <div class="cell">
            <!---Title of the Second Section -->
            <div class="grid-container">
                <?php get_template_part('template-parts/components/waveleft', 'none'); ?>
                <h3>Artist of the Month</h3>
                <?php get_template_part('template-parts/components/waveright', 'none'); ?>
                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
            </div>
        </div>
        <div class="cell">
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
            ); ?>

            <?php $the_query = new WP_Query($args); ?>

            <!--Start of the Loop-->
            <?php if ($the_query->have_posts()) :
                //Set varibale for the loop to control amount of posts
                ?>
                <?php $i = 1; ?>
                <?php while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                    <!--Blue Gradient Box post-->
                    <?php get_template_part('template-parts/posts/bluebox', get_post_format()); ?>

                    <!--Add one to variable and reset global $post-->
                    <?php $i++; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
        <!-- End of the loop-->
        <div class="cell"></div>
    </div>
</div>

<!--End of Featured Artist Section-->
<!--Start of Social Section-->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">

        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <div class="cell">
            <!---Title of the Second Section -->
            <div class="grid-container">
                <?php get_template_part('template-parts/components/waveleft', 'none'); ?>
                <h3>Competition</h3>
                <?php get_template_part('template-parts/components/waveright', 'none'); ?>
            </div>
        </div>
        <!--Start of competitions loop-->
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

            <?php if ($the_query->have_posts()) : ?>
                <!--Set varibale for the loop to control amount of posts to one-->
                <?php $i = 1; ?>
                <?php while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                    <!--Orange Gradient Box post-->
                    <?php get_template_part('template-parts/posts/orangebox', get_post_format()); ?>
                    <?php $i++; ?>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <!--End of competition loop.-->
        </div>

        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <div class="cell"></div>

        <!--Social section-->
        <div class="cell">
            <article class="grid-container">
                <div class="grid-x grid-margin-x">
                    <!--Start of Events loop.-->
                    <div class="cell large-8 shared" style="margin-bottom: 1rem">
                        <h3 class="text-center">Events</h3>
                        <div class="grid-container-fluid gradiented-box gradient-one-two">
                            <?php
                            $args = array(
                                'post_type' => 'news',
                                'posts_per_page'      => 1,
                                'post__in'            => get_option('sticky_posts'),
                                'ignore_sticky_posts' => 1,
                                'orderby'   => array(
                                    'date' => 'DESC',
                                ),
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category_news',
                                        'field'    => 'slug',
                                        'terms' =>  'events'
                                    )
                                )
                            ); ?>

                            <?php $the_query = new WP_Query($args); ?>
                            <?php if ($the_query->have_posts()) : ?>
                                <!--Set varibale for the loop to control amount of posts-->
                                <?php $i = 1; ?>
                                <?php while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                                    <!--Card style post-->
                                    <?php get_template_part('template-parts/posts/smpinkbox', get_post_format()); ?>
                                    <?php $i++; ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>

                            <?php else : ?>
                                <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!--End of Events loop.-->

                    <!--Create space between cells in card section
                    <div class="cell show-for-small show-for-medium hide-for-large"><br></div>-->

                    <!-- Start of Social Schedule loop.-->
                    <div class="cell auto">
                        <h3 class="text-center">Shows</h3>
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
                        ); ?>

                        <?php $the_query = new WP_Query($args); ?>


                        <?php if ($the_query->have_posts()) : ?>
                            <!--Set variable for the loop to control amount of posts-->
                            <?php $i = 1; ?>
                            <?php while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>

                                <!--Card style post-->
                                <?php get_template_part('template-parts/posts/cardshow', get_post_format()); ?>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                    <!--End of Social Schedule loop.-->
                </div>
            </article>
        </div>
    </div>
</div>
<!--End of Social section-->
<?php
get_footer();

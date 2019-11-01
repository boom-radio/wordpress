<?php

/**
 * Template Name: Full Music Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!-----------------------------Start of Artists Section---------------------------->
<article class="grid-container">
    <!--Title with waves and page title -->
    <?php get_template_part('template-parts/content/title', 'none'); ?>

    <!--Start of card section for maximum of three Artist posts-->
    <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">

        <!--wp query arg set for card section-->
        <?php
        $args = array(
            'post_type' => 'music_post',
            //Set maximum to three
            'posts_per_page'      => 3,
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
        ); ?>

        <!--The Query-->
        <?php $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set variable for the loop to control amount of posts
            ?>
            <?php $i = 1; ?>
            <?php while ($the_query->have_posts() && $i < 13) : $the_query->the_post(); ?>
                <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
                <?php $i++; ?>
            <?php endwhile; ?>
            <?php //Ensure global wp variable are set to default after custom query
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <?php the_posts_pagination(); ?>

    </div>
</article>
<div class="cell"></div>
<!-----------------------------End of Artists Section------------------------------->

<!-----------------------------Start of Review Section------------------------------>
<div class="grid-container" id=artist>
    <div class="grid-x grid-padding-x grid-padding-y align-center">
        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <!---Title of the Second Section -->
        <?php get_template_part('template-parts/components/waveleft', 'none'); ?>
        <h3>Featured Artist</h3>
        <?php get_template_part('template-parts/components/waveright', 'none'); ?>
        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>

        <!--wp query arg set for events-->
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

        <!--The Query-->
        <?php $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set variable for the loop to control amount of posts
            ?>
            <?php $i = 1; ?>
            <?php while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                <?php get_template_part('template-parts/posts/orangebox', get_post_format()); ?>
                <div class="cell"></div>
                <div class="cell"></div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!-- End of the loop.-->

    </div>
</div>
<div class="cell"></div>
<!-----------------------------End of Review Section-------------------------------->

<!-----------------------------Start of Events Section------------------------------>
<div class="grid-container" id="yoursong">
    <!---Title of the Second Section -->
    <?php get_template_part('template-parts/components/waveleft', 'none'); ?>
    <h3>Get in Touch</h3>
    <?php get_template_part('template-parts/components/waveright', 'none'); ?>
    <!-- Empty cell/s used  for spacing-->
    <div class="cell"></div>

    <!-------------------Social split cell section------------------------->
    <article class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell large-8 shared">
                <!--Music upload message-->
                <?php get_template_part('template-parts/content/musiclink', 'none'); ?>

                <!--Contact form-->
                <?php get_template_part('template-parts/components/contactform', get_post_format()); ?>
            </div>

            <!--Create space between cells in card section-->
            <div class="cell show-for-small show-for-medium hide-for-large"><br></div>

            <!--------------------Single Events post section------------------------->
            <div class="cell auto">
                <div class="cell">
                    <!-- Start of the loop-->
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
                    ); ?>

                    <!--The Query-->
                    <?php $the_query = new WP_Query($args); ?>

                    <!--Start of the Loop-->
                    <?php if ($the_query->have_posts()) :
                        //Set variable for the loop to control amount of posts
                        ?>
                        <?php $i = 1; ?>
                        <?php while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                            <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                        <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                    <!-- End of the loop.-->
                </div>
            </div>
        </div>
    </article>
</div>
<!-----------------------------End of Events Section-------------------------------->
<div class="cell"></div>

<?php
get_footer();

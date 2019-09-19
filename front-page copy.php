<?php

/**
 * Template Name: Full Home Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!-----------CONTENT HERE---------------->
<!--Start of Artists Section-->
<article class="grid-container">
    <!--Title for secton-->
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

    <!--Start of card section for maximum of three Artist posts-->
    <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">

        <!--wp query arg set for card section-->
        <?php
        $args = array(
            //
            'post_type' => 'news',
            //Set maximum to three
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
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
            while ($the_query->have_posts() && $i < 4) : $the_query->the_post(); ?>

                <div <?php post_class('cell'); ?>>
                    <div class="card">
                        <?php if (has_post_thumbnail()) :
                                    the_post_thumbnail(array(400, 300));
                                endif; ?>
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
        <?php the_posts_pagination(); ?>

    </div>
</article>
<div class="cell"></div>
<!--End of Artists Section-->

<!--Start of Review Section-->
<!--Addition of some Foundation classes used in the prototype-->
<div class="grid-container" id=artist>
    <div class="grid-x grid-padding-x grid-padding-y align-center">
        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <div class="grid-x grid-padding-y align-center align-middle">
            <div class="cell auto text-right">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
            </div>
            <div class="cell shrink">
                <h3>Music</h3>
            </div>
            <div class="cell auto text-left">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
            </div>
        </div>
        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>

        <!--wp query arg set for events - term id number 6 -->
        <?php
        $args = array(
            'post_type' => 'music_post',
            'posts_per_page'      => 1,
            'post__in'            => get_option('sticky_posts'),
            'ignore_sticky_posts' => 1,
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
                <div <?php post_class('cell'); ?>>
                    <div class="grid-container gradiented-box gradient-three-four">
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                            <div class="cell medium-6">
                                <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                                    <div class="cell text-justify">
                                        <h2>
                                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                                        </h2>
                                        <!--OR use the_content for full post, this can be split into template parts at the end;-->
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="cell">
                                        <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                                        <?php boom_radio_readmore_link(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="cell medium-4">
                                <?php if (has_post_thumbnail()) :
                                            the_post_thumbnail('large', array(500, 300, 'class' => 'img-right box-shadowed'));
                                        endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell"></div>
                <div class="cell"></div>
            <?php $i++;
                endwhile;
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!-- End of the loop.-->

    </div>
</div>
<div class="cell"></div>
<!--End of Review Section-->

<!--Start of Events Section-->
<div class="grid-container" id="yoursong">
    <div class="grid-x grid-padding-y align-center align-middle">
        <div class="cell auto text-right">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
        </div>
        <div class="cell shrink">
            <h3>Social</h3>
        </div>
        <div class="cell auto text-left">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
        </div>
    </div>
    <div class="grid-container-fluid gradiented-box gradient-five-six">
        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
            <div class="cell medium-4">
                <img class="img-left box-shadowed" src="assets/img/artists/tag_mate.jpg" alt="Dean Lewis Giveaway picture">
            </div>
            <div class="cell medium-6">
                <div class="grid-container-fluid">
                    <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                        <div class="cell text-justify">
                            <h2>Ticket Giveaway</h2>
                            <p>Boom is giving you the chance to win 2 tickets to see Dean Lewis at his upcoming concert this
                                Wednesday the 15th May</p>
                            <br>
                            <p>To enter, simply like our Facebook page and Tag a mate you would take! Winner will be announced
                                on
                                Tuesday's Drive Show with Pete and Matt...</p>
                        </div>
                        <div class="cell">
                            <a href="https://www.facebook.com/boomradioau/" class="boom-button-white float-right">Enter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty cell/s used  for spacing-->
    <div class="cell"></div>
    <div class="cell"></div>
    <!--Social split cell section-->
    <article class="grid-container">
        <div class="grid-x grid-margin-x">
            <div class="cell large-7 shared" style="margin-bottom: 1rem">
                <div class="grid-container-fluid gradiented-box gradient-one-two">
                    <!-- Start of the loop-->
                    <?php
                    $args = array(
                        'post_type' => 'music_post',
                        'posts_per_page'      => 1,
                        'post__in'            => get_option('sticky_posts'),
                        'ignore_sticky_posts' => 1,
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
                        //Set varibale for the loop to control amount of posts
                        $i = 1;
                        while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>

                            <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                                <div class="cell medium-5">
                                    <?php if (has_post_thumbnail()) :
                                                the_post_thumbnail('medium', array('class' => 'img-left box-shadowed'));
                                            endif; ?>
                                </div>
                                <div class="cell medium-7">
                                    <div class="grid-container-fluid">
                                        <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                                            <div class="cell align-middle text-justify">
                                                <h2><?php the_title() ?></h2>
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <div class="cell show-for-small hide-for-large">
                                            </div>
                                            <div class="cell">
                                                <!--<a href="music.html" class="boom-button-white float-right">Requests
                                                </a>-->
                                                <?php boom_radio_readmore_link(); ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php $i++;
                                    endwhile;
                                    wp_reset_postdata(); ?>

                            <?php else : ?>
                                <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                            <?php endif; ?>
                            <!-- End of the loop.-->
                                </div>
                            </div>
                </div>
            </div>

            <!--Create space between cells in card section-->
            <div class="cell show-for-small show-for-medium hide-for-large"><br></div>

            <div class="cell auto">
                <div class="cell">
                    <!-- Start of the loop-->
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

                    <!--Start of the Loop-->
                    <?php if ($the_query->have_posts()) :
                        //Set varibale for the loop to control amount of posts
                        $i = 1;
                        while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>

                            <div <?php post_class('card'); ?>>
                                <div class="cell"></div>
                                <!--Check if a featured image has been uplaoded with the post-->
                                <?php if (has_post_thumbnail()) :
                                            the_post_thumbnail('large', array());
                                        endif; ?>

                                <div class="card-section">
                                    <div class="bio">
                                        <h5 class="section-title"><?php the_title() ?></h5>
                                        <?php the_content(); ?>
                                    </div>
                                    <br>
                                    <?php boom_radio_card_link(); ?>
                                </div>
                            </div>
                        <?php $i++;
                            endwhile;
                            wp_reset_postdata(); ?>

                    <?php else : ?>
                        <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                    <?php endif; ?>
                    <!-- End of the loop.-->
                </div>
            </div>
        </div>
    </article>
</div>
<?php
get_footer();

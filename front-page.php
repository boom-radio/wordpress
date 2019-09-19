<?php

/**
 * Template Name: Full Home Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>
<div class="grid-container" id=artist>
    <div class="grid-x grid-padding-x grid-padding-y align-center">
        <div class="cell">
            <?php get_search_form(true); ?>
        </div>
    </div>
</div>
<!-----------------------CONTENT HERE-------------------------------------->
<!-----------------------Start of News Section------------------------------------------------------>
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

                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail(array(400, 300));
                                } else {
                                    echo '<img src="' . get_bloginfo("template_url") . '/src/assets/img/img-default.png" />';
                                }
                                ?>
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
<!-----------------------End of News Section------------------------------------------------------>

<!-----------------------Start of Featured Artist Section------------------------------------------>
<div class="grid-container">
    <div class="grid-container" id=artist>
        <div class="grid-x grid-padding-x grid-padding-y align-center">
            <!--Title with wave-->
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

            <!--wp query arg set for featured artist terms-->
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
                    <div <?php post_class('grid-container gradiented-box gradient-three-four'); ?>>
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                            <div class="cell medium-6">
                                <div class="grid-container-fluid">
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
                            </div>
                            <div class="cell medium-4">
                                <?php if (has_post_thumbnail()) :
                                            the_post_thumbnail('large', array('class' => 'img-right box-shadowed'));
                                        endif; ?>
                            </div>
                        </div>
                    </div>
                    <!--Add one to variable and reset global $post-->
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
<div class="cell"></div>
<!------------------------End of Featured Artist Section-------------------------------->

<!------------------------Start of Social Section------------------------------>
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">

        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <div class="cell"></div>

        <!---Title with Wave -->
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

        <!-------------------------Start of competitions loop-------------------------->
        <div class="cell">

            <!--wp query arg set-->
            <?php
            $args = array(
                'post_type' => 'competition',
                //'orderby' => 'post__in'
                'posts_per_page'      => 1,
                'post__in'            => get_option('sticky_posts'),
                'ignore_sticky_posts' => 1
            );

            $the_query = new WP_Query($args); ?>

            <?php if ($the_query->have_posts()) :
                //Set varibale for the loop to control amount of posts to one
                $i = 1;
                while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>
                    <div <?php post_class('grid-container-fluid gradiented-box gradient-five-six'); ?>>
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                            <div class="cell medium-4">
                                <?php if (has_post_thumbnail()) :
                                            the_post_thumbnail('large', array('class' => 'img-right box-shadowed'));
                                        endif; ?>
                            </div>
                            <div class="cell medium-6">
                                <div class="grid-container-fluid">
                                    <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                                        <div class="cell text-justify">
                                            <h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a></h2>
                                            <!--OR use the_content for full post, this can be split into template parts at the end;-->
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <div class="cell">
                                            <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                                            <?php boom_radio_readmore_link(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="cell large-7 shared" style="margin-bottom: 1rem">
                    <div class="grid-container-fluid gradiented-box gradient-one-two">
                        <!------------------------ Start of Events loop.---------------------------->
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

                        <?php if ($the_query->have_posts()) :
                            //Set varibale for the loop to control amount of posts
                            $i = 1;
                            while ($the_query->have_posts() && $i < 2) : $the_query->the_post(); ?>

                                <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                                    <div class="cell medium-5">

                                        <!--Set thumbnail image and default if no image-->
                                        <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('featured-large', array('class' => 'img-left box-shadowed'));
                                                } else {
                                                    echo '<img src="' . get_bloginfo("template_url") . '/src/assets/images/img-default.png" />';
                                                }
                                                ?>
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

                                <div <?php post_class('card'); ?>>
                                    <div class="cell"></div>
                                    <!--Check if a featured image has been uplaoded with the post-->
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" />
                                    <?php endif; ?>

                                    <div class="card-section">
                                        <div class="bio">
                                            <h5 class="section-title"><?php the_title() ?></h5>
                                            <div class="cell">
                                                <?php the_content(); ?>
                                            </div>
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

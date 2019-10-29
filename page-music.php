<?php

/**
 * Template Name: Full Music Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!-----------CONTENT HERE---------------->
<!-----------------------------Start of Artists Section---------------------------->
<article class="grid-container">
    <!--Title for secton-->
    <div class="grid-x grid-padding-y align-center align-middle">
        <div class="cell auto text-right">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
        </div>
        <div class="cell shrink">
            <h1>Latest Music</h1>
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
        );
        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set variable for the loop to control amount of posts
            $i = 1;
            while ($the_query->have_posts() && $i < 13) : $the_query->the_post(); ?>

                <div <?php post_class('cell'); ?>>
                    <div class="card">
                        <!--Set thumbnail image and default if no image-->
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('card');
                                } else {
                                    echo '<img src="' . get_bloginfo("template_url") . '/src/assets/images/img-default.png" />';
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
<!-----------------------------End of Artists Section------------------------------->

<!-----------------------------Start of Review Section------------------------------>
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
                <h3>Featured Artist</h3>
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
            while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
                                            the_post_thumbnail('card', array('class' => 'img-right box-shadowed'));
                                        endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell"></div>
                <div class="cell"></div>
            <?php endwhile;
                wp_reset_postdata(); ?>

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
    <div class="grid-x grid-padding-y align-center align-middle">
        <div class="cell auto text-right">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
        </div>
        <div class="cell shrink">
            <h3>Get in Touch</h3>
        </div>
        <div class="cell auto text-left">
            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
        </div>
    </div>
    <!-- Empty cell/s used  for spacing-->
    <div class="cell"></div>

    <!-------------------Social split cell section------------------------->
    <article class="grid-container">
        <div class="grid-x grid-margin-x">
            <!--Static info box and contact form section--->
            <div class="cell large-8 shared">
                <!--Static text on link-->
                <div class="grid-container-fluid gradiented-box gradient-one-two">
                    <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                        <div class=" cell">
                            <div class="grid-container-fluid">
                                <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                                    <div class="cell align-middle text-justify">
                                        <h2>Send Us a link</h2>
                                        <p>Fill out the information below with a link to your music hosting site so we can promote your music!</p>
                                        <br>
                                        <p>You can also catch us at at any of our open air events. For updates on where we will be listen in or check this website for details. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Contact Form-->
                <div class="grid-container-fluid">
                    <div class="grid-x grid-padding-x align-center">
                        <div class="cell">
                            <?php echo do_shortcode('[wpforms id="27551" title="false" description="false"]'); ?>
                        </div>
                    </div>
                </div>
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
                    );

                    $the_query = new WP_Query($args); ?>

                    <!--Start of the Loop-->
                    <?php if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post(); ?>

                            <div <?php post_class('card'); ?>>
                                <div class="cell"></div>
                                <!--Check if a featured image has been uplaoded with the post-->
                                <?php if (has_post_thumbnail()) {
                                            the_post_thumbnail('card');
                                        } else {
                                            echo '<img src="' . get_bloginfo("template_url") . '/src/assets/images/img-default.png" />';
                                        }
                                        ?>

                                <div class="card-section">
                                    <div class="bio">
                                        <h5 class="section-title"><?php the_title() ?></h5>
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <br>
                                    <?php boom_radio_card_link(); ?>
                                </div>
                            </div>
                        <?php endwhile;
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
<!-----------------------------End of Events Section-------------------------------->
<div class="cell"></div>
<!-----------------------------PLACEHOLDER Start of Contact Old Form------------------------------>
<!-----------------------------PLACEHOLDER End of Contact Form------------------------------>
<?php
get_footer();

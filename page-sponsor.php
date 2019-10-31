<?php

/**
 * Template Name: Full Sponsors Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>
<!-----------------------CONTENT HERE-------------------------------------->
<!-----------------------Start of Sponsors Introduction Section------------------------------------------>
<div class="grid-container">
    <div class="grid-x grid-padding-x grid-padding-y align-center">
        <!--Title with wave-->
        <div class="grid-x grid-padding-y align-center align-middle">
            <div class="cell auto text-right">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
            </div>
            <div class="cell shrink">
                <?php the_title('<h1>', '</h1>'); ?>
            </div>
            <div class="cell auto text-left">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
            </div>
        </div>

        <!-- Empty cell/s used  for spacing-->
        <!--<div class="cell"></div>
                            <div class="cell"></div>-->

        <div class="cell">
            <div class="grid-container-fluid gradiented-box gradient-three-four">
                <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                    <div class="cell">
                        <div class="grid-container-fluid">
                            <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                                <div class="cell text-justify">
                                    <h2>Our supporters</h2>
                                    <p>These wonderful, local businesses, currently sponsor BOOM Radio.</p>
                                    <br>
                                    <p>If you like what we do on BOOM, share the love and tell them you found them
                                        thanks to BOOM Radio.</p>
                                    <br>
                                    <a href="mailto:operations@boomradio.com.au" class="boom-button-white float-right">Sponsor Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
    </div>
</div>
<!-----------------------------Start of Artists Section---------------------------->
<article class="grid-container">
    <!--Start of card section for maximum of three Artist posts-->
    <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-3">

        <!--wp query arg set for card section-->
        <?php
        $args = array(
            'post_type' => 'sponsors',
            'orderby' => 'post__in',
            //Set maximum to three
            'posts_per_page'      => 12,
            'ignore_sticky_posts' => 1,
            'orderby'   => array(
                'date' => 'DESC',
            ),

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
<!-----------------------------End of Sponsors Section------------------------------->
<?php
get_footer();

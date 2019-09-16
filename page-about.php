<?php

/**
 * Template Name: Full About Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!-- Grid with empty cell for spacing -->
<div class="grid-container show-for-small hide-for-large">
    <div class="grid-x grid-margin-y">
        <!-- Empty cell/s used for spacing-->
        <div class="cell"></div>
    </div>
</div>
<!---H1 WITH WAVE -->
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
<!--End Title with Wave-->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <?php
        $args = array(
            'post_type' => 'about',
            'orderby' => 'post__in'
        );

        $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //The $postBackgroundColourCounter is the variable used in the posts background function and needs to be set to 0 before the beginning of WP loop
            $postBackgroundColourCounter = null;
            while ($the_query->have_posts()) : $the_query->the_post(); ?>

                <div <?php post_class('cell'); ?>>
                    <!-- Gradiented container ????????????????????????????????????????????????????????????????????????????????????????????? -->
                    <div class="grid-container-fluid gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                            <div class="cell medium-4">
                                <?php if (has_post_thumbnail()) :
                                            the_post_thumbnail('large', array('class' => 'img-right box-shadowed'));
                                        endif; ?>
                            </div>
                            <div class="cell medium-6">
                                <div class="grid-container-fluid">
                                    <div class="grid-x grid-padding-x grid-padding-y">
                                        <div class="cell">

                                            <?php the_title('<h2>', '</h2>'); ?>

                                        </div>
                                        <div class="cell text-justify">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="cell">
                                            <!-- <a href="https://www.northmetrotafe.wa.edu.au/courses/" class="boom-button-white float-right">Visit TAFE
                                    </a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Gradiented container ????????????????????????????????????????????????????????????????????????????????????????????? -->
                </div>
                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
                <div class="cell"></div>
                <?php 
                // Increasing the value of the $postBackgroundColourCounter variable before the end of the WP loop to keep having a different post background colour
                $postBackgroundColourCounter++; ?>
            <?php endwhile;
                wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!-- End of the loop.-->

        <!---Title with Wave -->
        <div class="grid-x grid-padding-y align-center align-middle">
            <div class="cell auto text-right">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
            </div>
            <div class="cell shrink">
                <h3>Terms & Conditions</h3>
            </div>
            <div class="cell auto text-left">
                <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
            </div>
        </div>
        <!--END OF H3 WAVE-->
        <div class="grid-container">
            <div class="grid-x grid-margin-x grid-margin-y align-center">
                <div class="cell">
                    <!-- Gradiented container ????????????????????????????????????????????????????????????????????????????????????????????? -->
                    <div class="grid-container-fluid gradiented-box gradient-five-six">
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                            <div class="cell medium-4">
                                <img class="img-left box-shadowed" src="assets/img/boom_team/jay_cin_bron_lrg.jpg" alt="Show image">
                            </div>
                            <div class="cell medium-6">
                                <div class="grid-container-fluid">
                                    <div class="grid-x grid-padding-x grid-padding-y">
                                        <div class="cell">
                                            <h2>General Competition Terms</h2>
                                        </div>
                                        <div class="cell text-justify">
                                            <p>All winners must adhere to both the contest’s and Boom Radio’s
                                                terms
                                                and conditions.</p>
                                            <br>
                                            <p>For more information click the button below</p>
                                        </div>
                                        <div class="cell">
                                            <a href="terms.html" class="boom-button-white float-right">Read
                                                More...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Gradiented container ????????????????????????????????????????????????????????????????????????????????????????????? -->
                </div>
                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
                <div class="cell"></div>
            </div>
        </div>
    </div>
</div>
<!-- END OF MAIN BODY ============================================================================================================================================== -->



<?php
get_footer();

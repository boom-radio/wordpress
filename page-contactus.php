<?php

/**
 * Template Name: Full Contact Us Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<?php  //---------CONTENT HERE 
?>
<!---Title with Wave -->
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
<aside>
    <!--Addition of some Foundation classes used in the prototype-->
    <div class="grid-container">
        <div class="grid-x grid-padding-x grid-padding-y">

            <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?> shared">
                <div class="grid-container">
                    <div class="grid-x info-container grid-padding-x grid-margin-x grid-margin-y gradiented-box gradient-five-six small-up-1 medium-up-1 large-up-2">
                        <!-------------------- Start of the Address loop---------------------------->
                        <?php
                        $args = array(
                            'post_type' => 'contact_details',
                            'posts_per_page'      => 1,
                            'post__in'            => get_option('sticky_posts'),
                            'ignore_sticky_posts' => 1,
                            'orderby'   => array(
                                'date' => 'DESC',
                            ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_contact',
                                    'field'    => 'slug',
                                    'terms' =>  'Address'
                                )
                            )
                        );

                        $the_query = new WP_Query($args); ?>

                        <!--Start of the Loop-->
                        <?php if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <div <?php post_class('cell'); ?>>
                                    <div class="cell"></div>
                                    <?php the_title('<h2>', ':</h2>'); ?>
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile;
                                wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                        <!--------------------------- End of the Address loop.--------------------------->

                        <!---------------------------- Start of the Postal Address loop------------------->
                        <?php
                        $args = array(
                            'post_type' => 'contact_details',
                            'posts_per_page'      => 1,
                            'post__in'            => get_option('sticky_posts'),
                            'ignore_sticky_posts' => 1,
                            'orderby'   => array(
                                'date' => 'DESC',
                            ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_contact',
                                    'field'    => 'slug',
                                    'terms' =>  'Postal'
                                )
                            )
                        );

                        $the_query = new WP_Query($args); ?>

                        <!--Start of the Loop-->
                        <?php if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <div <?php post_class('cell'); ?>>
                                    <div class="cell"></div>
                                    <?php the_title('<h2>', ':</h2>'); ?>
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile;
                                wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                        <!------------------------- End of the Postal Address loop.-------------------------->

                        <!---------------------------- Start of the Management List loop------------------->
                        <?php
                        $args = array(
                            'post_type' => 'contact_details',
                            'posts_per_page'      => 1,
                            'post__in'            => get_option('sticky_posts'),
                            'ignore_sticky_posts' => 1,
                            'orderby'   => array(
                                'date' => 'DESC',
                            ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_contact',
                                    'field'    => 'slug',
                                    'terms' =>  'Management'
                                )
                            )
                        );

                        $the_query = new WP_Query($args); ?>

                        <!--Start of the Loop-->
                        <?php if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <div <?php post_class('cell'); ?>>
                                    <div class="cell"></div>
                                    <?php the_title('<h2>', ':</h2>'); ?>
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile;
                                wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                        <!------------------------- End of the Management List loop.-------------------------->

                        <!---------------------------- Start of the Phone List loop------------------->
                        <?php
                        $args = array(
                            'post_type' => 'contact_details',
                            'posts_per_page'      => 1,
                            'post__in'            => get_option('sticky_posts'),
                            'ignore_sticky_posts' => 1,
                            'orderby'   => array(
                                'date' => 'DESC',
                            ),
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_contact',
                                    'field'    => 'slug',
                                    'terms' =>  'Phone'
                                )
                            )
                        );

                        $the_query = new WP_Query($args); ?>

                        <!--Start of the Loop-->
                        <?php if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                <div <?php post_class('cell'); ?>>
                                    <div class="cell"></div>
                                    <?php the_title('<h2>', ':</h2>'); ?>
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile;
                                wp_reset_postdata(); ?>

                        <?php else : ?>
                            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                        <!------------------------- End of the Phone List loop.-------------------------->
                        <div class="cell"></div>
                    </div>
                </div>


                <div class="grid-container" id="yoursong">
                    <div class="grid-x grid-padding-y align-center align-middle">
                        <div class="cell auto text-right">
                            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_left.svg'); ?>" alt="wave left">
                        </div>
                        <div class="cell shrink">
                            <h3>Send us an Email</h3>
                        </div>
                        <div class="cell auto text-left">
                            <img src="<?php echo get_theme_file_uri('src/assets/img/wave_right.svg'); ?>" alt="wave right">
                        </div>
                    </div>
                    <!-- Empty cell/s used  for spacing-->
                    <div class="cell"></div>

                    <!--------------------Start of Contact Form---------------->
                    <div class="grid-container-fluid">
                        <div class="grid-x grid-padding-x align-center">
                            <div class="cell">
                                <?php echo do_shortcode('[wpforms id="27551" title="false" description="false"]'); ?>
                            </div>
                        </div>
                    </div>
                    <!--------------------End of Contact Form---------------->

                    <!------------------------Start of Map------------------------------>
                    <div class="grid-container-fluid">
                        <div class="grid-x grid-padding-x align-center">
                            <div class="cell">
                                <?php echo do_shortcode('[wpgmza id="1"]'); ?>
                            </div>
                        </div>
                    </div>
                    <!------------------------End of Map------------------------------>

                </div>
            </div>
            <?php if (is_active_sidebar('primary-sidebar')) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</aside>
<?php
get_footer();

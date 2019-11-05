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
<!--Title with waves and page title -->
<?php get_template_part('template-parts/content/title', 'none'); ?>


<!--Addition of some Foundation classes used in the prototype-->
<div class="grid-container">
    <div class="grid-x grid-padding-x align-center">
        <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '9' : '12'; ?> shared">
            <!--------------------- Contact Form ------------------------------------>
            <!--Contact form-->
            <?php get_template_part('template-parts/components/contactform', get_post_format()); ?>

            <!--------------------- Contact info section ---------------------------->
            <div class="grid-container-fluid">
                <div class="grid-x grid-padding-x grid-margin-x grid-margin-y gradiented-box gradient-five-six small-up-1 medium-up-2 info-container">
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
                    ); ?>

                    <!--Use set_query to give template parts access to variable-->
                    <?php set_query_var('args', $args); ?>
                    <?php get_template_part('template-parts/posts/contact', get_post_format()); ?>
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
                    ); ?>

                    <!--Use set_query to give template parts access to variable-->
                    <?php set_query_var('args', $args); ?>
                    <?php get_template_part('template-parts/posts/contact', get_post_format()); ?>
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
                    ); ?>

                    <!--Use set_query to give template parts access to variable-->
                    <?php set_query_var('args', $args); ?>
                    <?php get_template_part('template-parts/posts/contact', get_post_format()); ?>
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
                    ); ?>

                    <!--Use set_query to give template parts access to variable-->
                    <?php set_query_var('args', $args); ?>
                    <?php get_template_part('template-parts/posts/contact', get_post_format()); ?>
                    <!------------------------- End of the Phone List loop.-------------------------->
                    <div class="cell"></div>
                </div>
            </div>

            <!------------------------Empty grid for spacing between contact details and map------------------------------>
            <div class="grid-container-fluid">
                <div class="grid-x grid-margin-y">
                    <div class="cell"></div>
                </div>
            </div>
            <!-------------------End of empty grid for spacing between contact details and map---------------------------->

            <!--------------------------Dynamic map---------------------------------->
            <?php get_template_part('template-parts/components/map', get_post_format()); ?>
        </div>

        <?php if (is_active_sidebar('primary-sidebar')) { ?>
            <?php get_sidebar(); ?>
        <?php } ?>

    </div>
</div>

<?php
get_footer();

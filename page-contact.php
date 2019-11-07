<?php

/**
 * Template Name: Full Contact Us Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!-----------CONTENT HERE---------->
<!--This is page-contact.php-->
<!--- Go to top button -->
<?php get_template_part('template-parts/components/gototop', 'none'); ?>
<!--Title with waves and page title -->
<?php get_template_part('template-parts/content/title', 'none'); ?>


<!--Addition of some Foundation classes used in the prototype-->
<div class="grid-container">
    <div class="grid-x grid-padding-x grid-margin-x align-center">
        <div class="cell">

            <!--------------------- Contact info section ---------------------------->
            <div class="grid-container-fluid">
                <div class="grid-x grid-margin-x grid-margin-y gradiented-box gradient-five-six small-up-1 medium-up-2 info-container">
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
            <div class="grid-x ">
                <div class="cell large-7">    
                    <!---Title of the Second Section -->
                    <div class="grid-x grid-padding-y align-center align-middle">
                        <div class="cell shrink text-right">
                            <img src="<?php echo esc_html__(get_theme_file_uri('src/assets/img/wave_left.svg')); ?>" alt="wave left" width="80px">
                        </div>
                        <div class="cell shrink">                    
                            <h3>Send us an Email</h3>
                    <?php get_template_part('template-parts/components/waveright', 'none'); ?>
                    <!--------------------- Contact Form ------------------------------------>
                    <!--Contact form-->
                    <?php get_template_part('template-parts/components/contactform', get_post_format()); ?>
                </div>  
                <!--------------------------Dynamic map---------------------------------->
                <div class="cell large-5"><?php get_template_part('template-parts/components/map', get_post_format()); ?></div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();

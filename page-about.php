<?php

/**
 * Template Name: Full About Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>
<!--<h3>This is page-about</h3>-->
<!--- Go to top button -->
<?php get_template_part('template-parts/components/gototop', 'none'); ?>
<!--Title with waves and page title -->
<?php get_template_part('template-parts/content/title', 'none'); ?>

<!-- About Section -->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <?php
        $args = array(
            'post_type' => 'about',
            'orderby' => 'post__in'
        ); ?>

        <!--The Query-->
        <?php $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) : ?>
            <?php //The $postBackgroundColourCounter is the variable used in the posts background function and needs to be set to 0 before the beginning of WP loop
                $postBackgroundColourCounter = null; ?>
            <?php //The $postNumber Is used into the function to swap image and paragraph left/right
                $postNumber = null; ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div <?php post_class('cell'); ?>>
                    <!-- Gradiented container -->
                    <div class="grid-container-fluid gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
                        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                            <?= posts_image_paragraph_position($postNumber) ?>
                        </div>
                    </div>
                </div>

                <!-- Empty cell/s used  for spacing-->
                <div class="cell"></div>
                <?php
                        // Increasing the value of the $postBackgroundColourCounter variable before the end of the WP loop to keep having a different post background colour
                        $postBackgroundColourCounter++; ?>
                <?php // Increasing the $postNumber variable every loop to swap image and paragraphs left/right
                        $postNumber++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <!-- End of the loop.-->
        <?php //get_template_part('template-parts/content/terms', 'none'); 
        ?>
    </div>
</div>

<!-- Sponsors section -->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <div class="cell"></div>
        <!-- Sponsors template part -->
        <?php get_template_part('template-parts/content/supporters', 'none'); ?>
    </div>
</div>

<!-- Terms & Conds section -->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <div class="cell"></div>
        <!-- Terms template part -->
        <?php get_template_part('template-parts/content/terms', 'none'); ?>
    </div>
</div>
<!-- END OF MAIN BODY -->

<?php
get_footer();

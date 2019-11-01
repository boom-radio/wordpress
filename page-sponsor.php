<?php

/**
 * Template Name: Full Sponsors Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!-----------------------Start of Sponsors Introduction Section------------------------------>
<div class="grid-container">
    <div class="grid-x grid-padding-x grid-padding-y align-center">
        <!--Title with waves and page title -->
        <?php get_template_part('template-parts/content/title', 'none'); ?>
        <!--Sponsors message-->
        <?php get_template_part('template-parts/content/sponsors', 'none'); ?>
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

        ); ?>

        <!--The Query-->
        <?php $the_query = new WP_Query($args); ?>

        <!--Start of the Loop-->
        <?php if ($the_query->have_posts()) :
            //Set variable for the loop to control amount of posts
            $i = 1;
            while ($the_query->have_posts() && $i < 13) : $the_query->the_post(); ?>
                <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
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

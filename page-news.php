<?php
//The index page for Boom Radio with examples

/**
 * @package WordPress
 * @subpackage boom_radio
 * @since 1.0.0
 */

get_header();
?>

<!--<h3>This is page-news.php</h3>-->
<!--- Go to top button -->
<?php get_template_part('template-parts/components/gototop', 'none'); ?>
<!--Set the latest search query variable and delivers it to the title-->
<?php get_template_part('template-parts/components/results', get_post_format()); ?>

<aside>
    <div class="grid-container">
        <div class="grid-x grid-padding-x grid-padding-y">
            <div class="cell"></div>
            <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '9' : '12'; ?> shared">
                <!-----------------------Start of Sponsors Introduction Section------------------------------>
                <div class="grid-container">
                    <div class="grid-x grid-padding-x grid-padding-y align-center">
                        <!--Title with waves and page title -->
                        <?php get_template_part('template-parts/content/title', 'none'); ?>
                    </div>
                </div>

                <!-----------------------------Start of Artists Section---------------------------->
                <article class="grid-container">
                    <!--Start of card section for maximum of three Artist posts-->
                    <div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-2">
                        <!--wp query arg set for card section-->
                        <?php
                        $args = array(
                            'post_type' => 'news',
                            //'posts_per_page'      => 2,
                            'post__in'            => get_option('sticky_posts'),
                            'ignore_sticky_posts' => 1,
                            'orderby'   => array(
                                'date' => 'DESC',
                            ),

                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_news',
                                    'field'    => 'slug',
                                    'terms' => array('old-posts', 'events', 'breaking-news', 'music-news', 'cinema', 'sport', 'politics'),
                                )
                            )
                        ); ?>

                        <!--The Query-->
                        <?php $the_query = new WP_Query($args); ?>

                        <!--Start of the Loop-->
                        <?php if ($the_query->have_posts()) : ?>
                            <?php //Set variable for the loop to control amount of posts
                                $i = 1; ?>
                            <?php while ($the_query->have_posts() && $i < 13) : $the_query->the_post(); ?>
                                <?php get_template_part('template-parts/posts/cardpost', get_post_format()); ?>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                            <?php //Ensure global wp variable are set to default after custom query
                                wp_reset_postdata(); ?>
                        <?php else : ?>
                            <p style="color: #FFF;"><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                        <?php the_posts_pagination(); ?>
                    </div>
                </article>
                <div class="cell"></div>
            </div>
            <?php if (is_active_sidebar('primary-sidebar')) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </div>
</aside>
<?php
get_footer();

<?php

/**
 * Template Name: Full Listen Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!-----------CONTENT HERE---------------->
<!--Title with waves and page title -->
<?php get_template_part('template-parts/content/title', 'none'); ?>

<!-- TABS MULTI CONTENT : RADIO SHOWS - CATEGORY SHOWS-->
<div class="grid-container">
    <div class="cell ">
        <div class="md-tabs">
            <ul class="tabs" data-responsive-accordion-tabs="tabs small-accordion medium-tabs large-tabs" id="collapsing-tabs" data-allow-all-closed="true" data-multi-expand="true" data-deep-link="true">
                <li class="tabs-title is-active"></span><a href="#big-breakfast"><i class="fas fa-microphone-alt"></i> BOOM's Big
                        Breakfast</a></li>
                <li class="tabs-title"></span><a href="#drive-home"><i class="fas fa-microphone-alt"></i> The Drive Home</a>
                </li>
                <li class="tabs-title"></span><a href="#speciality-show"><i class="fas fa-microphone-alt"></i> Specialty Shows</a>
                </li>
                <li class="slide"></li>
            </ul>
            <div class="tabs-content" data-tabs-content="collapsing-tabs">
                <div class="tabs-panel is-active" id="big-breakfast">
                    <div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-2">
                        <?php
                        $args = array(
                            'post_type' => 'schedule',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_schedule',
                                    'field' => 'slug',
                                    'terms' => 'big-breakfast'
                                )
                            ),
                            'posts_per_page' => 10,
                        ); ?>

                        <!--The Query-->
                        <?php $the_query = new WP_Query($args); ?>

                        <!-- The Loop -->
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="cell">
                                    <div class="card">
                                        <!-- insert selected post's title-->
                                        <h4><?php the_title(); ?></h4>
                                        <div class="card-section">
                                            <div class="bio">
                                                <div class="entry-content">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img src="<?php the_post_thumbnail_url('card'); ?>" class="gradiented-box" />
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php the_content(); ?>
                                                    <?php boom_radio_card_link(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endwhile;
                            else :  ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tabs-panel" id="drive-home">
                    <div class="grid-x grid-padding-x small-up-1 medium-up-3 large-up-3">
                        <?php
                        $args = array(
                            'post_type' => 'schedule',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_schedule',
                                    'field' => 'slug',
                                    'terms' => 'the-drive-home'
                                )
                            ),
                            'posts_per_page' => 10,
                        ); ?>

                        <!--The Query-->
                        <?php $the_query = new WP_Query($args); ?>

                        <!-- The Loop -->
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="cell">
                                    <div class="card">
                                        <!-- insert selected post's title-->
                                        <h4><?php the_title(); ?></h4>
                                        <div class="card-section">
                                            <div class="bio">
                                                <div class="entry-content">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img src="<?php the_post_thumbnail_url('card'); ?>" class="gradiented-box" />
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endwhile;
                            else :  ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="tabs-panel" id="speciality-show ">
                    <div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-4">
                        <?php
                        $args = array(
                            'post_type' => 'schedule',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category_schedule',
                                    'field' => 'slug',
                                    'terms' => 'speciality-shows'
                                )
                            ),
                            'posts_per_page' => -1,
                        ); ?>

                        <!--The Query-->
                        <?php $the_query = new WP_Query($args); ?>

                        <!-- The Loop -->
                        <?php if ($the_query->have_posts()) : ?>
                            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                <div class="cell">
                                    <div class="card">
                                        <!-- insert selected post's title-->
                                        <h4><?php the_title(); ?></h4>
                                        <div class="card-section">
                                            <div class="bio">
                                                <div class="entry-content">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img src="<?php the_post_thumbnail_url('card'); ?>" class="gradiented-box" />
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                            <?php endwhile;
                            else :  ?>
                            <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF TABS-->

<!---Title of the Second Section -->
<?php get_template_part('template-parts/components/waveleft', 'none'); ?>
<h3>Presenters</h3>
<?php get_template_part('template-parts/components/waveright', 'none'); ?>

<!--BEGINNING OF SLICK CAROUSEL SECTION-->
<!--Slick carousel tester-->
<div class="grid-container">
    <div class="cell">
        <div class="responsive">
            <?php
            $args = array(
                'post_type' => 'presenter',
                'posts_per_page' => -1,
            ); ?>

            <!--The Query-->
            <?php $the_query = new WP_Query($args); ?>

            <!-- The Loop -->
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php //render random gradient background
                            // $list = array('gradient-one-two', 'gradient-three-four', 'gradient-five-six' );
                            // $i = array_rand($list);
                            // $gradient = $list[$i];
                            // 
                            ?>
                    <div class=" callout <?php
                                                    $gradientedColour = array("gradient-one-two", "gradient-three-four", "gradient-five-six");
                                                    // $randomColour = array_rand($gradientedColour); //pick a random post background
                                                    // echo $gradientedColour[$randomColour];
                                                    $arrayLength = (count($gradientedColour) - 1); //Counting the array elements minus 1
                                                    if (empty($counter)) {
                                                        $counter = 0;
                                                    } //If the variable is empty set it to 0 (first array index)

                                                    echo $gradientedColour[$counter]; //echo the background colour

                                                    if ($counter != $arrayLength) {
                                                        $counter++; //Increase the counter by 1 until the last index of the array is reached
                                                    } else {
                                                        $counter = 0; //When the last index of the array is reached reset the counter to 0 (restart with first backgroud colour)
                                                    }
                                                    ?>
                            ">
                        <!-- insert selected post's title-->
                        <h4><?php esc_html_e(the_title()); ?></h4>
                        <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } ?>
                        <a href="<?php echo esc_url(the_permalink()); ?>" class="boom-button-white float-right">Tell me more!</a>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php endwhile;
                else :  ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<!--END OF SLICK CAROUSEL SECTION - SHOW FOR LARGE-->

<?php
get_footer();

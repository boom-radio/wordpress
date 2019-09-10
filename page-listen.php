<?php

/**
 * Template Name: Full Listen Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<!---H1 WITH WAVE -->
    <div class="grid-x grid-padding-y align-center align-middle">
        <div class="cell auto text-right">
            <img src="src/assets/img/wave_left.svg" alt="wave left">
        </div>
        <div class="cell shrink">
            <h1>What's On</h1>
        </div>
        <div class="cell auto text-left">
            <img src="src/assets/img/wave_right.svg" alt="wave right">
        </div>
    </div>
    <!--End of Title with Wave-->
    <div class="grid-container">
        <div class="cell ">
            <!-- TABS MULTI CONTENT : RADIO SHOWS-->
            <div class="md-tabs">
                <ul class="tabs" data-responsive-accordion-tabs="tabs small-accordion medium-tabs large-tabs"
                id="collapsing-tabs" data-allow-all-closed="true" data-multi-expand="true" data-deep-link="true">
                <li class="tabs-title is-active"></span><a href="#panel1c"><i class="fas fa-microphone-alt"></i> BOOM's Big
                    Breakfast</a></li>
                <li class="tabs-title"></span><a href="#panel2c"><i class="fas fa-microphone-alt"></i> The Drive Home</a>
                </li>
                <li class="tabs-title"></span><a href="#panel3c"><i class="fas fa-microphone-alt"></i> Specialty Shows</a>
                </li>
                <li class="slide"></li>
                </ul>
                <div class="tabs-content" data-tabs-content="collapsing-tabs">
                    <div class="tabs-panel is-active" id="panel1c">
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
                                );

                                //The Query
                                $the_query = new WP_Query( $args ); 
                                ?>
                            <!-- The Loop -->
                            <?php if ( $the_query->have_posts() ) : ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="cell">
                                    <div class="card">
                                    <!-- insert selected post's title-->
                                        <h4><?php the_title(); ?></h4>
                                        <div class="card-section">
                                            <div class="bio">
                                                <div class="entry-content">
                                                    <?php the_content(); ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                                <?php endwhile; else:  ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel2c">
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
                                );
                                //The Query
                                $the_query = new WP_Query( $args ); 
                                ?>
                            <!-- The Loop -->
                            <?php if ( $the_query->have_posts() ) : ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="cell">
                                    <div class="card">
                                    <!-- insert selected post's title-->
                                        <h4><?php the_title(); ?></h4>
                                        <div class="card-section">
                                            <div class="bio">
                                                <div class="entry-content">
                                                    <?php the_content(); ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                                <?php endwhile; else:  ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel3c">
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
                                );

                                //The Query
                                $the_query = new WP_Query( $args ); 
                                ?>
                            <!-- The Loop -->
                            <?php if ( $the_query->have_posts() ) : ?>
                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                <div class="cell">
                                    <div class="card">
                                    <!-- insert selected post's title-->
                                        <h4><?php the_title(); ?></h4>
                                        <div class="card-section">
                                            <div class="bio">
                                                <div class="entry-content">
                                                    <?php the_content(); ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php wp_reset_postdata(); ?>
                                <?php endwhile; else:  ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF TABS-->
    <!-- CATEGORY SHOWS-->

    <!---Title with Wave -->
    <div class="grid-x grid-padding-y align-center align-middle" id="presenters">
        <div class="cell auto text-right">
            <img src="assets/img/wave_left.svg" alt="wave left">
        </div>
        <div class="cell shrink">
            <h3>Presenters</h3>
        </div>
        <div class="cell auto text-left">
            <img src="assets/img/wave_right.svg" alt="wave right">
        </div>
    </div>
    <!--End of Title with Wave-->

    <!--BEGINNING OF SLICK CAROUSEL SECTION-->
    <!--Slick carousel tester-->
    <div class="grid-container" >
      <div class="cell">
        <div class="responsive">
            <?php 
                $args = array(
                    'post_type' => 'presenter', 
                    'posts_per_page' => -1,
                );

                //The Query
                $the_query = new WP_Query( $args ); 
                ?>
            <!-- The Loop -->
            <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php //render random gradient background
                    $list = array('gradient-one-two', 'gradient-three-four', 'gradient-five-six' );
                    $i = array_rand($list);
                    $gradient = $list[$i];
                    ?>
                    <div class=" callout <?php echo $gradient?>">
                    <!-- insert selected post's title-->
                        <h4><?php the_title(); ?></h4>
                        <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                        }?>
                        <a href="<?php echo the_permalink();?>" class="boom-button-white float-right">Tell me more!</a>
                    </div>
                    <?php wp_reset_postdata(); ?>
                    <?php endwhile; else:  ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
        </div>
      </div>
    </div>
    <!--END OF SLICK CAROUSEL SECTION - SHOW FOR LARGE-->
  </div>
<?php
get_footer();

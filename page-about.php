<?php

/**
 * Template Name: Full About Page
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since boom_radio 1.0
 */
get_header(); ?>

<?php  //---------CONTENT HERE 
?>

<!-- Showing the music player in the body -->
<div class="grid-container show-for-small hide-for-large">
    <div class="grid-x grid-margin-y grid-padding-x grid-padding-y align-middle">
        <div class="cell medium-3"></div>
        <div class="cell medium-6 gradiented-box gradient-five-six">
            <iframe class="boomPlayer" src="https://tunein.com/embed/player/s195836/"></iframe>
        </div>
    </div>
</div>
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
        <img src="assets/img/wave_left.svg" alt="wave left">
    </div>
    <div class="cell shrink">
        <?php the_title('<h1>', '</h1>'); ?>
    </div>
    <div class="cell auto text-left">
        <img src="assets/img/wave_right.svg" alt="wave right">
    </div>
</div>
<!--End Title with Wave-->
<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y align-center">
        <div class="cell">
            <!-- Gradiented container ????????????????????????????????????????????????????????????????????????????????????????????? -->
            <div class="grid-container-fluid gradiented-box gradient-one-two">
                <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                    <div class="cell medium-4">
                        <img class="img-left box-shadowed" src="assets/img/shows/urban_jungle_lrg.jpg" alt="show image">
                    </div>
                    <div class="cell medium-6">
                        <div class="grid-container-fluid">
                            <div class="grid-x grid-padding-x grid-padding-y">
                                <div class="cell text-justify">

                                    <?php // Get post content to extract first title.
                                    $blocks = parse_blocks(get_the_content());
                                    foreach ($blocks as $block) {
                                        if ('core/first-chapter' === $block['blockName']) {
                                            echo do_shortcode($block['innerHTML']);
                                            break;
                                        }
                                    }
                                    // Display the title.
                                    ?>
                                    <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                                    <?php boom_radio_readmore_link(); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cell"></div>
        <div class="cell"></div>
        <div class="grid-container-fluid gradiented-box gradient-three-four">
            <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
                <div class="cell medium-6">
                    <div class="grid-container-fluid">
                        <div class="grid-x grid-padding-x grid-padding-y">
                            <div class="cell text-justify">

                                

                            </div>
                        </div>
                    </div>
                </div>
                <div class="cell medium-4">
                    <img class="img-left box-shadowed" src="assets/img/shows/urban_jungle_lrg.jpg" alt="show image">
                </div>
            </div>
        </div>
    </div>
</div>



<?php
get_footer();

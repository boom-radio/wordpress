<!--Placeholder file - Main archive folder for the site-->
<?php get_header(); ?>

<!--Addition of classes-->
<div class="grid-container">
    <div class="grid-x grid-padding-y align-center">
        <div class="cell">
            <header>
                <?php the_archive_title('<h1>', '</h1>'); ?>
                <?php the_archive_description('<p>', '</p>'); ?>
            </header>
        </div>
    </div>
</div>

<!--Loop for the archive with conditional for active sidebar-->
<article class="grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-<?php echo is_active_sidebar('primary-sidebar') ? '8' : '12'; ?> shared">
            <?php if (have_posts()) { ?>
                <!--The $postBackgroundColourCounter is the variable used in the posts background function and needs to be set to 0 before the beginning of WP loop-->
                <?php $postBackgroundColourCounter = null;
                    //The $postNumber Is used into the function to swap image and paragraph left/right
                    $postNumber = null; ?>
                <?php
                    // Start of the Loop
                    while (have_posts()) : ?>
                    <?php the_post(); ?>
                    <div class="cell"></div>
                    <div <?php post_class('cell'); ?>>
                        <div class="grid-container gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
                            <div class="grid-x grid-padding-x grid-padding-y">
                                <div class="cell medium-8">
                                    <div class="grid-container">
                                        <div class="grid-x grid-padding-x">
                                            <h2>
                                                <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                                            </h2>
                                            <!--OR use the_content for full post, this can be split into template parts at the end;-->
                                            <?php the_excerpt(); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="cell medium-4 centered">
                                    <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                                    <?php boom_radio_readmore_link(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            // Increasing the value of the $postBackgroundColourCounter variable before the end of the WP loop to keep having a different post background colour
                            $postBackgroundColourCounter++;
                            // Increasing the $postNumber variable every loop to swap image and paragraphs left/right
                            $postNumber++; ?>
                <?php endwhile; // End of the loop. 
                    ?>
                <div class="cell"></div>
                <div class="cell">
                    <?php the_posts_pagination(array('mid_size' => 5)); ?>
                </div>
            <?php } ?>
        </div>
        <?php if (is_active_sidebar('primary-sidebar')) { ?>
            <div class="cell auto">
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
    </div>
</article>
<?php get_footer(); ?>

<!-- .page-header
//------For use when building this page-------
// if ( is_category() || is_archive() ) {
// the_excerpt();
//} else {
// the_content();
//} // -->
<div <?php post_class('cell'); ?>>
    <div class="grid-container gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
        <div class="grid-x grid-padding-x grid-padding-y">

            <div class="cell medium-8">
                <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <h2>
                            <a href="<?php esc_url(the_permalink()) ?>" title="<?php esc_attr_e(the_title_attribute()) ?>"><?php esc_html_e(the_title()) ?></a>
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
<div class="cell"></div>
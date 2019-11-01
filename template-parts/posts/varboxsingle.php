<div <?php post_class('cell'); ?>>
    <div class="grid-container gradiented-box <?= posts_background_colour_function($postBackgroundColourCounter);  ?>">
        <div class="grid-x grid-padding-x grid-padding-y">
            <div class="cell">
                <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <h2>
                            <a href="<?php esc_url(the_permalink()) ?>" title="<?php esc_attr_e(the_title_attribute()) ?>"><?php esc_html_e(the_title()) ?></a>
                        </h2>
                        <!--OR use the_content for full post, this can be split into template parts at the end;-->
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cell"></div>
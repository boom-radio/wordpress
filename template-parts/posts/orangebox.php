<div <?php post_class('grid-container-fluid gradiented-box gradient-five-six'); ?>>
    <div class="grid-x grid-padding-x grid-margin-x grid-padding-y align-spaced align-middle">
        <div class="cell medium-4">
            <?php if (has_post_thumbnail()) { ?>
                <?php the_post_thumbnail('card', array('class' => 'img-right box-shadowed')); ?>
            <?php } else { ?>
                <?php echo '<img class="img-left box-shadowed" src="' . esc_url(get_bloginfo("template_url")) . '/src/assets/img/img-default.png" alt="Boom Logo"/>'; ?>
            <?php } ?>
        </div>
        <div class="cell medium-6">
            <div class="grid-container-fluid">
                <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                    <div class="cell text-justify">
                        <h2><a class="grad-title" href="<?php esc_url(the_permalink()) ?>" title="<?php esc_attr_e(the_title_attribute()) ?>"><?php esc_html_e(the_title()) ?></a></h2>
                        <!--OR use the_content for full post, this can be split into template parts at the end;-->
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="cell">
                        <!--This is to attach the White boom Radio button, code in lib/helpers.php as an example of how we can resue sections of code across the site-->
                        <?php boom_radio_readmore_link(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
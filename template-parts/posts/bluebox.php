<div <?php post_class('grid-container gradiented-box gradient-three-four'); ?>>
    <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
        <div class="cell medium-6">
            <div class="grid-container-fluid">
                <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                    <div class="cell text-justify">
                        <h2>
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                        </h2>
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
        <div class="cell medium-4">
            <?php if (has_post_thumbnail()) :
                the_post_thumbnail('card', array('class' => 'img-right box-shadowed'));
            endif; ?>
        </div>
    </div>
</div>
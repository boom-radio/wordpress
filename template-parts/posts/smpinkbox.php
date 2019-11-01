<div class="grid-x grid-padding-x grid-padding-y align-spaced small-up-1 medium-up-2">
    <div class="cell medium-5">

        <!--Set thumbnail image and default if no image-->
        <?php if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('card', array('class' => 'img-left box-shadowed')); ?>
        <?php } else { ?>
            <?php echo '<img src="' . esc_url(get_bloginfo("template_url")) . '/src/assets/images/img-default.png" />'; ?>
        <?php } ?>
    </div>
    <div class="cell medium-7">
        <div class="grid-container-fluid">
            <div class="grid-x grid-margin-x grid-margin-y grid-padding-x grid-padding-y">
                <div class="cell align-middle text-justify">
                    <h2><?php the_title() ?></h2>
                    <?php the_excerpt(); ?>
                </div>
                <div class="cell show-for-small hide-for-large">
                </div>
                <div class="cell">
                    <?php boom_radio_readmore_link(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
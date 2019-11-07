<div <?php post_class('cell'); ?>>
    <?php //render random gradient background
    $list = array('gradient-one-two', 'gradient-three-four', 'gradient-five-six'); ?>
    <?php $i = array_rand($list); ?>
    <?php $gradient = $list[$i]; ?>
    ?>
    <div class="grid-container-fluid gradiented-box <?php echo $gradient ?>">
        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
            <div class="cell medium-10">
                <div class="grid-container-fluid">
                    <div class="grid-x grid-padding-x grid-padding-y">
                        <div class="cell"></div>
                        <div class="cell text-justify">
                            <h2>
                                <?php the_title() ?>
                            </h2>
                            <?php the_content(); ?>
                            <!-- check if the custom field created with metabox is not empty before displaying the button-->
                            <?php
                            $fb_custom_field = get_post_meta($post->ID, 'mbp_insta', true); ?>
                            <?php if ($fb_custom_field) { ?>
                                <a class="small-social-button button gradiented-box gradient-five-six " href="<?php echo esc_url(get_post_meta($post->ID, 'mbp_insta', true)); ?>" target="_blank" title="Follow on Instgram"> <i class="fab fa-instagram fa-1x"></i> Follow</a>
                            <?php
                            } else { ?>
                                <!--don't display Insta button-->
                            <?php } ?>
                            <!-- check if the custom field created with metabox is not empty before displaying the button-->
                            <?php
                            $insta_custom_field = get_post_meta($post->ID, 'mbp_email', true); ?>
                            <?php if ($insta_custom_field) { ?>
                                <a class="small-social-button button gradiented-box gradient-one-two " href="mailto:<?php echo esc_url(get_post_meta($post->ID, 'mbp_email', true)); ?>?Subject=Hello%20from%20Boom%20Radio%20website" title="Write an Email"><i class="fas fa-envelope fa-1x"></i> Write an Email</a>
                            <?php
                            } else { ?>
                                <!--don't display Email button-->
                            <?php }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) : ?>
        <?php comments_template(); ?>
    <?php endif; ?>
</div>
<!--End the loop.-->
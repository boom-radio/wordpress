<div <?php post_class('cell'); ?>>
    <?php //render random gradient background
    $list = array('gradient-one-two', 'gradient-three-four', 'gradient-five-six');
    $i = array_rand($list);
    $gradient = $list[$i];
    ?>
    <div class="grid-container-fluid gradiented-box <?php echo $gradient ?>">
        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
            <div class="cell medium-10">
                <div class="grid-container-fluid">
                    <div class="grid-x grid-padding-x grid-padding-y">
                        <div class="cell"></div>
                        <div class="cell auto">
                            <?php if (has_post_thumbnail()) :
                                the_post_thumbnail('card', array('class' => 'box-shadowed'));
                            endif; ?>
                            <!-- check if the custom field created with metabox is not empty before displaying the button-->
                            <?php
                            $fb_custom_field = get_post_meta($post->ID, 'mbp_insta', true);
                            if ($fb_custom_field) { ?>
                                <a class="small-social-button button gradiented-box gradient-five-six " href="<?php echo esc_url(get_post_meta($post->ID, 'mbp_insta', true)); ?>" target="_blank" title="Follow on Instgram"> <i class="fab fa-instagram fa-1x"></i> Follow</a>
                            <?php
                            } else {
                                // don't display Insta button 
                            }
                            ?>
                            <!-- check if the custom field created with metabox is not empty before displaying the button-->
                            <?php
                            $insta_custom_field = get_post_meta($post->ID, 'mbp_email', true);
                            if ($insta_custom_field) { ?>
                                <a class="small-social-button button gradiented-box gradient-one-two " href="mailto:<?php echo esc_url(get_post_meta($post->ID, 'mbp_email', true)); ?>?Subject=Hello%20from%20Boom%20Radio%20website" title="Write an Email"><i class="fas fa-envelope fa-1x"></i> Write an Email</a>
                            <?php
                            } else {
                                // don't display Email button 
                            }
                            ?>
                        </div>
                        <div class="cell large-6 shared text-justify">
                            <h2>
                                <?php the_title() ?>
                            </h2>
                            <!--OR use the_content for full post, this can be split into template parts at the end;-->
                            <?php the_content(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Update dcomment templates contains styling-->
    <?php
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
    ?>
</div>
<!--End the loop.-->
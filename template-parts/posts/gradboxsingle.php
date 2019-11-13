<div <?php post_class('cell'); ?>>
    <?php //render random gradient background
    $list = array('gradient-one-two', 'gradient-three-four', 'gradient-five-six'); ?>
    <?php $i = array_rand($list); ?>
    <?php $gradient = $list[$i]; ?>
    <div class="grid-container-fluid gradiented-box <?php echo $gradient ?>">
        <div class="grid-x grid-padding-x grid-padding-y align-spaced align-middle">
            <div class="cell medium-10">
                <div class="grid-container-fluid">
                    <div class="grid-x grid-padding-x grid-padding-y">
                        <div class="cell"></div>
                        <div class="cell large-6 shared text-justify">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('card', array('class' => 'box-shadowed', 'alt' => esc_html(get_the_title()))); ?>
                            <?php endif; ?>
                        </div>
                        <div class="cell auto">
                            <?php esc_html_e(the_title('<h2>', '</h2>')); ?>
                            <!-- check if there is a custom field metabox to display-->
                            <?php
                            $date_custom_field = get_post_meta($post->ID, 'mbs_date', true); ?>
                            <?php if ($date_custom_field) { ?>
                                <h6><?php echo get_post_meta($post->ID, 'mbs_date', true); ?></h6>
                            <?php
                            } else { } ?>
                            <!--don't display Date title-->
                            <!--OR use the_content for full post, this can be split into template parts at the end;-->
                            <?php the_content(); ?>
                        </div>
                        <div class="cell"></div>
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
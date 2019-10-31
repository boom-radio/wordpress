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
                        <div class="cell large-6 shared text-justify">
                            <?php if (has_post_thumbnail()) :
                                the_post_thumbnail('card', array('class' => 'box-shadowed'));
                            endif; ?>
                        </div>
                        <div class="cell auto">
                            <?php the_title('<h2>', '</h2>') ?>
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
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
    ?>
</div>
<!--End the loop.-->
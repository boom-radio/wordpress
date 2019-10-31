<div <?php post_class('cell small-12 medium-10 large-9'); ?>>
    <div class="card">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail('card_single');
        } else {
            echo '<img style="width: 100%;" src="' . get_bloginfo("template_url") . '/src/assets/img/img-default.png"/>';
        }
        ?>
        <div class="card-section card-single">
            <div class="bio">
                <h5 class="section-title">
                    <?php the_title() ?>
                </h5>
                <?php the_content(); ?>
            </div>
        </div>
    </div>
    <!--Previous/next post navigation.-->
</div>
<!--End the loop.-->
<!--Start of comments section-->
<div class="cell small-12 medium-10 large-10">
    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif; ?>
</div>
<div <?php post_class('card'); ?>>
    <div class="cell"></div>
    <!--Check if a featured image has been uplaoded with the post-->
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('card_single'); ?>
    <?php endif; ?>

    <div class="card-section">
        <div class="bio">
            <h5 class="section-title"><?php the_title(); ?></h5>
            <div class="cell">
                <?php the_content(); ?>
            </div>
        </div>
        <br>
        <?php boom_radio_card_link(); ?>
    </div>
</div>
<div <?php post_class('card'); ?>>
    <div class="cell"></div>
    <?php if (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('card_single', ['alt' => esc_html(get_the_title())]); ?>
    <?php endif; ?>

    <div class="card-section">
        <div class="bio">
            <h3>This is single.php </h3>
            <h5 class="section-title"><?php esc_attr_e(the_title()); ?></h5>
            <div class="cell">
                <?php the_content(); ?>
            </div>
        </div>
        <br>
        <?php boom_radio_card_link(); ?>
    </div>
</div>